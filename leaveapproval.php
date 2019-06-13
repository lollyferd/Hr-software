
<?php
//session_start();
 if (!isset($_SESSION['user'])) {
   header("location:index.php");
}

?>



<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Staff ID</th>
      
      <th scope="col">Pending Approvals</th>
    </tr>
  </thead>
  <tbody>
<?php
$view= new User;

if ($holdall['access_level']=='Admin') {

$myresult=$view->viewleave();
}

if ($holdall['access_level']=='Super Admin') {
 $myresult=$view->viewleavesuper();
}
// echo '<pre>';
// print_r($myresult);
// echo '</pre>';
foreach ($myresult as $item) {
  if (!empty($item)) {
    
 ?>



    
   <tr>
      <th scope="row"><?php $id='AMFB/0'.$item['lstaff_id']; echo $id;  ?></th>
      <td colspan="2"><?php $com=$item['employee_name'].' '.'Applied for'.' '.$item['leaveduration'].' '.$item['leavetype']; echo $com   ?></td>
      <td>
        <form action="approval.php" method="POST">
          <input type="hidden" name="leaveid" value="<?php echo $item['leave_id'];  ?>">
          <input type="hidden" name="dept" value="<?php echo $item['department'];  ?>">
        <input type="hidden" name="name" value="<?php echo $item['employee_name'];  ?>">
        <input type="hidden" name="email" value="<?php echo $item['employee_email'];  ?>">
        <input type="hidden" name="id" value="<?php echo $item['lstaff_id'];  ?>">
        <input type="hidden" name="leavetype" value="<?php echo $item['leavetype'];  ?>">
        <input type="hidden" name="comment" value="<?php echo $item['comment'];  ?>">
        <input type="hidden" name="startdate" value="<?php echo $item['startdate'];  ?>">
        <input type="hidden" name="enddate" value="<?php echo $item['enddate'];  ?>">
        <input type="hidden" name="duration" value="<?php echo $item['leaveduration'];  ?>">
        <input type="submit" name="submit" value="Details" class="btn btn-info btn-block">
      </form>
      </td>
    </tr>
    <?php } } ?>
  </tbody>
</table>

