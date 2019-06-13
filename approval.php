<?php

include('dash_top.php');
date_default_timezone_set('Africa/Lagos');

$_SESSION['lid']=$_POST['leaveid'];
$_SESSION['depart']=$_POST['dept'];
?>


<div class="col-md-6">
	<?php if (!empty($_POST['admin'])) {?>
		<div class="btn btn-warning btn-block animated heartBeat"><?php echo 'Head Of Department ' .'<b>'.$_POST['admin']. '</b>'.' Employee Leave Application.';?> </div> <?php }  ?>
	
	<div class="card">

				<div class="card-body" style="background-color: powderblue">

<div class="row form-group">
	<div class="col-md-4 form-control" style="color: green"><b><?php echo strtoupper($_POST['name']);?></b></div>
	<div class="col-md-5 form-control" style="color: green"><b><?php echo $_POST['email'];?></b></div>
	<div class="col-md-3 form-control" style="color: green"><b><?php $id='AMFB/0'.$_POST['id']; echo $id ;?></b></div>
	
</div>
<div class="form-group">			
<div class=" form-control" style="color: green"><b><?php $ltype='Leave Type:: '.'  '.strtoupper($_POST['leavetype']); echo $ltype;?></b></div>
</div>
<div class="form-group">
	<label style="color: green"><b>Comment</b></label>
	<div rows="3" class="form-control"><?php echo $_POST['comment'];?></div>
</div>

<div class=" form-row">
	<div class="col-md-4">
	<label style="color: green"><b>Start date</b></label>
	<div rows="3" class="form-control"><i><?php echo date("d, F Y",strtotime($_POST['startdate']));?></i></div>
</div>
<div class="col-md-4">
	<label style="color: green"><b>End date</b></label>
	<div rows="3" class="form-control"><i><?php echo date("d, F Y",strtotime($_POST['enddate']));?></i></div>
</div>
<div class="col-md-4">
	<label style="color: green"><b>Duration</b></label>
	<div rows="3" class="form-control"><i><?php $duration=$_POST['duration'].'Days'; echo $duration ;?></i></div>
</div>
</div><br>
<div class="row">
	<div class="col-md-3">
<form method="POST" action="ap.php">
<input type="hidden" name="yes" value="approved">
<input type="submit" name="submit1" id="approved" value="Approved" class="btn btn-secondary">&nbsp;

</form>
</div>
 <div class="col-md-3">
<form method="POST" action="ap.php">
<input type="hidden" name="no" value="rejected">
<input type="submit" name="submit2" id="submit2" value="Reject" class="btn btn-warning">

</form>
</div>
<div class="col-md-6"></div>
</div>







</div>

		</div>
		
	</div>





















<?php
include('dash_bottom.php');

?>