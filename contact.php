<?php

require ('./vendor/autoload.php');

$credentials = null;
require_once 'auth.php';

echo 'Contact';
$contact = new \Intergo\SmsTo\Module\Contact\Contact($credentials);

// @TODO - Remove this line before the package go live
$contact->setBaseUrl('https://smsto.local.intergo.co');
/*var_dump($contact->allList());*/
/*var_dump($contact->getContactListByListID(123));*/
/*var_dump($contact->recentOptouts());*/
/*var_dump($contact->createList("List Red", "This is test list"));*/
/*var_dump($contact->create('+9779802532645', 217));*/
/*var_dump($contact->create('+9779802532646', 217, ['firstname' => 'Test', 'lastname' => 'User', 'email' => 'test_user@sms.to']));*/
/*var_dump($contact->deleteByPhone('+9779802532646'));*/
/*var_dump($contact->optinByPhone('+9779851032564'));
/*var_dump($contact->optoutByPhone('+9779805832689'));*/
/*var_dump($contact->deleteListByID(121));*/