<?php
require_once ('SagePay.php');

if ($_REQUEST['crypt']) {
	$sagePay = new SagePay();
	$responseArray = $sagePay -> decode($_REQUEST['crypt']);

	//Check status of response
	if($responseArray["Status"] === "OK"){
		// Success
	}elseif($responseArray["Status"] === "ABORT"){
		// Payment Cancelled
	}else{
		// Payment Failed
		throw new \Exception($responseArray["StatusDetail"]);
	}

	print '<pre>';
	print_r($responseArray);
	print '</pre>';
	exit;
}
