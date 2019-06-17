<?php
/**
 * API handler for OAuth Token Request REST API calls
 */

namespace SkrillPay\Handler;

use SkrillPay\Common\SkrillPayUserAgent;
use SkrillPay\Core\SkrillPayConstants;
use SkrillPay\Core\SkrillPayHttpConfig;
use SkrillPay\Exception\SkrillPayConfigurationException;
use SkrillPay\Exception\SkrillPayInvalidCredentialException;
use SkrillPay\Exception\SkrillPayMissingCredentialException;

/**
 * Class OauthHandler
 */
class OauthHandler implements ISkrillPayHandler
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
        $config = $this->apiContext->getConfig();

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            (isset($options['path']) ? $options['path'] : '')
        );

        $headers = array(
            "User-Agent"    => SkrillPayUserAgent::getValue(SkrillPayConstants::SDK_NAME, SkrillPayConstants::SDK_VERSION),
            "Accept"        => "*/*"
        );
        $httpConfig->setHeaders($headers);

        // Add any additional Headers that they may have provided
        $headers = $this->apiContext->getRequestHeaders();
        foreach ($headers as $key => $value) {
            $httpConfig->addHeader($key, $value);
        }
    }

    /**
     * Get HttpConfiguration object for OAuth API
     *
     * @param array $config
     *
     * @return SkrillPayHttpConfig
     * @throws \SkrillPay\Exception\SkrillPayConfigurationException
     */
    private static function _getEndpoint($config)
    {
        if (isset($config['oauth.EndPoint'])) {
            $baseEndpoint = $config['oauth.EndPoint'];
        } elseif (isset($config['service.EndPoint'])) {
            $baseEndpoint = $config['service.EndPoint'];
        } elseif (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    $baseEndpoint = SkrillPayConstants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    $baseEndpoint = SkrillPayConstants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new SkrillPayConfigurationException('The mode config parameter must be set to either sandbox/live');
            }
        } else {
            // Defaulting to Sandbox
            $baseEndpoint = SkrillPayConstants::REST_SANDBOX_ENDPOINT;
        }

        $baseEndpoint = rtrim(trim($baseEndpoint), '/') . "/v1/oauth2/token";

        return $baseEndpoint;
    }
}
