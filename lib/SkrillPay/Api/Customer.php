<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayModel;

/**
 * Class Amount
 *
 * payment amount with break-ups.
 *
 * @package SkrillPay\Api
 *
 * @property string pay_from_email
 * @property string firstname
 * @property string lastname
 * @property string date_of_birth
 * @property string address
 * @property string address2
 * @property string phone_number
 * @property string postal_code
 * @property string city
 * @property string country
 * @property string neteller_account
 * @property string neteller_secure_id
 * @property string state
 */
class Customer extends SkrillPayModel
{
    /**
     * Email address of the customer who is making the payment. If provided, this field is hidden on the payment form. If left empty, the customer has to enter their email address.
     * @return string
     */
    public function getPayFromEmail()
    {
        return $this->pay_from_email;
    }

    /**
     * Email address of the customer who is making the payment. If provided, this field is hidden on the payment form. If left empty, the customer has to enter their email address.
     * @param string $pay_from_email
     * @return $this
     */
    public function setPayFromEmail(string $pay_from_email)
    {
        $this->pay_from_email = $pay_from_email;
        return $this;
    }

    /**
     * Customer’s first name.
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Customer’s first name.
     * @param string $firstname
     * @return $this
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Customer’s last name
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Customer’s last name
     * @param string $lastname
     * @return $this
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Date of birth of the customer. The format is ddmmyyyy. Only numeric values are accepted.
        If provided this field will be prefilled in the Payment form. This saves time for SEPA payments and Skrill Wallet sign-up which require the customer to enter a date of birth.
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * Date of birth of the customer. The format is ddmmyyyy. Only numeric values are accepted.
        If provided this field will be prefilled in the Payment form. This saves time for SEPA payments and Skrill Wallet sign-up which require the customer to enter a date of birth.
     * @param string $date_of_birth
     * @return $this
     */
    public function setDateOfBirth(string $date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
        return $this;
    }

    /**
     * Customer’s address (for example: street)
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Customer’s address (for example: street)
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Customer’s address (for example: town)
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Customer’s address (for example: town)
     * @param string $address2
     * @return $this
     */
    public function setAddress2(string $address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * Customer’s phone number. Only numeric values are accepted
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     *  Customer’s phone number. Only numeric values are accepted
     * @param string $phone_number
     * @return $this
     */
    public function setPhoneNumber(string $phone_number)
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * Customer’s postal code/ZIP Code. Only alphanumeric values are accepted
    (for example:, no punctuation marks or dashes)
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Customer’s postal code/ZIP Code. Only alphanumeric values are accepted
    (for example:, no punctuation marks or dashes)
     * @param string $postal_code
     * @return $this
     */
    public function setPostalCode(string $postal_code)
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    /**
     * Customer’s city or postal area
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Customer’s city or postal area
     * @param string $city
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Customer’s country in the 3-digit ISO Code (see ISO country codes (3- digit) on page 10-3).
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Customer’s country in the 3-digit ISO Code (see ISO country codes (3- digit) on page 10-3).
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Neteller customer account email or account ID
     * @return string
     */
    public function getNetellerAccount()
    {
        return $this->neteller_account;
    }

    /**Neteller customer account email or account ID
     * @param string $neteller_account
     * @return $this
     */
    public function setNetellerAccount(string $neteller_account)
    {
        $this->neteller_account = $neteller_account;
        return $this;
    }

    /**
     * Secure ID or Google Authenticator One Time Password for the customer’s Neteller account
     * @return string
     */
    public function getNetellerSecureId()
    {
        return $this->neteller_secure_id;
    }

    /**
     * Secure ID or Google Authenticator One Time Password for the customer’s Neteller account
     * @param string $neteller_secure_id
     * @return $this
     */
    public function setNetellerSecureId(string $neteller_secure_id)
    {
        $this->neteller_secure_id = $neteller_secure_id;
        return $this;
    }

    /**
     * Customer’s state or region.
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Customer’s state or region.
     * @param string $state
     * @return $this
     */
    public function setState(string $state)
    {
        $this->state = $state;
        return $this;
    }


}
