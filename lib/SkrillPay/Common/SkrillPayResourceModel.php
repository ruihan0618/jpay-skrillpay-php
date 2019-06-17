<?php


namespace SkrillPay\Common;

use SkrillPay\Rest\ApiContext;
use SkrillPay\Rest\IResource;

/**
 * Class SkrillPayResourceModel
 * An Executable SkrillPayModel Class
 *
 * @package SkrillPay\Common
 */
class SkrillPayResourceModel extends SkrillPayModel implements IResource
{


    /**
     * @param $url
     * @param $method
     * @param $payLoad
     * @param array $headers
     * @param null $apiContext
     * @param null $restCall
     * @param array $handlers
     * @return mixed
     * @throws \SkrillPay\Exception\SkrillPayConnectionException
     */
    protected static function executeCall($url, $method, $payLoad, $headers = array(), $apiContext = null, $restCall = null, $handlers = array('SkrillPay\Handler\RestHandler'))
    {
        //Initialize the context and rest call object if not provided explicitly
        $apiContext = $apiContext ? $apiContext : new ApiContext();
        $restCall = $restCall ? $restCall : new SkrillPayRestCall($apiContext);

        //Make the execution call
        $json = $restCall->execute($handlers, $url, $method, $payLoad, $headers);
        return $json;
    }
}
