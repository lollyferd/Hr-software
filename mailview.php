<?php 
include('dash_top.php');

 ?>



<div class="col-md-6">
	<div class="card">
	<div class="card-body">
<div>
	
<?php 

$mailview = new User;

$y = $mailview->selectmail($_SESSION['user']);


foreach ($y as $item) {
	?>


<div><?php echo $item['receiveremail'] ?></div>

<?php } ?>

 








</div>














	</div></div>


</div>




















<?php
include('dash_bottom.php');

?>