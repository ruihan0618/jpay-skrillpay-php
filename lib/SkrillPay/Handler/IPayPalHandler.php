<?php

namespace SkrillPay\Handler;

/**
 * Interface ISkrillPayHandler
 *
 * @package SkrillPay\Handler
 */
interface ISkrillPayHandler
{
    /**
     *
     * @param \SkrillPay\Core\SkrillPayHttpConfig $httpConfig
     * @param string $request
     * @param mixed $options
     * @return mixed
     */
    public function handle($httpConfig, $request, $options);
}
