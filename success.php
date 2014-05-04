<?php
require_once ('SagePay.php');

if ($_REQUEST['crypt']) {
	$responseArray = $sagePay -> decode($_REQUEST['crypt']);
	print '<pre>';
	print_r($responseArray);
	print '</pre>';
	exit;
}
