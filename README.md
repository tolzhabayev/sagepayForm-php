sagepayForm-php
===============

A simple class to integrate sagepayForm v3.00 into your website. Since there is no sage php integration kit out yet - may be useful for someone.

To get started change the protected field $encryptPassword and look into index.php for example form, success.php for example response parsing.`

#Integration is easy

```php
<?php
require_once('lib/SagePay.php');

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
?>

<form method="POST" id="SagePayForm" action="*https://test.sagepay.com/gateway/service/vspform-register.vsp*">
	<input type="hidden" name="VPSProtocol" value= "3.00">
	<input type="hidden" name="TxType" value= "PAYMENT">
	<input type="hidden" name="Vendor" value= "*YOURVERNODID*">
	<input type="hidden" name="Crypt" value= "<?php echo $sagePay->getCrypt(); ?>">
	<input type="submit" value="continue to SagePay">
</form>
```

Or use chaining:
```php
$sagePay = new SagePay();
$sagePay
  ->setCurrenty('EUR')
  ->setAmount('100')
  ->setDescription('Lorem ipsum')
  ....
```  

For more examples see index.php
  
  
