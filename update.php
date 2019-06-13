<?php

session_start();
require("User.php");


$upd= new User;

$update=$upd->updateprofile($_POST['fullname'],$_POST['phone'],$_POST['date'],$_POST['address'],$_POST['department'],$_POST['position'],$_POST['referee1'],$_POST['referee2'],$_POST['dob'],$_POST['stateoforigin'],$_POST['lg'],$_SESSION['employid']);

//echo "<prev>";
//echo print_r($_SESSION['employid']);
 //echo "</prev>";

header('Location: http://localhost/my_final_project/details.php?myupdate='.$update);

?>


