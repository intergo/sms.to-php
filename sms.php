<?php

require ('./vendor/autoload.php');

use \Intergo\SmsTo\Module\Sms;
use \Intergo\SmsTo\Module\Sms\Message;

$credentials = null;
require_once 'auth.php';

echo 'SMS Messaging';
$sms = new Sms\Sms($credentials);

// @TODO - Remove this line before the package go live
$sms->setBaseUrl('https://msms.local.intergo.co');

$message = new Message\SingleMessage();
$message->setTo('+9779856034616');
$message->setMessage('This is test');
var_dump($sms->estimate($message));

$message = new Message\CampaignMessage();
$message->setTo(['+9779856034616', '+9779805832689']);
$message->setMessage('This is test');
var_dump($sms->estimate($message));

$message = new Message\PersonalizedMessage();
$message->setMessages([
    [
        "to" => "+9779856034616",
        "message" => "This is test"
    ],
    [
        "to" => "+9779805832689",
        "message" => "This is another test"
    ],
]);
var_dump($sms->estimate($message));

$message = new Message\ListMessage();
$message->setListId(122);
$message->setMessage('This is test');
var_dump($sms->estimate($message));

echo 'Flash Messaging';
// Flash Messaging
$sms->setType('fsms');

$message = new Message\SingleMessage();
$message->setTo('+9779856034616');
$message->setMessage('This is test');
var_dump($sms->estimate($message));

$message = new Message\CampaignMessage();
$message->setTo(['+9779856034616', '+9779805832689']);
$message->setMessage('This is test');
var_dump($sms->estimate($message));

$message = new Message\PersonalizedMessage();
$message->setMessages([
    [
        "to" => "+9779856034616",
        "message" => "This is test"
    ],
    [
        "to" => "+9779805832689",
        "message" => "This is another test"
    ],
]);
var_dump($sms->estimate($message));

$message = new Message\ListMessage();
$message->setListId(122);
$message->setMessage('This is test');
var_dump($sms->estimate($message));


echo 'Viber Messaging';
// Viber Messaging
$sms->setType('viber');
$message = new Message\ViberMessage();
$message->setTo('+9779856034616');
$message->setMessage('This is test');
$message->setViberImageUrl('https://google.com');
$message->setViberTargetUrl('https://google.com');
var_dump($sms->estimate($message));


var_dump($sms->getLastMessage());