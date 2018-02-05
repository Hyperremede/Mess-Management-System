<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php'); 
//include '../lib/Session.php';
// Session::checkLogin();
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 



?>


<?php
class Regularcost{

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function regularCostInsert($data){

		// $title 		= $this->fm->validation($data['title']);
		// $descp 		= $this->fm->validation($data['descp']);
		// $amount 	= $this->fm->validation($data['amount']);
		// $month_of 	= $this->fm->validation($data['month_of']);
		// $year_of 	= $this->fm->validation($data['year_of']);
		if(Session::get("adminlogin")){
			$title 		= mysqli_real_escape_string($this->db->link, $data['title']);
			$descp 		= mysqli_real_escape_string($this->db->link, $data['descp']);
			$amount 	= mysqli_real_escape_string($this->db->link, $data['amount']);
			$month_of 	= mysqli_real_escape_string($this->db->link, $data['month_of']);
			$year_of 	= mysqli_real_escape_string($this->db->link, $data['year_of']);


			if ($title == "" || $descp == "" || $amount == "" || $month_of == "" || $year_of == "" ) {
		    	$msg = "<span class='text-danger' >Fields must not be empty !</span>";
				return $msg;
				
			    }else{
		    	
		    	$query = " INSERT INTO mms_reguler_cost(title, descp, amount,entry_by, approved_by,month_of, year_of) VALUES('$title','$descp','$amount','".Session::get("adminId")."','".Session::get("adminId")."','$month_of','$year_of')";
		    	$regCostInsert = $this->db->insert($query);
				if ($regCostInsert) {
					$msg = " <span class='text-success'>Regular Cost Insarted Sucessfully</span> ";
					return $msg;
				}else{
					$msg = " <span class='error'>Regular Cost  Not Insarted </span> ";
					return $msg;
				}
		    }
		}else{
			Session::destroy();
		}
		


	}


}

?>

