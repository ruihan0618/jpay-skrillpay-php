<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayModel;

/**
 * Class Payer
 *
 * A resource representing a Payer that funds a payment.
 *
 * @package SkrillPay\Api
 *
 * @property string payment_method
 * @property string status
 * @property string external_selected_funding_instrument_type
 * @property \SkrillPay\Api\PayerInfo payer_info
 */
class Payer extends SkrillPayModel
{
    /**
     * Payment method being used. "credit_card" is not available for general use.
     * Please ensure that you have acquired the approval for using "credit_card" for your live
     * credentials.
     * Valid Values: ["quick", "wallet","mass","automated"]
     *
     * @param string $payment_method
     * 
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
        return $this;
    }

    /**
     * Payment method being used - SkrillPay Wallet payment, Bank Direct Debit  or Direct Credit card.
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Status of payer's SkrillPay Account.
     * Valid Values: ["VERIFIED", "UNVERIFIED"]
     *
     * @param string $status
     * 
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Status of payer's SkrillPay Account.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Type of account relationship payer has with SkrillPay.
     * Valid Values: ["BUSINESS", "PERSONAL", "PREMIER"]
     * @deprecated Not publicly available
     * @param string $account_type
     * 
     * @return $this
     */
    public function setAccountType($account_type)
    {
        $this->account_type = $account_type;
        return $this;
    }

    /**
     * Type of account relationship payer has with SkrillPay.
     * @deprecated Not publicly available
     * @return string
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * Information related to the Payer. 
     *
     * @param \SkrillPay\Api\PayerInfo $payer_info
     * 
     * @return $this
     */
    public function setPayerInfo($payer_info)
    {
        $this->payer_info = $payer_info;
        return $this;
    }

    /**
     * Information related to the Payer. 
     *
     * @return \SkrillPay\Api\PayerInfo
     */
    public function getPayerInfo()
    {
        return $this->payer_info;
    }

}
