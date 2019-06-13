
<?php
include('dash_top.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {

$loan= new User;

$outputL=$loan->loanApply($_POST['loanA'],$_POST['duration'],$_POST['loanP']);

}


?>
<div class="col-md-6">
 <?php if (!empty($outputL)) {
      echo $outputL;
 }  
   ?>
      <small id="mywarning3"></small>
      	<div class="card">
      		<div class="card-body">
            <div class="btn-success text-center">

              <h4>Loan Application Form</h4>
            </div>

            <form action="" method="POST">
              
<div class="form-group">

<input type="text" name="loanA" placeholder="Enter Loan Amount" class="form-control" id="loanA" >  
</div>

<div class="form-group">
      <label>Loan Duration</label>
<select multiple name="duration"  class="form-control" id="duration">
      <option value="30">1 </option>
      <option value="60">2</option>
      <option value="90">3</option>
      <option value="120">4</option>
      <option value="150">5</option>
      <option value="180">6</option>
      <option value="210">7</option>
      <option value="240">8</option>
      <option value="270">9</option>
      <option value="300">10</option>
      <option value="330">11</option>
      <option value="360">12</option>
</select>
</div>

<div class="form-group">

<textarea class="form-control" placeholder="Loan Purpose" name="loanP" id="loanP"></textarea>  
</div>
<button class="btn btn-info btn-block" name="loan" type="submit" id="loan" >Apply</button>
            </form>
      	
      </div>
      </div><br>
      <a href="dash_main.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
</div>

<?php
include('dash_bottom.php');

?>
