<?php

require ('./vendor/autoload.php');

$credentials = null;
require_once 'auth.php';

echo 'Team';
$team = new \Intergo\SmsTo\Module\Team\Team($credentials);

// @TODO - Remove this line before the package go live
$team->setBaseUrl('https://smsto.local.intergo.co');

/*var_dump($team->allMembers());
var_dump($team->allInvitations());
var_dump($team->generateMember()); // 2458 ; new  - 2851*/
/*var_dump($team->creditMemberByID(2851, 5));*/
/*var_dump($team->debitMemberByID(2851, 5));*/
/*var_dump($team->disableMemberByID(2851));*/
/*var_dump($team->enableMemberByID(2851));*/
var_dump($team->inviteMemberByEmail('test656@gmail.com'));
var_dump($team->allInvitations());