 
<?php
include('dash_top.php');

$dedobj = new User;
if (isset($_POST['deductiontype']) ) {
$output = $dedobj->insertdeductiontype($_POST['deductiontype']);

}
 

?>
<div class="col-md-6">
      	<div class="card">
      		<div class="card-body">
           <?php //$x = $dedobj->selectdeductions();


             //  echo '<pre>';
             // print_r($x);
             // echo '</pre>';
          
            //    foreach ($x as $item) {
            //     if (!empty($item)) {
            //       $sum += $item['amount'];
            //     }
              
            // }
            
            // if (!empty($sum)) {
            //   echo $sum;
            // } ?>
            
              
            
             


            <?php if (!empty($output)) {
               echo $output;}
                ?>

                
           
            <div class="btn-info text-center">
              <h4>Staff Deductions</h4>
            </div>
           <!--  <div style="margin-bottom: 10px" >
<button class="btn btn-danger btn-block" style="margin-right: 20px;" id="addDeduction" data-toggle="modal" data-target="#exampleModalCenter">Add More Deductions</button>
</div> -->

<div>
<!-- Button trigger modal Create new deduction type -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#creatededuction">
  <i class="fas fa-plus"></i> Create New Deduction Type
</button>

<!-- Modal -->
<div class="modal fade" id="creatededuction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Deduction type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action=" ">
        <div class="form-group">
<input type="text" name="deductiontype" placeholder="Enter New Deduction Type" id="deductiontype" class="form-control">
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add">Click to Add</button>
      </div>
      </form>
    </div>
  </div>
</div>


</div><br>

<!-- add deductions for employee -->

    <div>
         <?php 
         if (!empty($_POST['amount'])) {
                
          //$seleoutput = $dedobj->selectdeduct($_POST['deductionname'],$_POST['employeeid']);
//echo  $seleoutput;
//if ($seleoutput >= 1) {
 // $finaloutput = $dedobj->updatedeductions($_POST['amount'],$_POST['deductionname'],$_POST['employeeid']);
//}else{
  $finaloutput = $dedobj->insertdeductions($_POST['employeeid'],$_POST['deductionname'],$_POST['amount'],$_POST['status']);
//}

         
         }

          ?>
             <form method="POST" action=" ">
                  


              <div class="form-row">
                          
          <div class="form-group col-md-6">
             <?php  
            $records = $dedobj->details();
            // echo '<pre>';
            // print_r($records);
            //  echo '</pre>';
            ?>

          <select id="employeeid" class="form-control" name="employeeid">
            
              <?php 
             foreach ($records as $item) {
               ?>
                 <option value="<?php echo $item['staff_id'] ?>"><?php echo $item['employee_name'] ?></option>

              <?php }  ?>
                
              
          
          </select>
          </div>

          <div class="form-group col-md-6">
          <select id="deductionid" class="form-control" name="deductionname">
            <!-- <option selected="selected">Deduction Type</option> -->
              <?php $output=$dedobj->selectdeductiontype(); 
               
               
                foreach ($output as $item) {
                ?>
            
            <option value="<?php echo $item['deduction_name'] ?>"><?php echo $item['deduction_name'] ?></option>
          <?php } ?>
          </select>
          </div>
          </div>

<div class="form-group">
  <input type="text" name="amount" placeholder="Enter Deduction Amount" id="amount" class="form-control">
</div>

<div class="form-row">

  <div class="form-check col-md-6" style="padding-left: 25px;">
  <input class="form-check-input" type="radio" name="status" id="recurrentCheckbox" value="recurrent" checked="">
  <label class="form-check-label" for="recurrentCheckbox">
    Recurrent Deduction
  </label>
</div>
  
 <div class="form-check col-md-6">
  <input class="form-check-input" type="radio" name="status" id="fixedCheckbox" value="fixed">
  <label class="form-check-label" for="fixedCheckbox">
    Fixed Deduction
  </label>
</div>

</div><br>




          <button type="submit" class="btn btn-info" >Add</button>


            </form>

     </div><br>
      	<?php 
            if (!empty($finaloutput)) {
             echo  $finaloutput;
               }
         
                 ?>
      </div>
      </div><br>
      <a href="dash_main.php"><button type="button" class="text-center  btn btn-secondary">Go Back</button></a>
</div>


<?php
include('dash_bottom.php');

?>
