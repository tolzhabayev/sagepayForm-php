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


/* Example of using BasketXML */
$xml = new DOMDocument();
$basketNode = $xml->createElement("basket");
$itemNode = $xml->createElement("item");

$descriptionNode =  $xml->createElement( 'description' );
$descriptionNode->nodeValue = 'First Item Description';
$itemNode -> appendChild($descriptionNode);

$quantityNode =  $xml->createElement('quantity');
$quantityNode->nodeValue = '1';
$itemNode -> appendChild($quantityNode);

$unitNetAmountNode =  $xml->createElement('unitNetAmount');
$unitNetAmountNode->nodeValue = '90.00';
$itemNode -> appendChild($unitNetAmountNode);

$unitTaxAmountNode =  $xml->createElement('unitTaxAmount');
$unitTaxAmountNode->nodeValue = '10.00';
$itemNode -> appendChild($unitTaxAmountNode);

$unitGrossAmountNode =  $xml->createElement('unitGrossAmount');
$unitGrossAmountNode->nodeValue = '100.00';
$itemNode -> appendChild($unitGrossAmountNode);

$totalGrossAmountNode =  $xml->createElement('totalGrossAmount');
$totalGrossAmountNode->nodeValue = '100.00';
$itemNode -> appendChild($totalGrossAmountNode);

$basketNode->appendChild( $itemNode );
$xml->appendChild( $basketNode );

$sagePay->setBasketXML($xml->saveHTML());



$sagePay->setSuccessURL('https://www.yoururl.com/success.php');
$sagePay->setFailureURL('https://www.yoururl.org/fail.php');
?>

<form method="POST" id="SagePayForm" action="https://test.sagepay.com/gateway/service/vspform-register.vsp">
	<input type="hidden" name="VPSProtocol" value= "3.00">
	<input type="hidden" name="TxType" value= "PAYMENT">
	<input type="hidden" name="Vendor" value= "YOURVERNODID">
	<input type="hidden" name="Crypt" value= "<?php echo $sagePay->getCrypt(); ?>">
	<input type="submit" value="continue to SagePay">
</form>
