
<?php

include('dash_top.php');


?>

<div class="col-md-6">
	<div class="card">
	<div class="card-body">


<?php
$rec = $obj->getpro($_GET['id']);
$_SESSION['employid']=$_GET['id'];

//echo $_SESSION['employid'];
//echo "<prev>";
//echo print_r($rec);
 //echo "</prev>";

?>



<div class="text-center btn-info">
	<h3 style=" color: white">STAFF PROFILE</h3>
</div>
<form action="update.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputName"><b>Name</b></label>
    <input type="text" class="form-control editprofile btn-secondary" id="fullname" placeholder="John Tunde Babs" name="fullname" value="<?php echo $rec['employee_name']?>">
  </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4"><b>Email</b></label>
      <p class="form-control btn-secondary" style="color: white"><b><i><?php echo $rec['employee_email']?></i></b></p>
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputPhoneNumber"><b>Phone Number</b></label>
    <input type="text" class="form-control editprofile btn-secondary" id="phone" placeholder="08000000000" name="phone" value="<?php echo $rec['employee_phone']?>">
  </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4"><b>Employment Date</b></label>
      <input type="date" class="form-control editprofile btn-secondary" id="date" name="date" value="<?php echo $rec['employment_date']?>">
    </div>
    
  </div>
  <div class="form-group">
    <label for="inputAddress"><b>Address</b></label>
    <input type="text" class="form-control editprofile btn-secondary" id="address" placeholder="1234 Main St" name="address" value="<?php echo $rec['employee_address']?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputDepartment"><b>Department</b></label>
    <select class="form-control editprofile btn-secondary" id="department" name="department">
     <option value="<?php echo $rec['employee_department']?>"><?php echo $rec['employee_department']?></option>
      <option value="Operation">Operation</option>
      <option value="ICT">ICT</option>
      <option value="Sales">Sales</option>
      <option value="Admin">Admin</option>
    </select>
   
  </div>
    <div class="form-group col-md-6">
      <label for="inputPosition"><b>Position</b></label>
      <input type="text" class="form-control editprofile btn-secondary" id="position" name="position" value="<?php echo $rec['employee_position']?>">
    </div> 
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="DOB"><b>DOB</b></label>
    <input type="date" class="form-control editprofile btn-secondary" id="dob" name="dob" value="<?php echo $rec['dob']?>">
  </div>
    <div class="form-group col-md-4">
      <label for="Stateoforigin"><b>State Of Origin</b></label>
      <input type="text" class="form-control editprofile btn-secondary" id="stateoforigin" name="stateoforigin" value="<?php echo $rec['stateoforigin']?>">
    </div>
    <div class="form-group col-md-4">
      <label for="LG"><b>LG</b></label>
      <input type="text" class="form-control editprofile btn-secondary" id="lg" name="lg" value="<?php echo $rec['lg']?>">
    </div> 
  </div>
<div class="form-group">
    <label for="inputReferee1"><b>Referee1</b></label>
    <input type="text" class="form-control editprofile btn-secondary" id="referee1" placeholder="Referee1" name="referee1" value="<?php echo $rec['referee1']?>">
  </div>
  <div class="form-group">
    <label for="inputReferee2"><b>Referee2</b></label>
    <input type="text" class="form-control editprofile btn-secondary" id="referee2" placeholder="Referee2" name="referee2" value="<?php echo $rec['referee2']?>">
  </div>
  
  <div class="form-group">
      <label for="inputOrganizationId"><b>Acess Level</b></label>
     <p class="form-control btn-secondary" style="color: white"><?php echo $rec['access_level']?></p>
    </div> 
   <div class="form-row">
   	<div class="col-md-6">
    <label for="exampleFormControlFile1">Upload Employee Passport</label>
    <input type="file" class="form-control-file" id="userimage" name="userimage">
    
    <small id="passwordHelpInline" class="text-muted">
     Example file input: JPG, PNG, GIF.
    </small>
  </div>

<div class="col-md-6">
	<img src="<?php echo $rec['userimage']?>" class="card-img-top" alt="user image" style="width: 100px;height: 100px; border-radius: 50%; align-self: center;">
	</div>
</div><br><br>
  <input type="submit" name="update" id="update" value="UPDATE USER PROFILE" class="btn btn-primary btn-block">
  
</form>
</div></div><br>
<hr>

	<div class="card">
	<div class="card-body">
	<div class="text-center btn-warning">
	<h3 style=" color: #0A043E"><b><i>STAFF PERFORMANCE UPDATE</i></b></h3>
</div>		
			
<form action="performance_reg.php" method="POST">
		
<div class="row">
<div class="col-md-2">
	<input class="form-control" type="text" name="attendance" placeholder="Attendance">
</div>

<div class="col-md-2">
	<input class="form-control" type="text" name="budget" placeholder="Budget">
</div>
<div class="col-md-2">
	
	<input class="form-control" type="text" name="ethics" placeholder="Ethics">

</div>
</div><br>

<button type="submit" class="btn btn-primary btn-block">Post</button>



</form>

</div>

</div></div>

<?php
include('dash_bottom.php');

?>