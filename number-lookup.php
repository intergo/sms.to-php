<?php

require ('./vendor/autoload.php');

$credentials = null;
require_once 'auth.php';

echo 'Number Lookup';
$hlr = new \Intergo\SmsTo\Module\NumberLookup\NumberLookup($credentials);

// @TODO - Remove this line before the package go live
$hlr->setBaseUrl('https://smsto.local.intergo.co');

var_dump($hlr->estimate('+9779856034616'));
var_dump($hlr->verify('+9779856034616'));