<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php'); 
//include '../lib/Session.php';
// Session::checkLogin();
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 



?>


<?php
class Meal{

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function mealInsert($data){

		if(Session::get("adminlogin")){

			$border        	= $this->fm->validation($data['border']);
			$amount 		= $this->fm->validation($data['amount']);
			$comment    	= $this->fm->validation($data['comment']);
			$date       	= $this->fm->validation($data['date']);

			$border 		= mysqli_real_escape_string($this->db->link, $data['border']);
			$amount 		= mysqli_real_escape_string($this->db->link, $data['amount']);
			$comment 		= mysqli_real_escape_string($this->db->link, $data['comment']);
			$date 			= mysqli_real_escape_string($this->db->link, $data['date']);


			if ($border == "" || $amount == "" || $date == "" ) {
		    	
		    	$msg = "<span class='text-danger' >Fields must not be empty !</span>";
				return $msg;

			}else{

				$checkQuery = 'SELECT * FROM mms_meal WHERE entry_date LIKE "'.$date.'%" AND boarder_id = "'.Session::get("adminId").'"';
				
				$fixedCostInsert = $this->db->select($checkQuery);
				
				if ($fixedCostInsert) {
					$msg = " <span class='text-danger'>Meal has been taken for ".$date."</span> ";
					return $msg;
				}else{
		    	
			    	$query = " INSERT INTO mms_meal(boarder_id, total_meal, note,entry_date,entry_by) VALUES('$border','$amount','$comment','$date','".Session::get("adminId")."')";
			    	$regCostInsert = $this->db->insert($query);
					if ($regCostInsert) {
						$msg = " <span class='text-success'>Insarted Sucessfully</span> ";
						return $msg;
					}else{
						$msg = " <span class='text-danger'>Not Insarted </span> ";
						return $msg;
					}
				}
		    }
		}else{
			Session::destroy();
		}

	}



	public function getAllborder(){

		if(Session::get("adminType") == 1){
			$query = "SELECT id,full_name FROM mms_borders WHERE id = '".Session::get("adminId")."' ORDER BY id ASC ";
		}else if(Session::get("adminType") == 2){
			$query = "SELECT id,full_name FROM mms_borders ORDER BY id ASC ";
		}else{
			$query = "SELECT id,full_name FROM mms_borders ORDER BY id ASC ";
		}
		
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllborderForAjax(){

		if(Session::get("adminType") == 1){
			$query = "SELECT id,full_name FROM mms_borders WHERE id = '".Session::get("adminId")."' ORDER BY id ASC ";
		}else if(Session::get("adminType") == 2){
			$query = "SELECT id,full_name FROM mms_borders ORDER BY id ASC ";
		}else{
			$query = "SELECT id,full_name FROM mms_borders ORDER BY id ASC ";
		}
		
		$result = $this->db->select($query);
		$resArray = array();

		if($result){
			while($data = $result->fetch_assoc()){
				array_push($resArray, $data);
			}
		}
		return $resArray;
	}

	public function getAllMealRecord($borderid,$month_of){
		
		$border_id 	= mysqli_real_escape_string($this->db->link, $borderid);
		$month 		= mysqli_real_escape_string($this->db->link, $month_of);
		$year 		= date('Y');

		$date = $year.'-'.$month;

		$query = 'SELECT * FROM mms_meal WHERE entry_date LIKE "'.$date.'%" AND boarder_id = "'.$border_id.'"';
				
		
		$result = $this->db->select($query);
		$resArray = array();

		if($result){
			while($data = $result->fetch_assoc()){
				array_push($resArray, $data);
			}
		}
		return $resArray;
	}

	public function MealRecord($month_of){
		
		$month 		= mysqli_real_escape_string($this->db->link, $month_of);
		$year 		= date('Y');

		$date = $year.'-'.$month;

		$query = 'SELECT * FROM mms_meal WHERE entry_date LIKE "'.$date.'%"';
				
		
		$result = $this->db->select($query);
		$resArray = array();

		if($result){
			while($data = $result->fetch_assoc()){
				array_push($resArray, $data);
			}
		}
		return $resArray;
	}


	public function regCostUpdate($data, $id){


		$title 			= mysqli_real_escape_string($this->db->link, $data['title']);
		$descp 			= mysqli_real_escape_string($this->db->link, $data['descp']);
		$amount 		= mysqli_real_escape_string($this->db->link, $data['amount']);
		$entry_by 		= mysqli_real_escape_string($this->db->link, $data['entry_by']);
		$approved_by 	= mysqli_real_escape_string($this->db->link, $data['approved_by']);
		$month_of 		= mysqli_real_escape_string($this->db->link, $data['month_of']);
		$year_of 		= mysqli_real_escape_string($this->db->link, $data['year_of']);

		
	    if ($title == "" || $descp == "" || $amount == "" || $entry_by == "" || $approved_by == "" || $month_of == "" || $year_of == "" ) {
	    	$msg = "<span class='text-danger'>Fields must not be empty !</span>";
			return $msg;
			
	    }else{

	    	$query = "UPDATE mms_reguler_cost
	    				SET
	    				full_name = '$title',
	    				user_name = '$descp',
	    				amount = '$amount',
	    				entry_by = '".Session::get("adminId")."',
	    				approved_by = '".Session::get("adminId")."',
	    				month_of = '$month_of',
	    				year_of = '$year_of'
	    				WHERE id= '$id' ";
	    	$updated_row = $this->db->update($query);
			if ($updated_row) {
			$msg = " <span class='text-success'>Border Updated Sucessfully</span> ";
				return $msg;
			}else{
				$msg = " <span class='text-danger'>product Not Updated ! </span> ";
				return $msg;
			}
	    }

	}


	public function delRegCostById($id){
		$query = " DELETE FROM mms_reguler_cost WHERE id = '$id' ";
		$delCost = $this->db->delete($query);
		if ($delCost) {
			$msg =" <span class='success'>Category Deleted Sucessfully</span> ";
			return $msg;
		}else{
			$msg =" <span class='error'>Category Not Deleted ! </span> ";
			return $msg;

		}
	}



	public function getCostById($id){
		$query = "SELECT * FROM mms_reguler_cost WHERE id = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}


}

?>





