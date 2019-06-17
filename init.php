<?php

if (!function_exists('curl_init')) {
    throw new Exception('JPaypp needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
    throw new Exception('JPaypp needs the JSON PHP extension.');
}
if (!function_exists('mb_detect_encoding')) {
    throw new Exception('JPaypp needs the Multibyte String PHP extension.');
}

require(dirname(__FILE__) . '/lib/SkrillPay/Log/SkrillPayLogger.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Log/SkrillPayLogFactory.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Log/SkrillPayDefaultLogFactory.php');

require(dirname(__FILE__) . '/lib/SkrillPay/Exception/SkrillPayConnectionException.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Exception/SkrillPaySignatureVerification.php');


require(dirname(__FILE__) . '/lib/SkrillPay/Core/SkrillPayConfigManager.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Core/SkrillPayCredentialManager.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Core/SkrillPayConstants.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Core/SkrillPayHttpConfig.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Core/SkrillPayHttpConnection.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Core/SkrillPayLoggingManager.php');

require(dirname(__FILE__) . '/lib/SkrillPay/Handler/IPayPalHandler.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Handler/OauthHandler.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Handler/RestHandler.php');


require(dirname(__FILE__) . '/lib/SkrillPay/Rest/ApiContext.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Rest/IResource.php');

require(dirname(__FILE__) . '/lib/SkrillPay/Common/ReflectionUtil.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Common/SkrillPayModel.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Common/SkrillPayResourceModel.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Common/SkrillPayRestCall.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Common/SkrillPayUserAgent.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Common/FormatConverter.php');


require(dirname(__FILE__) . '/lib/SkrillPay/Auth/OAuthTokenCredential.php');



require(dirname(__FILE__) . '/lib/SkrillPay/Validation/ArgumentValidator.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Validation/JsonValidator.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Validation/NumericValidator.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Validation/UrlValidator.php');


require(dirname(__FILE__) . '/lib/SkrillPay/Api/Checkout.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/Payer.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/PayerInfo.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/Customer.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/Amount.php');


require(dirname(__FILE__) . '/lib/SkrillPay/Api/WebhookStatus.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/WebhookResponse.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/VerifyWebhookSignature.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/VerifyWebhookSignatureResponse.php');
require(dirname(__FILE__) . '/lib/SkrillPay/Api/Webhook.php');
