<?php
include('dash_top.php');
$pslip = new User;
?>


<div class="col-md-6">
      	<div class="card">
      		<div class="card-body">


  <?php 
   

            $records = $pslip->details();

          if (!empty($_POST['nameid'])) {
              $outputdeduction= $pslip->payslipdeduction($_POST['nameid']);

            //    echo '<pre>';
            // print_r($output);
            // echo '</pre>';

               $outputallowance= $pslip->payslipallowance($_POST['nameid']);

    
                  }
            ?>


            <form method="POST" action=" ">
              <div class="form-row">
<div class="form-group col-md-9">
          <select id="nameid" class="form-control" name="nameid">
            <option selected="selected">Choose Employee</option>
             <?php 
             foreach ($records as $item) {
               ?>
                 <option value="<?php echo $item['staff_id'] ?>"><?php echo $item['employee_name'] ?></option>
                  
              <?php }  ?> 
                
              
          
          </select>
</div>
<div class="col-md-3">
  <input type="submit" class="btn btn-secondary" value="Generate slip">
</div>
</div>
</form>








<?php
if (!empty($outputdeduction)) {
  # code...

foreach ($outputdeduction as $item) {
  $x=$pslip->insertdeductions($_POST[3],$_POST['nn'],$_POST['dd'],$_POST['fixed']);
  //echo $x;
?>

<form method="POST" action=" ">
  <input type="text" name="nn" value="<?php echo $item['deduction_name'] ?>">             
<input type="text" name="dd" value="<?php echo $item['amount']; ?>">
<button type="submit">send</button>
 </form>
<?php } }?>

<hr>
<br><br>


<?php
if (!empty($outputallowance)) {
  # code...

foreach ($outputallowance as $item) {
?>
<label><?php echo $item['allowancename'] ?></label>
<input type="text" name="" value="<?php echo $item['amount']; ?>">
 
 
<?php } }?>



    

      		</div>
      	</div>
      	</div>



































<?php
include('dash_bottom.php');
?>