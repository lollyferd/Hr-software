<?php

include ("User.php");
?>


<?php
$obj = new User;

$finaloutput = $obj->insertdeductions($_POST['employeeid'],$_POST['deductionname'],$_POST['amount']);

echo $finaloutput;


?>
