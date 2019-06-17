<?php

namespace SkrillPay\Rest;

use SkrillPay\Core\SkrillPayConfigManager;
use SkrillPay\Core\SkrillPayCredentialManager;

/**
 * Class ApiContext
 *
 * Call level parameters such as request id, credentials etc
 *
 * @package SkrillPay\Rest
 */
class ApiContext
{

    /**
     * Unique request id to be used for this call
     * The user can either generate one as per application
     * needs or let the SDK generate one
     *
     * @var null|string $requestId
     */
    private $requestId;

    /**
     * This is a placeholder for holding credential for the request
     * If the value is not set, it would get the value from @\SkrillPay\Core\SkrillPayCredentialManager
     *
     * @var \SkrillPay\Auth\OAuthTokenCredential
     */
    private $credential;


    /**
     * Construct
     *
     * @param \SkrillPay\Auth\OAuthTokenCredential $credential
     * @param string|null                       $requestId
     */
    public function __construct($credential = null, $requestId = null)
    {
        $this->requestId = $requestId;
        $this->credential = $credential;
    }

    /**
     * @return \SkrillPay\Auth\OAuthTokenCredential|null
     * @throws \SkrillPay\Exception\SkrillPayInvalidCredentialException
     */
    public function getCredential()
    {
        if ($this->credential == null) {
            return SkrillPayCredentialManager::getInstance()->getCredentialObject();
        }
        return $this->credential;
    }

    public function getRequestHeaders()
    {
        $result = SkrillPayConfigManager::getInstance()->get('http.headers');
        $headers = array();
        foreach ($result as $header => $value) {
            $headerName = ltrim($header, 'http.headers');
            $headers[$headerName] = $value;
        }
        return $headers;
    }

    public function addRequestHeader($name, $value)
    {
        // Determine if the name already has a 'http.headers' prefix. If not, add one.
        if (!(substr($name, 0, strlen('http.headers')) === 'http.headers')) {
            $name = 'http.headers.' . $name;
        }
        SkrillPayConfigManager::getInstance()->addConfigs(array($name => $value));
    }

    /**
     * Get Request ID
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Sets the request ID
     *
     * @param string $requestId the SkrillPay-Request-Id value to use
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * Resets the requestId that can be used to set the SkrillPay-request-id
     * header used for idempotency. In cases where you need to make multiple create calls
     * using the same ApiContext object, you need to reset request Id.
     * @deprecated Call setRequestId with a unique value.
     *
     * @return string
     */
    public function resetRequestId()
    {
        $this->requestId = $this->generateRequestId();
        return $this->getRequestId();
    }

    /**
     * Sets Config
     *
     * @param array $config SDK configuration parameters
     */
    public function setConfig(array $config)
    {
        SkrillPayConfigManager::getInstance()->addConfigs($config);
    }

    /**
     * Gets Configurations
     *
     * @return array
     */
    public function getConfig()
    {
        return SkrillPayConfigManager::getInstance()->getConfigHashmap();
    }

    /**
     * Gets a specific configuration from key
     *
     * @param $searchKey
     * @return mixed
     */
    public function get($searchKey)
    {
        return SkrillPayConfigManager::getInstance()->get($searchKey);
    }

    /**
     * Generates a unique per request id that
     * can be used to set the SkrillPay-Request-Id header
     * that is used for idempotency
     * @deprecated
     *
     * @return string
     */
    private function generateRequestId()
    {
        static $pid = -1;
        static $addr = -1;

        if ($pid == -1) {
            $pid = getmypid();
        }

        if ($addr == -1) {
            if (array_key_exists('SERVER_ADDR', $_SERVER)) {
                $addr = ip2long($_SERVER['SERVER_ADDR']);
            } else {
                $addr = php_uname('n');
            }
        }

        return $addr . $pid . $_SERVER['REQUEST_TIME'] . mt_rand(0, 0xffff);
    }
}
