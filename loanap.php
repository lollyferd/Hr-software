<?php

include ("User.php");

$app= New User();
if (isset($_POST['yes'])) {
	$output=$app->loanapprove($_POST['yes'],$_POST['id']);
	$myoutput= $output.'Approved';
}else{
$output=$app->loanapprove($_POST['no'],$_POST['id']);
$myoutput= $output.'Rejected';
}

header("location:http://localhost/my_final_project/loanapproval.php?myresult=".$myoutput);


?>