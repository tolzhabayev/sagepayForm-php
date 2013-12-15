<?php

if ($_REQUEST['crypt']) {
	$responseArray = $sagePay -> decode($_REQUEST['crypt']);
	print_r('<pre>'.$responseArray.'</pre>');
	exit;
}