<?php

include ("User.php");


$cont= new User;

$cont->contact($_POST['fullname'],$_POST['email'],$_POST['phone'],$_POST['message']);

		header('location:index.php');

?>
