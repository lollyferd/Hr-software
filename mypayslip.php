<?php 
include('dash_top.php');

$mypayslipobj = new User;


 ?>


<div class="col-md-6">
	<div class="card">
	<div class="card-body">

<?php 
if (!empty($_POST['date'])) {

	$day1 = strtotime($_POST['date']);
$day1sql = date('Y-m-d', $day1);

$affectedrow = $mypayslipobj->selectpaynow($day1sql);

if ($affectedrow >= 1) {
	$mypayslipoutput = $mypayslipobj->mypayslipdeduction($_SESSION['userid'], $day1sql);

	$mypayslipoutputA = $mypayslipobj->mypayslipallowance($_SESSION['userid'], $day1sql);
}

else{ echo 'Faild';
}
	
}

 ?>







<div class="btn-secondary text-center">
	<h4>Monthly Payslip</h4>
</div><br>



<form method="POST" action=" ">
	


<div class="form-row">
	<div class="form-group col-md-8">
		<input type="date" name="date" class="form-control">
	</div>
	
<div class="col-md-4">
	<input type="submit" name="mypayslip" value="Generate My-Payslip" class="btn btn-primary">
</div>
</div>
</form>








	</div></div><br>



<div class="card">
	<div class="card-body">

<div class="row">
	<div class="col-md-4"><h5>Organization name</h5></div>
	<div class="col-md-4"><p>Payslip Advice</p></div>
	<div class="col-md-4"><?php echo date('M-Y', strtotime($day1sql)); ?></div>

</div>
<hr style="border-top: 5px solid grey">

<div class="row">
	<div class="col-md-4">Number</div>
	<div class="col-md-4"></div>
	<div class="col-md-4"><?php echo'AMFB/0'. $_SESSION['userid']; ?></div>

</div>
<hr style="border-top: 2px dotted black">


<div class="row">
	<div class="col-md-5">Name/Position/Department</div>
	<div class="col-md-2"></div>
	<div class="col-md-5"><b><?php echo strtoupper($holdall['employee_name']); ?>/ <?php echo strtoupper($holdall['employee_position']).'/'.strtoupper($holdall['employee_department']) ;?></b></div>

</div>
<hr style="border-top: 2px dotted black">

<hr style="border-top: 2px dotted black">

<br>

 <?php

foreach ($mypayslipoutputA as $item) {
	if (!empty($item)) {
		
			$sum += $item['amount'];
		
		
	
	?>

<div class="row">
<div class="col-md-4" style="border-right: 1px solid black"><?php echo $item['allowancename'] ?></div>

<div class="col-md-2" > = </div>
<div class="col-md-4"><?php echo number_format($item['amount'], 2) ;?></div>
<div class="col-md-2"></div>
</div>
<hr>

	<?php	
} }
 
 ?>
<div class="row">
	
<div class="col-md-4"><i><h6><br>Basic salary/Total Allowance (A) </h6></i></div>
<div class="col-md-2" > </div>
<div class="col-md-4"> <hr style="border-top: 2px dotted grey"> <?php echo number_format($sum, 2); ?> <hr style="border-top: 2px dotted grey"></div>

<div class="col-md-2"></div>

</div>

<!-- <hr style="border-top: 2px solid black">
 -->
<?php

foreach ($mypayslipoutput as $item) {
	if (!empty($item)) {
	$sumd += $item['amount'];
	?>
	<div class="row">
<div class="col-md-4" style="border-right: 1px solid black"><?php echo $item['deduction_name'] ?></div>

<div class="col-md-2" > = </div>
<div class="col-md-4"><?php echo number_format($item['amount'], 2) ?></div>
<div class="col-md-2"></div>
</div>
<hr>

	<?php
} }


 ?>


<div class="row">
	
<div class="col-md-4"><i><h6><br>Total Deduction (B) </h6></i></div>
<div class="col-md-2" >  </div>
<div class="col-md-4"> <hr style="border-top: 2px dotted grey"><?php echo number_format($sumd, 2); ?><hr style="border-top: 2px dotted grey"></div>

<div class="col-md-2"></div>

</div>
<div class="row">
	<div class="col-md-4"><h5><br>NET PAY</h5></div>
<div class="col-md-8"><hr style="border-top: 2px dotted grey"><?php $sumt = $sum - $sumd; echo number_format($sumt, 2)  ?><hr style="border-top: 2px dotted grey"></div>
</div>


	</div></div>







</div>

































 <?php 
include('dash_bottom.php');

  ?>