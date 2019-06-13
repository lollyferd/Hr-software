<?php
session_start();
require("User.php");


$loan= new User;

$output=$loan->loanApply($_SESSION['userid'],$_POST['loanA'],$_POST['duration'],$_POST['loanP']);
header('Location: http://localhost/my_final_project/staff_loan.php?myoutput='.$output);

		//header('location:index.php');


?>