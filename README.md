# smsto-php
A PHP library for communicating with the SMS.to REST API

## Installation

You need to be have an Sms.To account to use this package. If you do not have one, [get here](https://sms.to).

Require this package with composer.

```shell
composer require intergo/smsto-php
```

## Lets send SMS

```php
// Send an SMS using SMS.to REST API and PHP
<?php
$clientId = 6; // Your client id from www.sms.to
$clientSecret = 'xxxx'; // Your client secret from www.sms.to
$username = ''; // Your email from www.sms.to
$password = 'password'; // Your password from www.sms.to

$client = new Intergo\SmsTo\Http\Client($clientId, $clientSecret, $username, $password);
$messages = [['to' => '+63917*******', 'message' => 'Hi Market!']];
$response = $client->setMessages($messages)
		->setSenderId('COLTD')
   		->setCallbackUrl('https://mysite.org/smscallback')
   		->sendSingle();
var_dump($response);
```

## Documentation

The documentation for the SMS.to RESR API is located [here](https://sms.to/api-docs)


