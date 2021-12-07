<?php

require ('./vendor/autoload.php');

$credentials = null;
require_once 'auth.php';

echo 'Shortlink';
$shortlink = new \Intergo\SmsTo\Module\Shortlink\Shortlink($credentials);

// @TODO - Remove this line before the package go live
$shortlink->setBaseUrl('https://smsto.local.intergo.co');

// var_dump($shortlink->create('Sujit', 'https://sujitbaniya.com'));
// var_dump($shortlink->all());
var_dump($shortlink->getByID(69));
var_dump($shortlink->deleteByID(69));