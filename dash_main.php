
<?php

include('dash_top.php');

?>


<div class="col-md-6">


<?php


//leave approval notification
if (isset($_GET['myresult'])) {
  echo"<div class='alert alert-warning'>". $_GET['myresult']."</div>"; 
} 

//session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
$pr= new User;


  $email=$_SESSION['user'];
  $cpass=md5(strrev($_POST['cpass']));
  $npass=md5(strrev($_POST['npass']));
  $output = $pr->pReset($email, $cpass, $npass);

  if (!empty($output)) {
  echo $output;
}
}

 
  

?>





  <?php 

   
  // if ($_GET['myoutput']==='Incorrect current password') {
  //   echo "<div class='alert alert-danger'>" .$_GET['myoutput']. "</div>";
  // }
  //       else{
  //         echo "<div class='alert alert-success'>" .$_GET['myoutput']. "</div>";
  //       }
        

      ?>
	<div class="card">
	<div class="card-body">

	<div class="row">
		<div class="col-md-4 menuicon"><a href="dash_main.php"><i class="fas fa-home" title="Home"></i>Home</a></div>
		<div class="col-md-4 menuicon"><a href="check_leave_status.php"><i class="fas fa-mail-bulk " title="Broadcast message"></i>Leave Status</a></div><br>
		<div class="col-md-4 menuicon"><a href="staff_Loan.php"><i class="fas fa-money-bill-alt" title="Staff Loan"></i><br>Staff Loan</a></div>
		
	</div>
	<hr class="my-4">
	<div class="row">
		
		<div class="col-md-4 menuicon"><a href="mypayslip.php"><i class="fas fa-archive" title="Payslip"></i>Payslip</a></div>
		<div class="col-md-4 menuicon"><a href="leave_form.php"><i class="fab fa-wpforms" title="leave Application form"></i> <br>Leave Application</a></div>
		<div class="col-md-4 menuicon"><a href="email.php"><i class="far fa-envelope" title="Send Mail"></i>Mail</a></div>
	</div>

<hr class="my-4 bg-success">
<div style="background-color:#0A043E">
<h5 class="text-center" style="color: white">General performance</h5><br><br>
<p class="myperform"><b>Attendance</b></p>
<div class="progress">
  <div  class="progress-bar pro" role="progressbar" style="width:<?php echo $holdpf['Attendance'].'%'; ?>;" aria-valuenow="<?php echo $holdpf['Attendance'].'%' ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $holdpf['Attendance'].'%' ?></div>
</div><br>
<p  class="myperform"><b>Budget Performance</b></p>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width:<?php echo $holdpf['Budget'].'%' ?>" aria-valuenow="<?php echo $holdpf['Budget'].'%' ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $holdpf['Budget'] .'%' ?></div>
</div><br>
<p class="myperform"><b>Ethics</b></p>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width:<?php echo $holdpf['Ethics'] .'%' ?>" aria-valuenow="<?php echo $holdpf['Ethics'] .'%' ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $holdpf['Ethics'] .'%'?></div>
</div><br>

	</div>

<div>
	
</div><br><br>
<!-- table -->
<!-- leave approval -->
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Staff ID</th>
      
      <th scope="col">Pending Approvals</th>
    </tr>
  </thead>
  <tbody>
<?php
$view= new User;
$_SESSION['accesslevel'] = $holdall['access_level'];
if ($holdall['access_level']=='Admin') {

$myresult=$view->viewleave();
}

if ($holdall['access_level']=='Super Admin') {
 $myresult=$view->viewleavesuper();
}
// echo '<pre>';
// print_r($myresult);
// echo '</pre>';
foreach ($myresult as $item) {
  if (!empty($item)) {
    
 ?>



    
   <tr>
      <th scope="row"><?php $id='AMFB/0'.$item['lstaff_id']; echo $id;  ?></th>
      <td colspan="2"><?php $com=$item['employee_name'].' '.'Applied for'.' '.$item['leaveduration'].' '.$item['leavetype']; echo $com   ?></td>
      <td>
        <form action="approval.php" method="POST">
          <input type="hidden" name="leaveid" value="<?php echo $item['leave_id'];  ?>">
          <input type="hidden" name="dept" value="<?php echo $item['department'];  ?>">
        <input type="hidden" name="name" value="<?php echo $item['employee_name'];  ?>">
        <input type="hidden" name="email" value="<?php echo $item['employee_email'];  ?>">
        <input type="hidden" name="id" value="<?php echo $item['lstaff_id'];  ?>">
        <input type="hidden" name="leavetype" value="<?php echo $item['leavetype'];  ?>">
        <input type="hidden" name="comment" value="<?php echo $item['comment'];  ?>">
        <input type="hidden" name="startdate" value="<?php echo $item['startdate'];  ?>">
        <input type="hidden" name="enddate" value="<?php echo $item['enddate'];  ?>">
        <input type="hidden" name="duration" value="<?php echo $item['leaveduration'];  ?>">
        <input type="hidden" name="admin" value="<?php echo $item['adminapproved'];  ?>">
        <input type="submit" name="submit" value="Details" class="btn btn-info btn-block">
      </form>
      </td>
    </tr>
    <?php } } ?>
  </tbody>
</table>






<?php

 
//if ($holdall['access_level']=='Admin') {
  //if ($_SESSION['depart']==$holdall['employee_department']) {
  //include('leaveapproval.php');
  //}
  
?>
</div></div>
</div>
<!-- bottom include -->
<?php
include('dash_bottom.php');

?>