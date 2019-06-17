<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayResourceModel;
use SkrillPay\Core\SkrillPayConstants;
use SkrillPay\Rest\ApiContext;
use SkrillPay\Validation\ArgumentValidator;


/**
 * Class Payment
 *
 * Lets you create, process and manage payments.
 *
 * @package SkrillPay\Api
 *
 * @property string id
 * @property string intent
 * @property string prepare_only
 * @property \SkrillPay\Api\Payer payer
 * @property \SkrillPay\Api\PayerInfo[] payerInfo
 * @property \SkrillPay\Api\Customer $customer
 * @property \SkrillPay\Api\Amount $amount
 */
class Checkout extends SkrillPayResourceModel
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntent()
    {
        return $this->intent;
    }

    /**
     * @param string $intent
     * @return $this
     */
    public function setIntent(string $intent)
    {
        $this->intent = $intent;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrepareOnly()
    {
        return $this->prepare_only;
    }

    /**
     * @param string $prepare_only
     * @return $this
     */
    public function setPrepareOnly(string $prepare_only)
    {
        $this->prepare_only = $prepare_only;
        return $this;
    }


    /**
     * Source of the funds for this payment represented by a SkrillPay account or a direct credit card.
     *
     * @param \SkrillPay\Api\Payer $payer
     *
     * @return $this
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;
        return $this;
    }

    /**
     * Source of the funds for this payment represented by a SkrillPay account or a direct credit card.
     *
     * @return \SkrillPay\Api\Payer
     */
    public function getPayer()
    {
        return $this->payer;
    }


    /**
     * Receiver of funds for this payment.
     * @param \SkrillPay\Api\PayerInfo $payerInfo
     *
     * @return $this
     */
    public function setPayerInfo($payerInfo)
    {
        $this->payerInfo = $payerInfo;
        return $this;
    }

    /**
     * Receiver of funds for this payment.
     * @return \SkrillPay\Api\PayerInfo
     */
    public function getPayerInfo()
    {
        return $this->payerInfo;
    }

    /**
     * @param \SkrillPay\Api\Customer $customer
     * @return  $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * ID of the cart to execute the payment.
     * @return \SkrillPay\Api\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param \SkrillPay\Api\Amount $amount
     * @return  $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * ID of the cart to execute the payment.
     * @return \SkrillPay\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }


    /**
     * Get Approval Link
     *
     * @return null|string
     */
    public function getApprovalLink()
    {
        return $this->toArray()['approval_url'];
    }

    /**
     * Get token from Approval Link
     *
     * @return null|string
     */
    public function getSid()
    {
        $parameter_name = "sid";
        parse_str(parse_url($this->getApprovalLink(), PHP_URL_QUERY), $query);
        return !isset($query[$parameter_name]) ? null : $query[$parameter_name];
    }

    /**
     * @param null $apiContext
     * @param null $restCall
     * @return $this
     * @throws \SkrillPay\Exception\SkrillPayConnectionException
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );

        $this->getPrepareOnly() ? $this->fromString($json) :  $this->fromHtml($json);

        return $this;
    }

    /**
     * @param $paymentId
     * @param null $apiContext
     * @param null $restCall
     * @return Checkout
     * @throws \SkrillPay\Exception\SkrillPayConnectionException
     */
    public static function get($paymentId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($paymentId, 'paymentId');
        $payLoad = "";
        $json = self::executeCall(
            "/",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return self::fromJson($json);
    }

    /**
     * @param $patchRequest
     * @param null $apiContext
     * @param null $restCall
     * @return bool
     * @throws \SkrillPay\Exception\SkrillPayConnectionException
     */
    public function update($patchRequest, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($patchRequest, 'patchRequest');
        $payLoad = $patchRequest->toJSON();
        self::executeCall(
            "/",
            "PATCH",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * @param $paymentExecution
     * @param null $apiContext
     * @param null $restCall
     * @return $this
     * @throws \SkrillPay\Exception\SkrillPayConnectionException
     */
    public function execute($paymentExecution, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($paymentExecution, 'paymentExecution');
        $payLoad = $paymentExecution->toJSON();
        $json = self::executeCall(
            "/",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

}