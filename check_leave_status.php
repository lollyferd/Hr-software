<?php
include('dash_top.php');

?>

<?php 
$obj= new User;

 $Lstatus=$obj->leaveStatus($_SESSION['userid']);

 ?>


<div class="col-md-6">
<div class="card">
	<div class="card-body">

<?php
if (!empty($Lstatus)) {
	 ?>
	 <img src="images/pending.png" style="height: 200px; width: 200px; margin-left: 150px">
<div style="color: blue" class="jumbotron">
<div class="text-center leaveedit lead">Your <?php echo $Lstatus['leaveduration'].'days ' .$Lstatus['leavetype'].' Leave Application Status:' ;  ?></div>
<div class="row">
	<div class="col-md-6 leaveedit"><span>Leave Start Date: </span> <span><?php echo $Lstatus['startdate'];   ?></span></div>
	<div class="col-md-6 leaveedit"><span>Leave End Date: </span><span> <?php echo $Lstatus['enddate'];   ?></span></div>
</div>
<hr class="my-4">
<div class="row leaveedit">
	<div class="col-md-7"><span>HOD Approval Status: </span> <span style="border-bottom: 1px solid black"><?php if (isset($Lstatus['adminapproved'])) {
		echo $Lstatus['adminapproved'];
	} else{echo "Pending";}   ?></span></div>
	<div class="col-md-5"> <span>Date: </span><span style="border-bottom: 1px solid black"><?php echo $Lstatus['dateapproved'];   ?></span></div>
</div>


<?php 
if (isset($Lstatus['adminapproved'])) {

 ?>
 <hr class="my-4">
<div class="row leaveedit">
	<div class="col-md-7"><span>HR Approval Status: </span> <span style="border-bottom: 1px solid black"><?php if (isset($Lstatus['hrapproved'])) {
		echo $Lstatus['hrapproved'];
	} else{echo "Pending";}   ?></span></div>
	<div class="col-md-5"> <span>Date: </span><span style="border-bottom: 1px solid black"><?php echo $Lstatus['dateapprovedhr'];   ?></span></div>
</div>


<?php } ?></div>

<?php } else{?> <div>
	<img  src="images/sorry.png" style="height: 200px; width: 200px; margin-left: 100px">
	<div class=" jumbotron alert-info text-center lead" style="color: #0A043E"><b>You don't have any pending Leave for Approval</b></div>


	</div><?php } ?>




 
<a href="dash_main.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
 

		

<?php 
 // echo "<prev>";
 // print_r($Lstatus);
 // echo "</prev>";


 ?>	

	</div>

</div>

	
</div>



<?php
include('dash_bottom.php');

?>