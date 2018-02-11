<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php'); 
//include '../lib/Session.php';
// Session::checkLogin();
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 



?>


<?php
class Addborder{

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function borderInsert($data){
		$full_name = $this->fm->validation($data['full_name']);
		$user_name = $this->fm->validation($data['user_name']);
		$password = $this->fm->validation($data['password']);
		$user_type = $this->fm->validation($data['user_type']);
		$join_date = $this->fm->validation($data['join_date']);
		$is_active = $this->fm->validation($data['is_active']);

		$full_name 		= mysqli_real_escape_string($this->db->link, $data['full_name']);
		$user_name 		= mysqli_real_escape_string($this->db->link, $data['user_name']);
		$password 		= mysqli_real_escape_string($this->db->link, md5($data['password']));
		$user_type 		= mysqli_real_escape_string($this->db->link, $data['user_type']);
		$join_date 		= mysqli_real_escape_string($this->db->link, $data['join_date']);
		$is_active 		= mysqli_real_escape_string($this->db->link, $data['is_active']);


		if ($full_name == "" || $user_name == "" || $password == "" || $user_type == "" || $join_date == "" || $is_active == "" ) {
	    	$msg = "<span class='text-danger' >Fields must not be empty !</span>";
			return $msg;
			
		    }else{
	    	
	    	$query = " INSERT INTO mms_borders(full_name, user_name, password, user_type, join_date, is_active) VALUES('$full_name','$user_name','$password','$user_type','$join_date','$is_active')";
	    	$borderinsert = $this->db->insert($query);
			if ($borderinsert) {
				$msg = " <span class='text-success'>Border Insarted Sucessfully</span> ";
				return $msg;
			}else{
				$msg = " <span class='error'>Borderd Not Insarted </span> ";
				return $msg;
			}
	    }

	    

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


		public function delBorderById($id){
			$delquery = "DELETE FROM mms_borders WHERE id = '$id'  ";
			$deldata = $this->db->delete($delquery);
			if ($deldata) {
				$msg =" <span class='success'>Border Deleted Sucessfully</span> ";
				return $msg;
			}else{
				$msg =" <span class='error'>Border Not Deleted ! </span> ";
				return $msg;

			}
		}


}

?>