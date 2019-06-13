<?php
/*class Admin{
var $conn;
	function __construct(){
		$this->conn=new mysqli('localhost','root','08032934439','hr_portal');
	
	}
	function Add_employee($fullname,$email,$phone,$date,$address,$department,$position,$referee1,$referee2,$pass,$accesslevel,$pix){
		$query="INSERT INTO employee_details SET employee_name='$fullname',employee_email='$email',employee_phone='$phone', employment_date='$date', employee_address='$address', employee_department='$department',employee_position='$position', referee1='$referee1', referee2='$referee2',password='$pass',access_level='$accesslevel',passport='$pix'"; 
		// $query="INSERT INTO admin_login SET  employee_email='$email',password='$pass';";

		$this->conn->query($query);
	 $spid= $this->conn->insert_id;
	$query1="INSERT INTO user_login SET staff_id='$spid',employee_email='$email',password='$pass',access_level='$accesslevel'";
$this->conn->query($query1);
		
		}
	}*/
?>