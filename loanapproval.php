<?php
include('dash_top.php');

?>


<div class="col-md-9">


<?php 

if (isset($_GET['myresult'])) {
	echo"<div class='alert alert-warning'>". $_GET['myresult']."</div>"; 
} ?>
	<div class="card">
      		<div class="card-body">
            <div class="btn-success text-center">

              <h4>Loan Approval</h4>
            </div>


<table class="table table-bordered table-striped table-hover">
  

<thead>
  <th>Staff ID</th>
  <th>Name</th>
   <th>Loan Amount</th>
   <th>Duration</th>
    <th>Purpose</th>
     <th colspan="2">Approval</th>
   
  
</thead>
<tbody>
 <?php 
//create object of mart class
$loanv= new User ();


foreach ($loanv->viewloan() as $item) {
  
  	$_SESSION['loanid']=$item['loan_application_id'];

 date_default_timezone_set('Africa/Lagos');
 if (!empty($item) ) {

 

?>
<tr>
  <td><?php echo $item ['loanstaff_id']; ?></td>
  <td><?php echo $item['employee_name'] ?></td>
<td><?php echo '#'.$item['loan_amount'] ?></td>
<td><?php echo $item['duration'].'days'; ?></td>
<td><?php echo $item['loan_purpose'] ?></td>
<td><form method="POST" action="loanap.php">
 <input type="hidden" name="yes" value="Approved">
 <input type="hidden" name="id" value="<?php echo $item['loan_application_id']  ?>">
<button type="submit" id="approve" name="approve" class="btn btn-info">YES</button>
</form></td>
  <td><form method="POST" action="loanap.php">
 <input type="hidden" name="no" value="Rejected">
 <input type="hidden" name="id" value="<?php echo $item['loan_application_id']  ?>">
<button type="submit" id="reject" name="reject" class=" btn btn-info">NO</button>
</form></td>

</tr>
<?php
} }

?>

</tbody>
</table>
</div>
</div><br>
<a href="dash_main.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
</div>





 <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
     $("div").mouseover(function(){
      
$('.alert').hide('slow');
 })

     })
    </script>

</body>
</html>


<!-- <?php
//include('dash_bottom.php');

?> -->