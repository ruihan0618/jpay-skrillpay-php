<?php
namespace SkrillPay\Common;

use SkrillPay\Core\SkrillPayHttpConfig;
use SkrillPay\Core\SkrillPayHttpConnection;
use SkrillPay\Core\SkrillPayLoggingManager;
use SkrillPay\Rest\ApiContext;

/**
 * Class SkrillPayRestCall
 *
 * @package SkrillPay\Transport
 */
class SkrillPayRestCall
{


    /**
     * SkrillPay Logger
     *
     * @var SkrillPayLoggingManager logger interface
     */
    private $logger;

    /**
     * API Context
     *
     * @var ApiContext
     */
    private $apiContext;


    /**
     * Default Constructor
     *
     * @param ApiContext $apiContext
     */
    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->logger = SkrillPayLoggingManager::getInstance(__CLASS__);
    }

    /**
     * @param array $handlers
     * @param $path
     * @param $method
     * @param string $data
     * @param array $headers
     * @return mixed
     * @throws \SkrillPay\Exception\SkrillPayConfigurationException
     * @throws \SkrillPay\Exception\SkrillPayConnectionException
     */
    public function execute($handlers = array(), $path, $method, $data = '', $headers = array())
    {
        $config = $this->apiContext->getConfig();
        $httpConfig = new SkrillPayHttpConfig(null, $method, $config);
        $headers = $headers ? $headers : array();
        $httpConfig->setHeaders($headers +
            array(
                'Content-Type' => 'application/json'
            )
        );

        /** @var \SkrillPay\Handler\ISkrillPayHandler $handler */
        foreach ($handlers as $handler) {
            if (!is_object($handler)) {
                $fullHandler = "\\" . (string)$handler;
                $handler = new $fullHandler($this->apiContext);
            }
            $handler->handle($httpConfig, $data, array('path' => $path, 'apiContext' => $this->apiContext));
        }
        $connection = new SkrillPayHttpConnection($httpConfig, $config);
        $response = $connection->execute($data);

        return $response;
    }
}
