<?php

namespace SkrillPay\Api;

use SkrillPay\Api\WebhookResponse;
use SkrillPay\Common\ReflectionUtil;
use SkrillPay\Common\SkrillPayResourceModel;
use SkrillPay\Rest\ApiContext;
use SkrillPay\Api\WebhookStatus;

/**
 * Class VerifyWebhookSignature
 *
 * Verify webhook signature.
 *
 * @package SkrillPay\Api
 * @property SkrillPay\Api\WebhookResponse  $webhookResponse
 * @property SkrillPay\Api\WebhookStatus  $webhookStatus
 * @property string request_body
 */
class VerifyWebhookSignature extends SkrillPayResourceModel
{

    protected $apiContext; //api

    protected $payload; //response

    public function __construct(ApiContext $apiContext = null, String $payload = null)
    {

        $this->apiContext = $apiContext;

        $this->payload    = $payload;

    }

    /**
     * @return SkrillPay\Api\WebhookResponse
     */
    public function getWebhookResponse(): WebhookResponse
    {
        return $this->webhookResponse;
    }

    /**
     * @param SkrillPay\Api\WebhookResponse $webhookResponse
     * @return $this
     */
    public function setWebhookResponse(WebhookResponse $webhookResponse)
    {
        $this->webhookResponse = $webhookResponse;
        return $this;
    }

    /**
     * @return SkrillPay\Api\WebhookStatus
     */
    public function getWebhookStatus(): WebhookStatus
    {
        return $this->webhookStatus;
    }

    /**
     * @param SkrillPay\Api\WebhookStatus $webhookStatus
     * @return $this
     */
    public function setWebhookStatus(WebhookStatus $webhookStatus)
    {
        $this->webhookStatus = $webhookStatus;
        return $this;
    }


    /**
     * The content of the HTTP `POST` request body of the webhook notification you received as a string.
     *
     * @return $this
     */
    public function getRequestBody()
    {
        $this->request_body = $this->payload;
        return $this;
    }


    /**
     * @return $this|bool
     */
    public function toVerifySignatureObject()
    {
        if (is_null($this->request_body)) {
            return false;
        }
        if(!is_array($this->request_body)){
            $_obj = json_decode($this->request_body,true);
        }else{
            $_obj = $this->request_body;
        }

        $resp = new WebhookResponse();
        $status = new WebhookStatus();

        foreach ($_obj as $key=>$v) {
            $setter = 'set'. $this->convertToCamelCase($key);
            if (method_exists($this, $setter)) {
                $resp->$setter(strval($v));
                if($key == 'status'){
                    $status->$setter(strval($v));
                }
            } else {
                $resp->__set($key, strval($v));
                if($key == 'status'){
                    $status->__set($key, strval($v));
                }
            }
        }

        $this->setWebhookResponse($resp);
        $this->setWebhookStatus($status);

        return $this;
    }


    /**
     * @return bool
     * @throws \SkrillPay\Exception\SkrillPayInvalidCredentialException
     */
    public function verifyMd5Signature(){

        //构造数据
        $this->getRequestBody()->toVerifySignatureObject();

        //相应数据
        $webHookResponse = $this->getWebhookResponse();

        $body = [
            $webHookResponse->getMerchantId(),
            $webHookResponse->getTransactionId(),
            strtoupper(md5($this->apiContext->getCredential()->getClientSecret())),
            $webHookResponse->getMbAmount(),
            $webHookResponse->getMbCurrency(),
            $webHookResponse->getStatus()
        ];


        $digest = strtoupper(md5(implode('', $body)));
        if($digest == $webHookResponse->getMd5sig() && $this->getWebhookStatus()->isProcessed()){
            return true;
        }

        return false;
    }
}
