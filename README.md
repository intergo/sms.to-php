# smsto-php
A PHP library for communicating with the SMS.to REST API

## Installation

You need to have an working account on  Sms.To with sufficient balance loaded to be able to use this package. If you do not have one, [please get one here](https://sms.to).

Require this package with composer.

```shell
composer require intergo/smsto-php
```

## Prepare Client

```php
<?php
$clientId = 6; // Your client id from www.sms.to
$clientSecret = 'xxxx'; // Your client secret from www.sms.to
$username = 'email@example.com'; // Your email from www.sms.to
$password = 'password'; // Your password from www.sms.to
$client = new Intergo\SmsTo\Http\Client($clientId, $clientSecret, $username, $password);

```

## Lets send SMS

```php
// Send an SMS using SMS.to REST API and PHP
<?php

$messages = [['to' => '+63917*******', 'message' => 'Hi Market!']];
$response = $client->setMessages($messages)
		->setSenderId('YOUR_NAME')
   		->setCallbackUrl('https://your-site.com/smscallback')
   		->sendSingle();
var_dump($response);
```


### Sending SMS to multiple numbers (broadcasting):
```php
// Text message that will be sent to multiple numbers:
$message = 'Hello World!';

// Array of mobile phone numbers (starting with the "+" sign and country code):
$recipients = ['+4474*******', '+35799******', '+38164*******'];

// Send (broadcast) the $message to $recipients: 
SmsTo::setMessage($message)
    ->setRecipients($recipients)
    ->sendMultiple();
```
As for the sender ID and callback URL, the values set in the configuration file will be used by default. You can also specify these values by using the `->setSenderId()` and `->setCallbackUrl()` methods:
```php
SmsTo::setMessage($message)
    ->setRecipients($recipients)
    ->setSenderId('YOUR_NAME')
    ->setCallbackUrl('https://your-site.com/smscallback')
    ->sendMultiple();
```
Please note that using these methods will override the values set in the configuration file.


### Sending different SMS to single numbers:

```php
 $messages = [
    [
        'to' => '+4474*******',
        'message' => 'Hello World!'
    ],
    [
        'to' => '+35799******',
        'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
    ],
];

SmsTo::setMessages($messages)->sendSingle();
```

### Sending single SMS to a list:

```php
    $message = 'Hello World!';
    SmsTo::setMessage($message)
     ->setListId(1)
     ->setSenderId('YOUR_NAME')
     ->setCallbackUrl('https://your-site.com/smscallback')
     ->sendList();
```

### Get Balance:

```php

SmsTo::getBalance();
```

### Fetch paginated lists:

```php
SmsTo::getLists(['limit' => 100, 'page' => 1, 'sort' => 'created_at', 'search' => 'My List']);
```

| Parameter        | Value           | Required  |
| ------------- |-------------| -----|
| limit      | 100 | No |
| page      | 1      |   No |
| sort | created_at      |   No |
| search | name | No |

### Fetch single list:

```php
SmsTo::getList(1);
```
| Parameter        | Value           | Required  |
| ------------- |-------------| -----|
| list id      | 1 | Yes |


## Documentation

The documentation for the SMS.to REST API is located [here](https://sms.to/api-docs)
