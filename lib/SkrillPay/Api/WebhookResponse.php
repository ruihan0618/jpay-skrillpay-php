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
 * @property string merchant_id
 * @property string transaction_id
 * @property string amount
 * @property string currency
 * @property string country
 * @property string mb_amount
 * @property string firstname
 * @property string lastname
 * @property string IP_country
 * @property string md5sig
 * @property string payment_type
 * @property string mb_transaction_id
 * @property string mb_currency
 * @property string pay_from_email
 * @property string sha2sig
 * @property string pay_to_email
 * @property string customer_id
 * @property string payment_method
 * @property string payment_instrument_country
 * @property string status
 * @property
 */
class WebhookResponse extends SkrillPayResourceModel
{
    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchant_id;
    }

    /**
     * @param string $merchant_id
     */
    public function setMerchantId(string $merchant_id)
    {
        $this->merchant_id = $merchant_id;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * @param string $transaction_id
     */
    public function setTransactionId(string $transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getMbAmount(): string
    {
        return $this->mb_amount;
    }

    /**
     * @param string $mb_amount
     */
    public function setMbAmount(string $mb_amount)
    {
        $this->mb_amount = $mb_amount;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getIPCountry(): string
    {
        return $this->IP_country;
    }

    /**
     * @param string $IP_country
     */
    public function setIPCountry(string $IP_country)
    {
        $this->IP_country = $IP_country;
    }

    /**
     * @return string
     */
    public function getMd5sig(): string
    {
        return $this->md5sig;
    }

    /**
     * @param string $md5sig
     */
    public function setMd5sig(string $md5sig)
    {
        $this->md5sig = $md5sig;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->payment_type;
    }

    /**
     * @param string $payment_type
     */
    public function setPaymentType(string $payment_type)
    {
        $this->payment_type = $payment_type;
    }

    /**
     * @return string
     */
    public function getMbTransactionId(): string
    {
        return $this->mb_transaction_id;
    }

    /**
     * @param string $mb_transaction_id
     */
    public function setMbTransactionId(string $mb_transaction_id)
    {
        $this->mb_transaction_id = $mb_transaction_id;
    }

    /**
     * @return string
     */
    public function getMbCurrency(): string
    {
        return $this->mb_currency;
    }

    /**
     * @param string $mb_currency
     */
    public function setMbCurrency(string $mb_currency)
    {
        $this->mb_currency = $mb_currency;
    }

    /**
     * @return string
     */
    public function getPayFromEmail(): string
    {
        return $this->pay_from_email;
    }

    /**
     * @param string $pay_from_email
     */
    public function setPayFromEmail(string $pay_from_email)
    {
        $this->pay_from_email = $pay_from_email;
    }

    /**
     * @return string
     */
    public function getSha2sig(): string
    {
        return $this->sha2sig;
    }

    /**
     * @param string $sha2sig
     */
    public function setSha2sig(string $sha2sig)
    {
        $this->sha2sig = $sha2sig;
    }

    /**
     * @return string
     */
    public function getPayToEmail(): string
    {
        return $this->pay_to_email;
    }

    /**
     * @param string $pay_to_email
     */
    public function setPayToEmail(string $pay_to_email)
    {
        $this->pay_to_email = $pay_to_email;
    }

    /**
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customer_id;
    }

    /**
     * @param string $customer_id
     */
    public function setCustomerId(string $customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->payment_method;
    }

    /**
     * @param string $payment_method
     */
    public function setPaymentMethod(string $payment_method)
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @return string
     */
    public function getPaymentInstrumentCountry(): string
    {
        return $this->payment_instrument_country;
    }

    /**
     * @param string $payment_instrument_country
     */
    public function setPaymentInstrumentCountry(string $payment_instrument_country)
    {
        $this->payment_instrument_country = $payment_instrument_country;
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
