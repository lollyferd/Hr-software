<?php
include('dash_top.php');
$mail = new User;

  $records = $mail->mailreceiver();

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $ma = new User;
  $x= $ma->sendmail($_POST['receiverid'],$_POST['mailsubject'],$_POST['mailcompose']);
}


?>


<div class="col-md-6">

<?php if (!empty($x)) {
 ?>
<div class="alert alert-info"><?php echo $x; ?></div>
<?php } ?>


	<div class="card">
		<div class="card-body">
		
			<legend>Compose Mail</legend>

<form method="POST" action="email.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Receiver:</label>
   <select id="nameid" class="form-control" name="receiverid">
            <option selected="selected">Choose Employee</option>
             <?php 
             foreach ($records as $item) {
               ?>
                 <option value="<?php echo $item['employee_email'] ?>"><?php echo ucwords($item['employee_name'])  ?></option>
                  
              <?php }  ?> 
                
              
         
          </select>
  </div>
  <div class="form-group">
    <label for="mailsubject">Subject:</label>
    <input type="text" class="form-control" id="mailsubject" name="mailsubject">
  </div>
  <div class="form-group">
    <label for="mailcompose">Compose</label>
    <textarea class="form-control" id="mailcompose" name="mailcompose" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="mailattach">Attach file</label>
    <input type="file" class="form-control-file" id="mailattach" name="mailattach">
  </div>
  <button type="submit" class="btn btn-outline-primary btn-lg">Send Mail Now</button>
</form>
		

	</div>
	</div>
</div>

<?php
include('dash_bottom.php');

?>