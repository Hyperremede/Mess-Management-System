<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Bpay.php'); 
include_once ($filepath.'/../classes/Meal.php'); 

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

if(isset( $_POST['MyBoarderID'] )) {
		
	$recordArray = array();
	
	$regBpay = new Meal();

	$borderid 		= $_POST['MyBoarderID'];
	$month_of 		= $_POST['month_of'];

	$recordArray['borderid'] = $borderid;
	$recordArray['month_of'] = $month_of;
	
	$recordArray['paymentRecords'] = $regBpay->getAllMealRecord($borderid,$month_of);
	
	header('Content-Type: application/json');
    echo json_encode($recordArray);
}


if(isset( $_POST['reportMonth'] )) {
		
	$recordArray = array();
	
	$regBpay = new Meal();

	$month_of 		= $_POST['reportMonth'];

	$recordArray['month_of'] = $month_of;
	$recordArray['year_of'] = date('Y');

	$recordArray['totalDay'] = date("t",mktime(0,0,0,$month_of,1,date('Y')));;
	
	$recordArray['MealRecord'] = $regBpay->MealRecord($month_of);
	$recordArray['alBoarder'] = $regBpay->getAllborderForAjax();
	
	header('Content-Type: application/json');
    echo json_encode($recordArray);
}

?>