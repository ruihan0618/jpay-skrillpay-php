<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayResourceModel;
use SkrillPay\Core\SkrillPayConstants;
use SkrillPay\Validation\UrlValidator;

/**
 * Class Webhook
 *
 * One or more webhook objects.
 *
 * @package SkrillPay\Api
 *
 * @property string id
 * @property string url
 * @property string status
 */
class WebhookStatus extends SkrillPayResourceModel
{


    /**
     * Sent when the transaction is processed and the funds have been received in your Skrill account.
     * @return bool
     */
    public function isProcessed()
    {
        return $this->status == SkrillPayConstants::STATUS_PROCESSED;
    }
    /**
     * @return bool
     */
    public function isFailed()
    {
        return $this->status == SkrillPayConstants::STATUS_FAILED;
    }
    /**
     * @return bool
     */
    public function isCanceled()
    {
        return $this->status == SkrillPayConstants::STATUS_CANCELED;
    }
    /**
     * @return bool
     */
    public function isPending()
    {
        return $this->status == SkrillPayConstants::STATUS_PENDING;
    }
    /**
     * @return bool
     */
    public function isChargeBack()
    {
        return $this->status == SkrillPayConstants::STATUS_CHARGEBACK;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }



}
