<?php

namespace SkrillPay\Log;

use Psr\Log\LoggerInterface;

/**
 * Class SkrillPayDefaultLogFactory
 *
 * This factory is the default implementation of Log factory.
 *
 * @package SkrillPay\Log
 */
class SkrillPayDefaultLogFactory implements SkrillPayLogFactory
{
    /**
     * Returns logger instance implementing LoggerInterface.
     *
     * @param string $className
     * @return LoggerInterface instance of logger object implementing LoggerInterface
     */
    public function getLogger($className)
    {
        return new SkrillPayLogger($className);
    }
}
