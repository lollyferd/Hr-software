<?php

include ("User.php");
?>


<?php  
$qd= new User;
if ($_SESSION['accesslevel']=='Admin') {
	if (isset($_POST['yes'])) {
	$output=$qd->adminapproved($_POST['yes'],$_SESSION['lid']);
	$myoutput= $output.' Approved';
}else{
	$output=$qd->adminapproved($_POST['no'],$_SESSION['lid']);
	$myoutput= $output.' Rejected';
}}
if ($_SESSION['accesslevel']=='Super Admin') {
	if (isset($_POST['yes'])) {
	$output=$qd->hrapproved($_POST['yes'],$_SESSION['lid']);
	$myoutput= $output.' Approved';
}else{
	$output=$qd->hrapproved($_POST['no'],$_SESSION['lid']);
	$myoutput= $output.' Rejected';
}
}


header("location:http://localhost/my_final_project/dash_main.php?myresult=".$myoutput);







// if (isset($_POST['approved'])) {
// echo $_POST['yes'];
// 	$output=$obj->adminapproved($_POST['yes'],$_POST['id']);
//  }else{
// 	$output=$Lobj->adminapproved($_POST['reject'],$_POST['id']);
//  }



 ?>



