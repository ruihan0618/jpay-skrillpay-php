<?php

namespace SkrillPay\Exception;

class SkrillPaySignatureVerification extends \Exception
{
    protected $sigHeader;

    public function __construct( $message, $sigHeader, $httpBody = null) {
        parent::__construct($message, null, $httpBody, null, null);
        $this->sigHeader = $sigHeader;
    }

    public function getSigHeader()
    {
        return $this->sigHeader;
    }
}
