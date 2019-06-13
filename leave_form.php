
<?php
include('dash_top.php');

?>
<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {
$leave= new User;
date_default_timezone_set('Africa/Lagos');
$diff=strtotime($_POST['enddate']) - strtotime($_POST['startdate']);
 
 $days = floor($diff / (60*60*24));


$output = $leave->leaveapply($_SESSION['userid'],$_POST['leavetype'],$_POST['comment'],$_POST['startdate'],$_POST['enddate'],$days);

// echo '<pre>';
// print_r($output);
// echo '</pre>';

         } 




 ?>

<div class="col-md-6">
<?php if (!empty($output)) {
  echo $output; 
} ?>
	<div class="card">
		<div class="card-body">
	<h4 class="text-center" style="color: #0A043E;"><b>Leave Application Form</b></h4><br>
<form action="leave_form.php" method="POST">
	
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <span class="form-control" style="background-color: grey; color: white"><b> <?php echo $_SESSION['user'];  ?></b></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputStaffId">Staff ID</label>
      <span class="form-control" style="background-color: grey; color: white"> <b><?php echo'AMFB/0'. $_SESSION['userid'];  ?></b></span>
    </div>
</div>
<div class="form-group">
  <label for="selectleavetype">Select Leave Type</label>
  <select id="leavetype" name="leavetype" class="form-control">
    <option selected="selected">Choose leave</option>
    <option value="annual">Annual Leave</option>
    <option value="sick">Sick Leave</option>
    <option value="maternity">Maternity Leave</option>
    <option value="casual">Casual Leave</option>
    <option value="earned">Earned Leave</option>
    <option value="paternity">Paternity Leave</option>
  </select>
  
</div>	

<div class="form-group">
    <label for="Textarea1">Comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
  </div>

<div class="form-row">
  
  <div class="form-group col-md-6">
    <label>Start date</label>
    <input type="date" name="startdate" placeholder="Enter start date" class="form-control">
  </div>
  <div class="form-group col-md-6">
    <label>End date</label>
    <input type="date" name="enddate" placeholder="Enter end date" class="form-control">
  </div>
 
  </div>

  <div>
  	<button class="btn btn-primary btn-block" id="leave" name="leave">Submit Form</button>
  </div>
</form>
</div></div><br>
<a href="dash_main.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
</div>

<?php
include('dash_bottom.php');

?>
