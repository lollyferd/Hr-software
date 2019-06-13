<?php
include('dash_top.php');

?>
<?php
//session_start();

if ($_SERVER['REQUEST_METHOD']=='POST') {
$ad= new User;
 $encryptpass=md5(strrev (trim($_POST['pass'])));
 

$output = $ad->Add_employee($_POST['fullname'],$_POST['email'],$_POST['phone'],$_POST['date'],$_POST['address'],$_POST['department'],$_POST['position'],$_POST['referee1'],$_POST['referee2'],$encryptpass,$_POST['accesslevel'],$_POST['dob'],$_POST['stateoforigin'],$_POST['lg']);
         } 


?>
<div class="col-md-6">
  <?php 
  
if (!empty($output)) {
  echo $output;
}

   ?>
  <div class="card">
    <div class="card-body">
<div class="btn-success text-center">
              <h4>Employee Details</h4>
            </div>
<form action="employee_details.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" id="fullname" placeholder="John Tunde Babs" name="fullname">
  </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputPhoneNumber">Phone Number</label>
    <input type="text" class="form-control" id="phone" placeholder="08000000000" name="phone">
  </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Employment Date</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputDepartment">Department</label>
    <select class="form-control" id="department" name="department">
      <option selected="selected">Choose...</option>
      <option value="Operation">Operation</option>
      <option value="ICT">ICT</option>
      <option value="Sales">Sales</option>
      <option value="Admin">Admin</option>
    </select>
  </div>
    <div class="form-group col-md-6">
      <label for="inputPosition">Position</label>
      <input type="text" class="form-control" id="position" name="position">
    </div> 
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    <label for="DOB">DOB</label>
    <input type="date" class="form-control" id="dob" name="dob">
  </div>
    <div class="form-group col-md-4">
      <label for="Stateoforigin">State Of Origin</label>
      <input type="text" class="form-control" id="stateoforigin" name="stateoforigin">
    </div>
    <div class="form-group col-md-4">
      <label for="LG">LG</label>
      <input type="text" class="form-control" id="lg" name="lg">
    </div> 
  </div>
<div class="form-group">
    <label for="inputReferee1">Referee1</label>
    <input type="text" class="form-control" id="referee1" placeholder="Referee1" name="referee1">
  </div>
  <div class="form-group">
    <label for="inputReferee2">Referee2</label>
    <input type="text" class="form-control" id="referee2" placeholder="Referee2" name="referee2">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label >Password</label>
    <input type="password"  class="form-control mx-sm-3" id="pass" name="pass">
    <small  class="text-muted">
      Must be 8-20 characters long.
    </small>
  </div>
  <div class="col-md-2"></div>
  <div class="form-group col-md-4">
      <label for="accesslevel">Acess Level</label>
     <select class="custom-select mr-sm-2" id="accesslevel" name="accesslevel">
        <option selected>Choose...</option>
        <option value="Super Admin">Super Admin</option>
        <option value="Admin">Admin</option>
        <option value="Staff">Staff</option>
      </select>
    </div> 
</div>
   <div class="form-group">
    <label for="exampleFormControlFile1">Upload Employee Passport</label>
    <input type="file" class="form-control-file" id="userimage" name="userimage">
    
    <small id="passwordHelpInline" class="text-muted">
     Example file input: JPG, PNG, GIF.
    </small>
  </div>
  <input type="submit" name="register" id="register" value="Register" class="btn btn-primary">
  
</form>






    </div>
  </div>
</div>





<?php
include('dash_bottom.php');

?>