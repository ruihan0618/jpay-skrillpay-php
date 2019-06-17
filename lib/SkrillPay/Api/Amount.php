<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayModel;
use SkrillPay\Common\FormatConverter;
use SkrillPay\Validation\NumericValidator;

/**
 * Class Amount
 *
 * payment amount with break-ups.
 *
 * @package SkrillPay\Api
 *
 * @property string amount
 * @property string currency
 * @property string total
 * @property string detail1_description
 * @property string detail1_text
 */
class Amount extends SkrillPayModel
{
    /**
     * The total amount payable. Note: Do not include the trailing zeroes if the amount is a natural number. For example: “23” (not “23.00”).
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * The total amount payable. Note: Do not include the trailing zeroes if the amount is a natural number. For example: “23” (not “23.00”).
     * @param string $amount
     * @return $this
     */
    public function setAmount(string $amount)
    {
        NumericValidator::validate($amount, "amount");
        $total = FormatConverter::formatToPrice($amount, $this->getCurrency());
        $this->amount = $total;
        return $this;
    }

    /**
     * 3-letter code of the currency of the amount according to ISO 4217 (see ISO 4217 currencies on page 10-1).
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * 3-letter code of the currency of the amount according to ISO 4217 (see ISO 4217 currencies on page 10-1).
     * @param string $currency
     * @return $this
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * You can show up to five additional details about the product in the More information section in the header of Quick Checkout.
     * @return string
     */
    public function getDetail1Description(): string
    {
        return $this->detail1_description;
    }

    /**
     * You can show up to five additional details about the product in the More information section in the header of Quick Checkout.
     * @param string $detail1_description
     * @return $this
     */
    public function setDetail1Description(string $detail1_description)
    {
        $this->detail1_description = $detail1_description;
        return $this;
    }

    /**
     * The detail1_text is shown next to the detail1_description in the More Information section in the header of the payment form with the other payment details. The detail1_description combined with the detail1_text is shown in the more information field of the merchant account history CSV file. Using the example values, this would be Product ID: 4509334. Note: If a customer makes a purchase using Skrill Wallet this information will also appear in the same field in their account history.
     * @return string
     */
    public function getDetail1Text(): string
    {
        return $this->detail1_text;
    }

    /**
     * The detail1_text is shown next to the detail1_description in the More Information section in the header of the payment form with the other payment details. The detail1_description combined with the detail1_text is shown in the more information field of the merchant account history CSV file. Using the example values, this would be Product ID: 4509334. Note: If a customer makes a purchase using Skrill Wallet this information will also appear in the same field in their account history.
     * @param string $detail1_text
     * @return $this
     */
    public function setDetail1Text(string $detail1_text)
    {
        $this->detail1_text = $detail1_text;
        return $this;
    }

}
