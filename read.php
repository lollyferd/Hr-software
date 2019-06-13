<?php

include ("User.php");

$obj= new User;

$obj->leaveread($_POST['id'],$_POST['status']);
$_SESSION['leaveupdateid']=$_POST['id'];
?>

