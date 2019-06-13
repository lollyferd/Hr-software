
<?php

include('dash_top.php');
//$mysearch = $_REQUEST['mysearch'];

?>

<div class="col-md-6">
	<div class="card">
	<div class="card-body">
		<?php 
      // if ($_GET['myupdate']=="User Update was successfully") {
      // 	echo "<div class='alert alert-success'>" .$_GET['myupdate']. "</div>";
      	
      // }else{
      // 	echo "<div class='alert alert-danger'>" .$_GET['myupdate']. "</div>";
      // }

 
      ?>

<input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Search User" aria-label="Search"><br>
<div id="searchcont">
<table class="table table-bordered table-striped table-hover">
  

<thead>
  <th>Employee ID</th>
  <th>Employee Name</th>
   <th>Employee Email</th>
   <th>More</th>
  
</thead>
<tbody>



 <?php

$records = $obj->details();

// echo "<prev>";
// echo print_r($records);
// echo "</prev>";


for($i = 0; $i< count($records); $i++){
	$employeename = $records[$i]['employee_name'] ;
	$employeeemail = $records[$i]['employee_email'] ;
	$employeeid = $records[$i]['staff_id'] ;

?>


	<tr>
		<td><?php echo $employeeid ?></td>
		<td><?php echo $employeename ?></td>
		<td><?php echo $employeeemail ?></td>
		<td><?php echo "<a href='profile.php?id=$employeeid'>Details</a>" ?> </td>
	</tr>
<?php
}
?>
</tbody>
</table>
</div>




























</div>
</div>
</div>



<?php
include('dash_bottom.php');

?>