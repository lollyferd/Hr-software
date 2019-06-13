<?php 
include('dash_top.php');

$paynowobj = new User;
if (!empty($_POST['datepay'])) {
	$paynowobj->paynow($_POST['yes'],$_POST['datepay']);


date_default_timezone_set('Africa/Lagos');

}



?>




<div class="col-md-6">
	<div class="card">
	<div class="card-body">

<form method="POST" action=" ">
	

<input type="hidden" name="yes">

<div class="form-row">
<div class="form-group col-md-6">
<input type="date" name="datepay" class="form-control">
</div>
<div class="col-md-2"></div>
<div class="col-md-4 btn-secondary">

	<h5>Today's Date::</h5> <h6 class="text-center"><?php echo date('Y-m-d');  ?></h6>
</div>


</div>




<button type="submit" class="btn btn-primary"> Pay Now</button>


</form>





</div></div>







</div>






















 <?php 
include('dash_bottom.php');

  ?>