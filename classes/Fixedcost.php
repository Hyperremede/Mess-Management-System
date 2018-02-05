<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php'); 
//include '../lib/Session.php';
// Session::checkLogin();
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 

class Fixedcost{

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function fixedCostInsert($data){

		$HomeRent        	= $this->fm->validation($data['HomeRent']);
		$ElectricityBill 	= $this->fm->validation($data['ElectricityBill']);
		$InternetBill    	= $this->fm->validation($data['InternetBill']);
		$DustBill       	= $this->fm->validation($data['DustBill']);
		$HouseMaidBill 		= $this->fm->validation($data['HouseMaidBill']);
		$GasBill 			= $this->fm->validation($data['GasBill']);
		$CableLineBill 		= $this->fm->validation($data['CableLineBill']);
		$ServiceBill 		= $this->fm->validation($data['ServiceBill']);
		$ExtraBill 			= $this->fm->validation($data['ExtraBill']);
		$ExtraDesc 			= $this->fm->validation($data['ExtraDesc']);
		$month_of 			= $this->fm->validation($data['month_of']);
		$year_of 			= $this->fm->validation($data['year_of']);

		$HomeRent 			= mysqli_real_escape_string($this->db->link, $data['HomeRent']);
		$ElectricityBill 	= mysqli_real_escape_string($this->db->link, $data['ElectricityBill']);
		$InternetBill 		= mysqli_real_escape_string($this->db->link, $data['InternetBill']);
		$DustBill 			= mysqli_real_escape_string($this->db->link, $data['DustBill']);
		$HouseMaidBill 		= mysqli_real_escape_string($this->db->link, $data['HouseMaidBill']);
		$GasBill 			= mysqli_real_escape_string($this->db->link, $data['GasBill']);
		$CableLineBill 		= mysqli_real_escape_string($this->db->link, $data['CableLineBill']);
		$ServiceBill 		= mysqli_real_escape_string($this->db->link, $data['ServiceBill']);
		$ExtraBill 			= mysqli_real_escape_string($this->db->link, $data['ExtraBill']);
		$ExtraDesc 			= mysqli_real_escape_string($this->db->link, $data['ExtraDesc']);
		$month_of 			= mysqli_real_escape_string($this->db->link, $data['month_of']);
		$year_of 			= mysqli_real_escape_string($this->db->link, $data['year_of']);


		if($month_of == "" || $year_of == ""){
			$msg = "<span class='text-danger' >Month Or Year can't be empty !!!</span>";
			return $msg;
		}else{
			$checkQuery = 'SELECT month_of,year_of FROM mms_fixed_cost WHERE month_of = "'.$month_of.'" AND year_of = "'.$year_of.'"';
			$fixedCostInsert = $this->db->select($checkQuery);
			if ($fixedCostInsert) {
				$msg = " <span class='text-success'>Fixed Cost For Month ".$this->GetMonthName($month_of).", ".$year_of." already been added.</span> ";
				return $msg;
			}else{
				$query = "INSERT INTO mms_fixed_cost(home_rent, electricity_bill, internet_bill, dust_bill, house_maid_bill, gas_bill, cable_line_bill,service_bill,extra_bill,extra_desc,month_of,year_of,entry_by) VALUES('$HomeRent','$ElectricityBill','$InternetBill','$DustBill','$HouseMaidBill','$GasBill','$CableLineBill','$ServiceBill','$ExtraBill','$ExtraDesc','$month_of','$year_of')";
		    	
		    	$fixedCostInsert = $this->db->insert($query);
				
				if ($fixedCostInsert) {
					$msg = " <span class='text-success'>Fixed Cost Insert Sucessfully For Month ".$this->GetMonthName($month_of).", ".$year_of."</span> ";
					return $msg;
				}else{
					$msg = " <span class='error'>Fixed Cost Unable To Insert Sucessfully </span> ";
					return $msg;
				}
			}
		}
	}

	public	function GetMonthName($monthNumber){
		$months = array (1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'Auguest',9=>'September',10=>'October',11=>'November',12=>'December');
		return $months[(int)$monthNumber];
	}


	public function getAllBorder(){
		$query = " SELECT * FROM mms_borders ORDER BY id  DESC ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllEditBorder($id){
		$query = " SELECT * FROM mms_borders WHERE id = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}


	public function borderUpdate($data, $id){
		$full_name 		= mysqli_real_escape_string($this->db->link, $data['full_name']);
		$user_name 		= mysqli_real_escape_string($this->db->link, $data['user_name']);
		$password 		= mysqli_real_escape_string($this->db->link, $data['password']);
		$user_type 		= mysqli_real_escape_string($this->db->link, $data['user_type']);
		$join_date 		= mysqli_real_escape_string($this->db->link, $data['join_date']);
		$last_login 	= mysqli_real_escape_string($this->db->link, $data['last_login']);
		$is_active 		= mysqli_real_escape_string($this->db->link, $data['is_active']);

		
	    if ($full_name == "" || $user_name == "" || $password == "" || $user_type == "" || $join_date == "" || $last_login == "" || $is_active == "" ) {
	    	$msg = "<span class='text-danger'>Fields must not be empty !</span>";
			return $msg;
			
		    }else{

				    	$query = "UPDATE mms_borders
				    				SET
				    				full_name = '$full_name',
				    				user_name = '$user_name',
				    				password = '$password',
				    				user_type = '$user_type',
				    				join_date = '$join_date',
				    				last_login = '$last_login',
				    				is_active = '$is_active'
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


}

?>


