<?php
include ('User.php');

$mysearch = $_REQUEST['mysearch'];

?>
<?php 
//create object of mart class
$nob = new User();


//loop through products records

  

 //date_default_timezone_set('Africa/Lagos');
?>

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

$records = $nob->searchUser($mysearch);

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