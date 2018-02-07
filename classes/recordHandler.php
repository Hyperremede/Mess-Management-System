<?php

include 'Bpay.php';

if(isset( $_POST['borderid'] )) {
		
	$recordArray = array();
	
	$regBpay = new Bpay();

	$borderid 		= $_POST['borderid'];
	$month_of 		= $_POST['month_of'];
	$year_of 		= $_POST['year_of'];

	$recordArray['borderid'] = $borderid;
	$recordArray['month_of'] = $month_of;
	$recordArray['year_of'] = $year_of;
	
	$recordArray['paymentRecords'] = $regBpay->getAllPaymentRecord($borderid,$month_of,$year_of);
	
	header('Content-Type: application/json');
    echo json_encode($recordArray);
}

?>