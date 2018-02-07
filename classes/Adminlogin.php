<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php'); 
//include '../lib/Session.php';
Session::checkLogin();
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 



?>


<?php
class Adminlogin{

	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function AdminLogin($adminUser,$adminPass){
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);


		if (empty($adminUser) || empty($adminPass)) {
			$loginmsg = "Username Or Password must not be empty !";
			return $loginmsg;
		}else{
			$query = " SELECT * FROM mms_borders WHERE user_name = '$adminUser' AND password = '$adminPass' ";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("adminlogin", true);
				Session::set("adminId", $value['id']);
				Session::set("adminUser", $value['user_name']);
				Session::set("adminName", $value['full_name']);
				Session::set("adminType", $value['user_type']);
				header("Location:dashbord.php");
			}else{
				$loginmsg = "Username or Password not match ";
				return $loginmsg;
			}
		}
	}


}

?>

