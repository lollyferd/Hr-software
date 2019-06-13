<?php
include('dash_top.php');

?>


<div class="col-md-6">
<div class="card">
	<div class="card-body">

<?php



$obj2= new User;

$x=$obj2->leavereadstatusupdate($_SESSION['leaveupdateid']);

//echo $_SESSION['leaveupdateid'];

// echo "<pre>";
// print_r($x);
// echo "</pre>";




?>


<p>Hello <?php echo $holdall['employee_name'] ?></p>

<p>Your <?php echo $x['leaveduration'] .'days '. $x['leavetype'] .' Leave was '. $x['adminapproved'] .' By Your Head of Department on '. $x['dateapproved'].' and '. $x['hrapproved'].' by Your HR on '.$x['dateapprovedhr'].'.'; ?></p>

<p>Cheers</p>


		



</div></div></div>





<?php
include('dash_bottom.php');

?>