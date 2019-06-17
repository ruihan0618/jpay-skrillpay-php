<?php

namespace SkrillPay\Auth;

use SkrillPay\Common\SkrillPayResourceModel;

/**
 * Class OAuthTokenCredential
 */
class OAuthTokenCredential extends SkrillPayResourceModel
{

    public static $CACHE_PATH = '/../../../var/auth.cache';

    /**
     * @var string Default Auth Handler
     */
    public static $AUTH_HANDLER = 'SkrillPay\Handler\OauthHandler';

    /**
     * Private Variable
     *
     * @var int $expiryBufferTime
     */
    public static $expiryBufferTime = 120;

    /**
     * Client ID as obtained from the developer portal
     *
     * @var string $clientId
     */
    private $clientId;

    /**
     * Client secret as obtained from the developer portal
     *
     * @var string $clientSecret
     */
    private $clientSecret;

    /**
     * Client mqi subject
     */
    private $clientMqi;


    /**
     * Construct
     *
     * @param string $clientId     client id obtained from the developer portal
     * @param string $clientSecret client secret obtained from the developer portal
     * @param string $clientMqi  client secret obtained from the developer portal

     */
    public function __construct($clientId, $clientSecret, $clientMqi = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->clientMqi = $clientMqi;
    }

    /**
     * Get Client ID
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Get Client Secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Get Client mqi
     *
     * @return string
     */
    public function getClientMqi()
    {
        return $this->clientMqi;
    }

}
