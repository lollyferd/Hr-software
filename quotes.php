<?php
include('dash_top.php');

?>
<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {

$qd = new User;
$outputquotes = $qd->quotes($_POST['type'],$_POST['comment']);




}




?>



<div class="col-md-6">
 <?php if (!empty($outputquotes)) {
 	echo $outputquotes;
 }  
 ?>
		<div class="card">
		<div class="card-body">
			<div id="note"></div>

			<div class="btn-primary text-center">
              <h4>Post Quotes</h4>
            </div>
<form  method="POST" action="" >
	<div class="form-group">
		<select class="form-control" id="type" name="type">
			<option value="weekly">Weekly</option>
			<option value="monthly">Monthly</option>
			
		</select>
		
	</div>
<div class="form-group">
	<textarea class="form-control" cols="5" rows="10" id="comment" name="comment"></textarea>
</div>
	<button type="submit" class="btn btn-info btn-block" id="btn">Post Quotes</button>

</form>

</div>

</div><br>
	
<a href="dash_main.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
</div>



<?php
include('dash_bottom.php');

?>