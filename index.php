<?php
require_once ('SagePay.php');

$sagePay = new SagePay();
$sagePay->setCurrency('EUR');
$sagePay->setAmount('100');
$sagePay->setDescription('Lorem ipsum');
$sagePay->setBillingSurname('Mustermann');
$sagePay->setBillingFirstnames('Max');
$sagePay->setBillingCity('Cologne');
$sagePay->setBillingPostCode('50650');
$sagePay->setBillingAddress1('Bahnhofstr. 1');
$sagePay->setBillingCountry('de');
$sagePay->setDeliverySameAsBilling();

$sagePay->setSuccessURL('https://www.yoururl.com/success.php');
$sagePay->setFailureURL('https://www.yoururl.org/fail.php');


//get crypt content for your form "crypt" field
$cryptFieldContent = $sagePay->getCrypt();
