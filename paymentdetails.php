<?php

include ("User.php");

$pay  = new User;

if ($_POST['accountnumber']=='' || $_POST['employeename']=='Employee Name' || $_POST['accountname']=='' ) {
	
}
else{
$output=$pay->paymentdetails($_POST['employeename'],$_POST['bank'],$_POST['accountnumber'],$_POST['accountname'],$_POST['accounttype']);

echo $output;

}



?>