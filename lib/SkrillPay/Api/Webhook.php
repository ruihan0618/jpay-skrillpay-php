<?php

namespace SkrillPay\Api;


use SkrillPay\Common\SkrillPayResourceModel;
use SkrillPay\Validation\ArgumentValidator;
use SkrillPay\Rest\ApiContext;
use SkrillPay\Validation\UrlValidator;

/**
 * Class Webhook
 *
 * One or more webhook objects.
 *
 * @package SkrillPay\Api
 *
 * @property string $payload
 * @property \SkrillPay\Api\WebhookStatus status
 * @property \SkrillPay\Api\VerifyWebhookSignature verifyWebhookSignature
 * @property
 */
class Webhook extends SkrillPayResourceModel
{
    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     * @return $this
     */
    public function setPayload(string $payload)
    {
        $this->payload = $payload;
        return $this;
    }


    /**
     * @return WebhookStatus
     */
    public function getStatus(): WebhookStatus
    {
        return $this->status;
    }

    /**
     * @param WebhookStatus $status
     * @return $this
     */
    public function setStatus(WebhookStatus $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return VerifyWebhookSignature
     */
    public function getVerifyWebhookSignature(): VerifyWebhookSignature
    {
        return $this->verifyWebhookSignature;

    }

    /**
     * @param VerifyWebhookSignature $verifyWebhookSignature
     * @return $this
     */
    public function setVerifyWebhookSignature(VerifyWebhookSignature $verifyWebhookSignature)
    {
        $this->verifyWebhookSignature = $verifyWebhookSignature;
        return $this;
    }


    /**
     * @param ApiContext|null $apiContext
     * @return bool
     * @throws \SkrillPay\Exception\SkrillPayInvalidCredentialException
     */
    public function verify(ApiContext $apiContext = null)
    {

        $this->setVerifyWebhookSignature(new VerifyWebhookSignature($apiContext,$this->getPayload()));

        return $this->getVerifyWebhookSignature()->verifyMd5Signature();
    }

}
