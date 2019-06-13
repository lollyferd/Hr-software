<?php
session_start();
require("User.php");


$insertpfcon= new User;

 $m=$insertpfcon->selectpf($_SESSION['employid']);


 if ($m > 0) {
 	$insertpfcon->updatepf($_SESSION['employid'],$_POST['attendance'],$_POST['budget'],$_POST['ethics']);
 	header('location:details.php');
 }
else {
	$insertpfcon->insertpf($_SESSION['employid'],$_POST['attendance'],$_POST['budget'],$_POST['ethics']);
	header('location:details.php');
}
//  $insertpfcon->insertpf($_SESSION['employid'],$_POST['attendance'],$_POST['budget'],$_POST['ethics']);
// // header('location:performance_reg.php');

 

 //$insertpfcon->updatepf($_SESSION['employid'],$_POST['attendance'],$_POST['budget'],$_POST['ethics']);



//  echo "<prev>";
// echo print_r($m);
// echo "</prev>";

?>
