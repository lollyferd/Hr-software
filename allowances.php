<?php
include('dash_top.php');

$allowanceobj = new User;
if (!empty($_POST['allowancetype'])) {
	$outputallowance = $allowanceobj->insertallowancetype($_POST['allowancetype']);
}

 


?>


<div class="col-md-6">
      	<div class="card">
      		<div class="card-body">
      			<?php if (!empty($outputallowance)) {
      				echo $outputallowance;
      			} ?>

      			<div class=" btn-info text-center">
      				<h3>Basic Salary and Allowance Model</h3>
      			</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createallowance">
    <i class="fas fa-plus"></i> Create New Allowance Type
</button>

<!-- Modal -->
<div class="modal fade" id="createallowance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action=" ">
        	<div class="form-group">
        	<input type="text" name="allowancetype" id="allowancetype" placeholder=" Enter New Allowance" class="form-control">
      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div><br><br>


<!-- add allowance for employee -->
<?php
if (!empty($_POST['amount'])) {

//$result = $allowanceobj->selectallow($_POST['employeeid'], $_POST['allowancename']);

 // if ($result >= 1) {
    //$myoutput = $allowanceobj->updateallowances($_POST['employeeid'], $_POST['allowancename'], $_POST['amount']);
  //}else{
        $myoutput = $allowanceobj->insertallowance($_POST['employeeid'], $_POST['allowancename'], $_POST['amount'],$_POST['status']);
 // }
  


    

    

  
}

?>
<form action=" " method="POST">
	
<div class="form-row">
	<div class="form-group col-md-6">
    <?php 
    $outputname = $allowanceobj->details();
                       //    echo '<pre>';
                       // print_r($outputname);
                       // echo '</pre>';

     ?>
<select class="form-control" name="employeeid" >
	 <?php 

 foreach ($outputname as $item) {
      ?>

<option value="<?php echo $item['staff_id']; ?>"><?php echo $item['employee_name']; ?></option>

  <?php  } ?>


</select>
		
	</div>



  <div class="form-group col-md-6">
    <?php $outputtype = $allowanceobj->selecttype();
                       // echo '<pre>';
                       // print_r($outputtype);
                       // echo '</pre>';

      ?>
<select class="form-control" name="allowancename" >
  <?php 

 foreach ($outputtype as $item) {
      ?>

<option value="<?php echo $item['allowance_name']; ?>"><?php echo $item['allowance_name']; ?></option>

  <?php  } ?>
</select>
    
  </div>
	
</div>



<div class="form-group">
  <input type="text" name="amount" class="form-control">

</div>


<div class="form-row">

  <div class="form-check col-md-6" style="padding-left: 25px;">
  <input class="form-check-input" type="radio" name="status" id="recurrentCheckbox" value="recurrent" checked="">
  <label class="form-check-label" for="recurrentCheckbox">
    Recurrent Allowance
  </label>
</div>
  
 <div class="form-check col-md-6">
  <input class="form-check-input" type="radio" name="status" id="fixedCheckbox" value="fixed">
  <label class="form-check-label" for="fixedCheckbox">
    Fixed Allowance
  </label>
</div>

</div><br>




<button class="btn btn-primary" type="submit">Add</button>

</form><br>

<?php
if (!empty($myoutput)) {
echo $myoutput;
}
 ?>




</div></div><br>
<a href="dash_main.php"><button type="button" class="text-center  btn btn-secondary">Go Back</button></a>
</div>























<?php
include('dash_bottom.php');

?>