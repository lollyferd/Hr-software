<?php
include('dash_top.php');

?>


<div class="col-md-6">
		<!-- <div class="card">
		<div class="card-body"> -->

<?php

 $newsdisp=new User;
$output=$newsdisp->newsdisplay();


foreach ($output as $item) {
	//date_default_timezone_set('Africa/Lagos');
	$diff=strtotime(date('Y-m-d')) - strtotime($item['createdate']);
	$days = floor($diff / (60*60*24));
	//echo $days ;
if ($days <=5) {
	# code...

	?>
	<div class="card">
<div class="card-body">

<div class="text-center"><b><?php echo $item['news_title'] ?></b></div><hr>
<div><?php echo $item['news_content'] ?></div>
<div class="row card-footer">
	<div class="col-md-10"><?php echo 'Posted by: '. strtoupper($item['employee_name']).'<br>'. $item['employee_position']. ' '.$item['employee_department'] ?></div>
	<div class="col-md-2">
<small class="bg-info"><?php echo $item['createdate'] ?></small>
</div></div>
</div>
</div><br>
<!-- echo '<pre>';
print_r($output);
echo '</pre>'; -->
<?php

} }
 ?>


<!-- date_default_timezone_set('Africa/Lagos');
$diff=strtotime($_POST['enddate']) - strtotime($_POST['startdate']);
 
 $days = floor($diff / (60*60*24)); -->


</div>
<!-- </div>
</div> -->



<?php
include('dash_bottom.php');

?>