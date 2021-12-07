<?php

require ('./vendor/autoload.php');

use \Intergo\SmsTo\Credentials;
use Intergo\SmsTo\Module\Auth\Credential;

/* Uncomment line below to validate request by using API Key */
// $auth = new Credential(new Credentials\ApiKeyCredential('mxWCJy6l4zIoPXb2lvlVCA7N5kFVXucy'));

/* Uncomment line below to validate request by using ClientID and Secret */
$auth = new Credential(new Credentials\OauthCredential('9fKgec0vCE4rJZOD', 'xmdqzFT6Cl6NxLgjTFwbFoxNOO04XcXm'));

// @TODO - Remove this line before the package go live
$auth->setBaseUrl('https://msas.local.intergo.co');

$credentials = $auth->verify();
