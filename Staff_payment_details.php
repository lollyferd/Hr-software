
<?php
include('dash_top.php');

?>
<div class="col-md-6">
      	<div class="card">
      		<div class="card-body">
          
         <div id="noted" >

         </div>
       
            <div class="btn-success text-center">
              <h4>Staff Payment Details</h4>
            </div>

            <form method="POST" id="payform" >
              
                
<div class="form-group">

<select class="form-control"  name="employeename" id="employeename">
   <option selected="selected">Employee Name</option>
<?php $employeenameobj=new User; 
$output=$employeenameobj->details();
// echo '<pre>';
// print_r($output);
// echo '</pre>';
foreach ($output as $item) {
 ?>
  <option value="<?php echo $item['employee_name']; ?>"><?php echo $item['employee_name'] ?></option>

<?php
}
?>
</select>


<!---<input type="text" name="staffname" placeholder="Employee Name" class="form-control" >--->  
</div>
<hr><br>
<div class="form-group">
<select class="form-control"  name="bank" id="bank">
  
<?php $bankobj=new User; 
$output=$bankobj->banks();
// echo '<pre>';
// print_r($output);
// echo '</pre>';
foreach ($output as $item) {
 ?>
  <option value=" <?php echo $item['name']  ?>"><?php echo $item['name'] ?></option>
<?php
}
?>
</select>
</div>

<div class="form-row">
                
<div class="form-group col-md-6">

<input type="text" name="accountnumber" id="accountno" placeholder="Account Number" class="form-control" >  
</div>

<div class="form-group col-md-6">

<input type="text" name="accountname" placeholder="Account Name" class="form-control" id="accountname" >  
</div>
</div>
<div class="form-group">
  <select name="accounttype" class="form-control">
    <option value="Savings">Savings</option>
    <option value="Current">Current</option>
  </select>
  
</div>

<button type="submit" class="btn btn-info mr-auto" id="payclick">Save</button>


            </form>
      	
      </div>
      </div>
</div>

<?php
include('dash_bottom.php');

?>
