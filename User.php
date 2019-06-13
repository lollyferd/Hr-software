<?php
/*

program: my HR_PROPER CLASS
Author: Okafor Ikenna
Date: 02/March/2019
*/


session_start();
class User{
var $conn;
//connect to db method
public	function __construct(){
		$this->conn=new mysqli('localhost','root','','hr_portal');

		// check connection
			if($this->conn->connect_error){
				die("Connection Failed ".$this->conn->connect_error);
			}else{
				//echo "connection successful";
			}
	
	}
	//register new employee method 
	 public   function Add_employee($fullname,$email,$phone,$date,$address,$department,$position,$referee1,$referee2,$pass,$accesslevel,$dob,$stateoforigin,$lg){

				if($_FILES['userimage']['error'] == 0){

				// specify the destination folder to upload files to
				$folder = "uploads/";
				$filesize = $_FILES['userimage']['size'];
				$filename = $_FILES['userimage']['name'];
				$filetype = $_FILES['userimage']['type'];
				$tempfolder = $_FILES['userimage']['tmp_name'];

				// get the file extension
				$file_ext = explode('.',$filename);
				$file_ext = end($file_ext);
				$file_ext = strtolower($file_ext);

				// specify extensions allowed
				$extensions = array('png', 'jpg', 'jpeg', 'gif');

				// check for valid extension
				if(in_array($file_ext, $extensions)===false){
					$error[] = "extension not allowed!";
				}

				// check the file size
				if($filesize > 2097152){
					$error[] = "File size must be exactly or less than 2 mb!";
				}

				$filename = time();
				$destination = $folder.$filename.".$file_ext";

				if(empty($error)==true){
					move_uploaded_file($tempfolder, $destination);


		$query="INSERT INTO employee_details SET employee_name='$fullname',employee_email='$email',employee_phone='$phone', employment_date='$date', employee_address='$address', employee_department='$department',employee_position='$position', referee1='$referee1', referee2='$referee2',access_level='$accesslevel',userimage='$destination',dob='$dob',stateoforigin='$stateoforigin',lg='$lg'"; 
		

		$this->conn->query($query);

	 $spid= $this->conn->insert_id;
	

	$query1="INSERT INTO user_login SET staff_id='$spid',employee_email='$email',pass='$pass',access_level='$accesslevel'";
         
// checking if insert statement is okay
					if($this->conn->query($query1)===true){
						$result = "<div class='alert alert-success'>User Registration was successfully</div>";
					}else{
						$result = "Error ".$this->conn->error;
					}

				}else{
					var_dump($error);
				}



			}else{
				$result = "<div class='alert alert-danger'>you've not uploaded any image</div>";
			}


			return $result;



		
		}
		function login($email,$pass){
			$dashquery="SELECT * FROM user_login WHERE employee_email='$email'AND pass='$pass' ";
			

			$result = $this->conn->query($dashquery);
			return $result->num_rows;

		}
//contact us form method
function contact($fullname, $email, $phone, $message ){
	$contact="INSERT INTO contact_us SET fullname='$fullname',email='$email', phone='$phone',message='$message'";
	$this->conn->query($contact);
}

function getallstaff($email){

	$all=$this->conn->query("SELECT * FROM employee_details WHERE employee_email='$email'");
	$row=$all->fetch_assoc();


	return $row;
}

function insertpf($employeeid,$attendance,$budget,$ethics){


	$job="INSERT INTO performance SET performance_staff_id='$employeeid',Attendance='$attendance',Budget='$budget',Ethics='$ethics'";

$job1=$this->conn->query($job);
return $job1;

}

function getnameid(){
$nameid=$this->conn->query("SELECT * FROM employee_details");
 while ($row4[]=$nameid->fetch_assoc()) {
    	# code...
    } 
return $row4;


}


function getpf($staff_id){

	$pf=$this->conn->query("SELECT * FROM performance WHERE performance_staff_id='$staff_id'");
	$row1=$pf->fetch_assoc();


	return $row1;
}

function details(){
	$result=$this->conn->query("SELECT * FROM employee_details");
	while ($row8[]=$result->fetch_assoc()) {
		# code...
	}
	return $row8;
	}

function getpro($id1){
	$result1=$this->conn->query("SELECT * FROM employee_details WHERE staff_id='$id1'");

	$row11=$result1->fetch_assoc();
	return $row11;
}


//performance update method
function updatepf($employeeid,$attendance,$budget,$ethics){
	$doit=$this->conn->query("UPDATE performance SET Attendance='$attendance',Budget='$budget',Ethics='$ethics' WHERE performance_staff_id='$employeeid'");

}

//performance display method
function selectpf($staff_id){

	$slpf=$this->conn->query("SELECT * FROM performance WHERE performance_staff_id='$staff_id'");

return $slpf->num_rows;


}

//employee record update method
function updateprofile($fullname,$phone,$date,$address,$department,$position,$referee1,$referee2,$dob,$stateoforigin,$lg,$id){

if($_FILES['userimage']['error'] == 0){

				// specify the destination folder to upload files to
				$folder = "uploads/";
				$filesize = $_FILES['userimage']['size'];
				$filename = $_FILES['userimage']['name'];
				$filetype = $_FILES['userimage']['type'];
				$tempfolder = $_FILES['userimage']['tmp_name'];

				// get the file extension
				$file_ext = explode('.',$filename);
				$file_ext = end($file_ext);
				$file_ext = strtolower($file_ext);

				// specify extensions allowed
				$extensions = array('png', 'jpg', 'jpeg', 'gif');

				// check for valid extension
				if(in_array($file_ext, $extensions)===false){
					$error[] = "extension not allowed!";
				}

				// check the file size
				if($filesize > 2097152){
					$error[] = "File size must be exactly or less than 2 mb!";
				}

				$filename = time();
				$destination = $folder.$filename.".$file_ext";

				if(empty($error)==true){
					move_uploaded_file($tempfolder, $destination);







$query="UPDATE  employee_details SET employee_name='$fullname',employee_phone='$phone', employment_date='$date', employee_address='$address', employee_department='$department',employee_position='$position', referee1='$referee1', referee2='$referee2',userimage='$destination',dob='$dob',stateoforigin='$stateoforigin',lg='$lg' WHERE staff_id='$id'"; 
         if($this->conn->query($query)===true){
						$result = "User Update was successfully";
					}else{
						$result = "Error ".$this->conn->error;
					}

				}else{
					//var_dump($error);
				}



			}else{
				$result = "User Update Not successful";
			}


			return $result;



		
		}


//search employee for profile edit method
public function searchUser($search){

			$sql = "SELECT * FROM employee_details WHERE employee_name LIKE '%$search%' ORDER BY staff_id";
			$result = $this->conn->query($sql);
			//$row = $result->fetch_all(MYSQLI_BOTH);

			while($row = $result->fetch_assoc()){
				$rowdata[] = $row;
			}

			return $rowdata;
		}




      

//post quotes method
public function quotes($type,$comment){
$id=$_SESSION['userid'];


	$sql= "INSERT INTO quotes set staff_id='$id', qtype='$type',qcomment='$comment'";
//$this->conn->query($sql);
	if ($this->conn->query($sql)==true) {
	$result	=  "<div class='alert alert-success'>Post updated successfully</div>";
                           
		
	}

else{
	$result = "<div class='alert alert-danger'>:Error in post, please contact ICT Unit</div>";
                          

}
return $result;

 }


//display weekly quotes method
public function selectQuotesw(){
		$sql="SELECT * FROM quotes  WHERE qtype='weekly' ORDER BY quotes_id DESC";
	$result = $this->conn->query($sql);
	 $row = $result->fetch_assoc();
	 	
	 
	 return $row;
}
//display monthly quotes method
public function selectQuotesm(){
	$sql="SELECT * FROM quotes  WHERE qtype='monthly' ORDER BY quotes_id DESC;";
	$result = $this->conn->query($sql);
	 $row = $result->fetch_assoc();
	 	
	 
	 return $row;
}


//password reset method
function pReset($email,$cpass,$npass){
			$dashquery="SELECT * FROM user_login WHERE employee_email='$email'AND pass='$cpass' ";
			

			$result = $this->conn->query($dashquery);
			$k=$result->num_rows;

			if ($k > 0) {
				

				$this->conn->query("UPDATE user_login SET pass='$npass' WHERE employee_email='$email'");

				$result="<div class='alert alert-success'>Password Reset successful</div>";
			}
			else{
				$result="<div class='alert alert-danger'>Incorrect current password</div>";
			}

			return $result;

		}


//display current employee birthday
public function birthday(){
	
	$sql="SELECT * FROM employee_details WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')";
	
	$result=$this->conn->query($sql);
	$row = $result->fetch_assoc();


return $row;
}
//leave application method
public function leaveapply($id,$leavetype,$comment,$startdate,$enddate,$leaveduration){
	$sql="INSERT INTO leave_application SET lstaff_id='$id',leavetype='$leavetype',comment='$comment',startdate='$startdate',enddate='$enddate',leaveduration='$leaveduration' ";
if ($this->conn->query($sql)==true) {
	$result="<div class='alert alert-success'>"."Your"." "."$leaveduration" ."days Leave Application is Awaiting approval</div>";
}else{$result="<div class='alert alert-danger'>Leave Application Failed</div>";
}

return $result;	
}
//display pending leave method
public function viewleave(){
	$sql="SELECT * FROM leave_application INNER JOIN employee_details ON lstaff_id=staff_id WHERE adminapproved IS NULL;" ;
	$result=$this->conn->query($sql);
	while($row[] = $result->fetch_assoc()){
				
			}
return $row;
}

//admin leave approval method
public function adminapproved($status,$id){
	$sql="UPDATE  leave_application SET adminapproved='$status', dateapproved=DATE_FORMAT(CURDATE(), '%Y-%m-%d') WHERE leave_id='$id'";

	if ($this->conn->query($sql)==true) {
		$result="leave successfully";
	}else{$result="leave Failed";
}
return $result;
}

//Super Admin leaveview method
public function viewleavesuper(){
	$sql="SELECT * FROM leave_application INNER JOIN employee_details ON lstaff_id=staff_id WHERE adminapproved IS NOT NULL and hrapproved IS NULL;" ;
	$result=$this->conn->query($sql);
	while($row[] = $result->fetch_assoc()){
				
			} 
return $row;
}


//HR leave approval method

public function hrapproved($status,$id){
	$sql="UPDATE  leave_application SET hrapproved='$status', dateapprovedhr=DATE_FORMAT(CURDATE(), '%Y-%m-%d') WHERE leave_id='$id'";

	if ($this->conn->query($sql)==true) {
		$result="leave successfully";
	}else{$result="leave Failed";
}
return $result;
}

//display leave status to employee
public function leaveStatus($id){
	$sql="SELECT * FROM leave_application where lstaff_id='$id' AND hrapproved is NULL ORDER BY leave_id DESC";
	$result=$this->conn->query($sql);
	 $row = $result->fetch_assoc();
	 return $row;
}



//leave notification 

public function leaveNotify($id){
	$sql="SELECT * FROM leave_application WHERE lstaff_id='$id' AND adminapproved is NOT NULL and hrapproved is not NULL and status is NULL order by leave_id desc";
     $result=$this->conn->query($sql);
	 
	 return $result->num_rows;
	
}
//leave unread display method
public function leaveunread($id){
	$sql="SELECT * FROM leave_application WHERE lstaff_id='$id' AND adminapproved is NOT NULL and hrapproved is not NULL and status is NULL order by leave_id desc";
     $result=$this->conn->query($sql);

  while ($row[]=$result->fetch_assoc()) {
  	
  }
       	
       
	 
	 return $row;
	
}

//leave read status update method
public function leaveread($id,$status){
	$sql="UPDATE leave_application set status='$status' WHERE leave_id='$id'";
	$result=$this->conn->query($sql);
}


//leave read notification display method
public function leavereadstatusupdate($id){
	$sql="SELECT * FROM leave_application WHERE leave_id='$id' AND adminapproved is NOT NULL and hrapproved is not NULL";
     $result=$this->conn->query($sql);

 $row=$result->fetch_assoc();
  	
  
       	
       
	 
	 return $row;
	
}




//loan application method
public function loanApply($loanA,$duration,$loanP){
	$id=$_SESSION['userid'];

		$sql="INSERT INTO loan_application SET staff_id='$id',loan_amount='$loanA',duration='$duration',loan_purpose='$loanP'";

		
		if ($this->conn->query($sql)==true) {
			$result="<div class='alert alert-success'>Loan Application successful</div>";
		}
		else{
			$result="<div class='alert alert-danger'>Error:Loan Application Failed</div>";
		}

		return $result;
}


//display loan pending approval method
public function viewloan(){
	$sql="SELECT * FROM loan_application INNER JOIN employee_details ON loanstaff_id = staff_id WHERE approval IS NULL;" ;
	$result=$this->conn->query($sql);
	while($row[] = $result->fetch_assoc()){
				
			}
return $row;

}
//loan approval method
public function loanapprove($status,$id){
	$sql="UPDATE  loan_application SET approval='$status',approvaldate=DATE_FORMAT(CURDATE(), '%Y-%m-%d %h:%m:%s') WHERE loan_application_id='$id'";

	if ($this->conn->query($sql)==true) {
		$result="Pending Staff loan ";
	}else{$result="Loan Approval Failed";
}
return $result;
}

//new post method
public function postnews($id,$newstitle,$content){
	$sql="INSERT into news set staff_id='$id', news_title='$newstitle',news_content='$content',createdate=DATE_FORMAT(CURDATE(), '%Y-%m-%d')";
	$this->conn->query($sql);

	 $newsid= $this->conn->insert_id;

	 $sql2="INSERT INTO news_notify set news_id_notify=$newsid";

	if ($this->conn->query($sql2)==true) {
		// $result='success';
		// }else{$result='Failed';}
		// return $result;
	$feedback = array('msg'=> 'Post successful',
                           'msgclass'=>'success');
    	}else{
    		$feedback = array('msg'=> 'Failed',
                           'msgclass'=>'error');
    	}
    	return json_encode($feedback); 
}
//news display method
public function newsdisplay(){
	
	$sql="SELECT * from news INNER JOIN employee_details on employee_details.staff_id=news.staff_id ";
	$result=$this->conn->query($sql);

	while ($row[]=$result->fetch_assoc()) {
		
	}
	return $row;
}

public function banks(){
	$sql="SELECT * FROM banks";
	$result=$this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;
}

//payment details insertion method
public function paymentdetails($employeename, $bank, $accountnumber,$accountname,$accounttype){

$sql="INSERT INTO account_details set employee_name='$employeename',bank='$bank',account_no='$accountnumber',account_name='$accountname',account_type='$accounttype'";

if ($this->conn->query($sql)==true) {

$feedback = array('msg'=> 'Payment details registered successfully',
                           'msgclass'=>'success');
    	}else{
    		$feedback = array('msg'=> 'Payment Registration Failed',
                           'msgclass'=>'error');
    	}

return json_encode($feedback);

}
// deduction type insertion method
public function insertdeductiontype($deductiontype){

	$sql="INSERT INTO deductions_type set deduction_name='$deductiontype'";
		if ($this->conn->query($sql)==true) {
			$result='<div class="alert alert-info">successfully Inserted</div>';
		}
		else{$result='<div class="alert alert-danger">Failed, Please try again later</div>';}
		return $result;
}

//deduction type selection method 

public function selectdeductiontype(){
	$sql="SELECT * from deductions_type";

	$result=$this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;
}
//insert deduction method
public function insertdeductions($employeeid,$deductionname,$amount,$status){
	$sql = "INSERT INTO deductions set employee_id='$employeeid',deduction_name='$deductionname', amount='$amount',status='$status'";
	if ($this->conn->query($sql)==true) {
		$result='<div class="alert alert-success">Employee deduction setup successful</div>';
	}else{
		$result='<div class="alert alert-danger">Failed, Please try again later</div>';
	}

	return $result;

}
//check if a record is existing deduction method
public function selectdeduct($deductionname,$employeeid){

	$sql = "SELECT * from deductions where deduction_name='$deductionname' and employee_id='$employeeid'";
	$result = $this->conn->query($sql);
	return $result->num_rows;
}
//update and existing deduction record method
// public function updatedeductions($amount,$deductionname,$employeeid){
// $sql = "UPDATE deductions set amount='$amount' WHERE deduction_name='$deductionname' and employee_id='$employeeid' ";
// 	if ($this->conn->query($sql)==true) {
// 		$result='<div class="alert alert-success">Employee deduction Updated successfully</div>';
// 	}else{
// 		$result='<div class="alert alert-danger">Failed, Please try again later</div>';
// 	}

// 	return $result;


//}
//payslip deduction display method
public function payslipdeduction($nameid){
	$sql = "SELECT  * from deductions where employee_id='$nameid' AND status='fixed' or DATE_FORMAT(createdate, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')";
	$result = $this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;
}

// allowance type insertion method
public function insertallowancetype($allowancetype){

	$sql="INSERT INTO allowances_type set allowance_name='$allowancetype'";
		if ($this->conn->query($sql)==true) {
			$result='<div class="alert alert-info">successfully Inserted</div>';
		}
		else{$result='<div class="alert alert-danger">Failed, Please try again later</div>';}
		return $result;
}
//select allowance type method
public function selecttype(){
	$sql="SELECT * FROM allowances_type";
	$result = $this->conn->query($sql);

	while ($row[] = $result->fetch_assoc()) {
		
	}
return $row;
}

//insert into allowances table method

public function insertallowance($employeeid, $allowancename, $amount,$status){
	$sql = "INSERT INTO allowances set employee_id='$employeeid', allowancename='$allowancename',amount='$amount',status='$status'";
if ($this->conn->query($sql)==true) {
	$result = '<div class="alert alert-info">successfully Inserted</div>';
}else{ 

$result = '<div class="alert alert-danger">Failed, Please try again later</div>';
}

return $result;
	 

}

//update an existing allowance record method
// public function updateallowances($employeeid, $allowancename, $amount){
// $sql = "UPDATE allowances set amount='$amount' WHERE employee_id='$employeeid' and allowancename='$allowancename' ";
// 	if ($this->conn->query($sql)==true) {
// 		$result='<div class="alert alert-success">Employee allowance Updated successfully</div>';
// 	}else{
// 		$result='<div class="alert alert-danger">Failed, Please try again later</div>';
// 	}

// 	return $result;

// }

//check if a record is existing in allowances
public function selectallow($employeeid, $allowancename){

	$sql = "SELECT * from allowances where allowancename='$allowancename' and employee_id='$employeeid'";
	$result = $this->conn->query($sql);
	return $result->num_rows;
}

//payslip allowance display method
public function payslipallowance($nameid){
	$sql = "SELECT * from allowances where employee_id='$nameid'";
	$result = $this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;
}

//mypayslip deduction display method
public function mypayslipdeduction($nameid,$date){
	$sql = "SELECT  * from deductions where employee_id='$nameid' and  (DATE_FORMAT(createdate, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m') or status='fixed')";
	$result = $this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;
}
//monthly payment button method
public function paynow($yes,$datepay){
$sql = " INSERT INTO paid set paid='$yes', datepay='$datepay'";

if ($this->conn->query($sql)==true) {
	$result = "You have successfully paid Your staff's For ";
}

else{
	$result = "Failed";
}

return $result;

}

//check if there is payment for the selected period method

public function selectpaynow($date){
	$sql = "SELECT * from paid where  DATE_FORMAT(datepay, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m')";

	$result= $this->conn->query($sql);

	return $result->num_rows;

}


//mypayslip allowance display method
public function mypayslipallowance($nameid,$date){
	$sql = "SELECT  * from allowances where employee_id='$nameid' AND (statusfixed='Yes' or  DATE_FORMAT(createdate, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m')) and (status='fixed' or  DATE_FORMAT(createdate, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m'))";
	$result = $this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;
}

//check for record exitence before execution 


// public function checkrecordallowance($nameid){
// 	$sql = "SELECT * from allowances where employee_id='$nameid' and statusfixed='Yes' "
// }

//mailreceiver name generator
public function mailreceiver(){
	$sql= "SELECT * from employee_details ORDER by employee_name";
	$result = $this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;
}





//        function sendmail($receiverid,$mailsubject,$mailcompose,$mailattach){

// 				if($_FILES['mailattach']['error'] == 0){

// 				// specify the destination folder to upload files to
// 				$folder = "uploads/";
// 				$filesize = $_FILES['mailattach']['size'];
// 				$filename = $_FILES['mailattach']['name'];
// 				$filetype = $_FILES['mailattach']['type'];
// 				$tempfolder = $_FILES['mailattach']['tmp_name'];

// 				// get the file extension
// 				$file_ext = explode('.',$filename);
// 				$file_ext = end($file_ext);
// 				$file_ext = strtolower($file_ext);

// 				// specify extensions allowed
// 				$extensions = array('png', 'jpg', 'jpeg', 'gif','pdf','doc');

// 				// check for valid extension
// 				if(in_array($file_ext, $extensions)===false){
// 					$error[] = "extension not allowed!";
// 				}

// 				// check the file size
// 				if($filesize > 2097152){
// 					$error[] = "File size must be exactly or less than 2 mb!";
// 				}

// 				$filename = time();
// 				$destination = $folder.$filename.".$file_ext";

// 				if(empty($error)==true){
// 					move_uploaded_file($tempfolder, $destination);


// 		$sql="INSERT INTO mail SET receiver_id='$receiverid', subject='$mailsubject',email_content='$mailcompose', mailattach='$destination'" ;

// 		if ($this->conn->query($sql)==true) {
// 			$result = "mail sent successfully";
// 		}else{
// 			$result = "mail failed";
// 		}

// 	}
// 	}

// 	return $result;
		
		
// }




function sendmail($receiverid,$mailsubject,$mailcompose){

if($_FILES['mailattach']['error'] == 0){

				// specify the destination folder to upload files to
				$folder = "uploads/";
				$filesize = $_FILES['mailattach']['size'];
				$filename = $_FILES['mailattach']['name'];
				$filetype = $_FILES['mailattach']['type'];
				$tempfolder = $_FILES['mailattach']['tmp_name'];

				// get the file extension
				$file_ext = explode('.',$filename);
				$file_ext = end($file_ext);
				$file_ext = strtolower($file_ext);

				// specify extensions allowed
				$extensions = array('png', 'jpg', 'jpeg', 'gif', 'pdf');

				// check for valid extension
				if(in_array($file_ext, $extensions)===false){
					$error[] = "extension not allowed!";
				}

				// check the file size
				if($filesize > 2097152){
					$error[] = "File size must be exactly or less than 2 mb!";
				}

				$filename = time();
				$destination = $folder.$filename.".$file_ext";

				if(empty($error)==true){
					move_uploaded_file($tempfolder, $destination);







$sql="INSERT INTO mail SET receiveremail='$receiverid', subject='$mailsubject',email_content='$mailcompose', mailattach='$destination'" ;         if($this->conn->query($sql)==true){
						$result = "mail was successful";
					}else{
						$result = "Error ".$this->conn->error;
					}

				}else{
					//var_dump($error);
				}



			}else{
				$result = "failed";
			}


			return $result;



		
		}


public function selectmail($useremail){
	$sql = "SELECT * from mail where receiveremail='$useremail'";
	$result = $this->conn->query($sql);
	while ($row[] = $result->fetch_assoc()) {
		
	}
	return $row;

}


}

?>