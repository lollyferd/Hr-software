<?php

session_start();
require("User.php");


$obj= new User;

if (!empty($_POST)) {
	$email=$_POST['email'];
	$pass=md5(strrev($_POST['pass']));
	
	$n = $obj ->login($email, $pass);

	

	if ($n > 0) {
		$_SESSION['user']= $email;
		header('location:dash_main.php');
	
	}

	else{
		header('location:index.php');
		
	}
}






?>