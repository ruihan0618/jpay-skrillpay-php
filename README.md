# SkrillPay PHP bindings


You can sign up for a SkrillPay account at https://www.skrill.com.

## Requirements

PHP 5.6.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require jpaypp/jpay-skrillpay-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/SkrillPay/SkrillPay-php/releases). Then, to use the bindings, include the `init.php` file.

```php
require_once('/path/to/SkrillPay-php/init.php');
```

## Dependencies

The bindings require the following extensions in order to work properly:

- [`curl`](https://secure.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer
- [`json`](https://secure.php.net/manual/en/book.json.php)
- [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php) (Multibyte String)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Getting Started

Simple usage looks like:


init config 

```php
$skrill = new ApiContext(
    new OAuthTokenCredential(
        'demoqco@sun-fish.com',
        'skrill',
        'skrill123'
    )
);

$skrill->setConfig(
    array(
        'mode' => 'live',
        'log.LogEnabled' => true,
        'log.FileName' => APPS_PATH .'/../logs/SkrillPay.log',
        'log.LogLevel' => 'INFO', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
        'cache.enabled' => false,
        'http.CURLOPT_CONNECTTIMEOUT' => 30
    )
);


```



checkout
```php

$payer = new Payer();
$payer->setPaymentMethod('quick');


$payerInfo = new PayerInfo();

$payerInfo->setPayToEmail($skrill->getCredential()->getClientId())
    ->setLogoUrl('company logo url')
    ->setRecipientDescription('http://xxxx/company desc')
    ->setTransactionId(time())

    ->setReturnUrl('http://xxxx/callback.html')
    ->setReturnUrlTarget('_self')
    ->setReturnUrlText('返回信息描述')

    ->setCancelUrl('cancle.html')
    ->setCancelUrlTarget('_self')

    ->setStatusUrl('http://xxxx/notify.html');


$amount = new Amount();

$amount->setCurrency("EUR")
       ->setAmount('1')
       ->setDetail1Text('test')
       ->setDetail1Description('年费会员');

$checkout = new Checkout();

$checkout->setPayer($payer) //base
    ->setPayerInfo($payerInfo)  //merchant
    ->setCustomer( new Customer()) //customer
    ->setAmount($amount) //amount
    ->setPrepareOnly('1');  //generate a SID

try {
    $checkout->create($skrill);
} catch (\Exception $e) {
    echo json_encode(array('code'=>201,'data'=>$e->getMessage()))."\r\n";
    die();
}

$approvalUrl = $checkout->getApprovalLink();

```

Notify callback

```php


$skrill = new ApiContext(
    new OAuthTokenCredential(
        'demoqco@sun-fish.com',
        'skrill',
        'skrill123'
    )
);

$skrill->setConfig(
    array(
        'mode' => 'live',
        'log.LogEnabled' => true,
        'log.FileName' => APPS_PATH .'/../logs/SkrillPay.log',
        'log.LogLevel' => 'INFO', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
        'cache.enabled' => false,
        'http.CURLOPT_CONNECTTIMEOUT' => 30
    )
);

$payload = json_encode($_POST);

$hook = new Webhook();
$hook->setPayload($payload);

try{
    if($hook->verify($skrill)){
        $payload = $hook->getVerifyWebhookSignature()->getWebhookResponse();
        //业务处理

    }
}catch (Exception $e){

}
```



## Development

Get [Composer][composer]. For example, on Mac OS:

```bash
brew install composer
```

Install dependencies:

```bash
composer install
```
