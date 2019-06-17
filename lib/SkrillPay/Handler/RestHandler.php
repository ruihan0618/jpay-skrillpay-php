<?php
/**
 * API handler for all REST API calls
 */

namespace SkrillPay\Handler;

use SkrillPay\Auth\OAuthTokenCredential;
use SkrillPay\Common\SkrillPayUserAgent;
use SkrillPay\Core\SkrillPayConstants;
use SkrillPay\Core\SkrillPayCredentialManager;
use SkrillPay\Core\SkrillPayHttpConfig;
use SkrillPay\Exception\SkrillPayConfigurationException;
use SkrillPay\Exception\SkrillPayInvalidCredentialException;
use SkrillPay\Exception\SkrillPayMissingCredentialException;

/**
 * Class RestHandler
 */
class RestHandler implements ISkrillPayHandler
{
    /**
     * Private Variable
     *
     * @var \SkrillPay\Rest\ApiContext $apiContext
     */
    private $apiContext;

    /**
     * Construct
     *
     * @param \SkrillPay\Rest\ApiContext $apiContext
     */
    public function __construct($apiContext)
    {
        $this->apiContext = $apiContext;
    }

    /**
     * @param SkrillPayHttpConfig $httpConfig
     * @param string                    $request
     * @param mixed                     $options
     * @return mixed|void
     * @throws SkrillPayConfigurationException
     * @throws SkrillPayInvalidCredentialException
     * @throws SkrillPayMissingCredentialException
     */
    public function handle($httpConfig, $request, $options)
    {
        $credential = $this->apiContext->getCredential();
        $config = $this->apiContext->getConfig();

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            (isset($options['path']) ? $options['path'] : '')
        );


        // Overwrite Expect Header to disable 100 Continue Issue
        $httpConfig->addHeader("Expect", null);

        if (!array_key_exists("User-Agent", $httpConfig->getHeaders())) {
            $httpConfig->addHeader("User-Agent", SkrillPayUserAgent::getValue(SkrillPayConstants::SDK_NAME, SkrillPayConstants::SDK_VERSION));
        }

        if (($httpConfig->getMethod() == 'POST' || $httpConfig->getMethod() == 'PUT') && !is_null($this->apiContext->getRequestId())) {
            $httpConfig->addHeader('SkrillPay-Request-Id', $this->apiContext->getRequestId());
        }
        // Add any additional Headers that they may have provided
        $headers = $this->apiContext->getRequestHeaders();

        foreach ($headers as $key => $value) {
            $httpConfig->addHeader($key, $value);
        }
    }

    /**
     * End Point
     *
     * @param array $config
     *
     * @return string
     * @throws \SkrillPay\Exception\SkrillPayConfigurationException
     */
    private function _getEndpoint($config)
    {
        if (isset($config['service.EndPoint'])) {
            return $config['service.EndPoint'];
        } elseif (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    return SkrillPayConstants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    return SkrillPayConstants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new SkrillPayConfigurationException('The mode config parameter must be set to either sandbox/live');
                    break;
            }
        } else {
            // Defaulting to Sandbox
            return SkrillPayConstants::REST_SANDBOX_ENDPOINT;
        }
    }
}
