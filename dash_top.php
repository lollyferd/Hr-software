<?php
include ("User.php");
//session_start();
if (!isset($_SESSION['user'])) {
	header("location:index.php");
}


$obj= new User;


//$output=$obj->loanapprove($_POST['status'],$_SESSION['loanid']);


 $holdall=$obj->getallstaff($_SESSION['user']);
 $_SESSION['userid']=$holdall['staff_id'];


 $holdpf=$obj->getpf($_SESSION['userid']);

$notifyoutput= $obj->leaveNotify($_SESSION['userid']);





?>








<!DOCTYPE html>
<html>
<head>
	<title> HR Portal </title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- animated.css link -->
 <link rel="stylesheet" type="text/css" href="animate.css-master/animate.css">
 <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"> -->



<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- fontawsom CDN -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

<!-- favicon link -->

<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-32x32.png">



<!-- internal css -->

<style type="text/css">
.try2:hover{
color: white;
background-color: #795FCE;

}
.leaveedit{
margin-bottom: 20px;

}
.myreport{
  /*display: none;*/
}
	.menuicon i{
		font-size: 2.5em;
	padding: 3rem;
	}
.myperform{
	color: #FFCB3D;
}
.editprofile{
	color: 	#08042e;
	font-size: 100%

}
</style>


</head>
<body>
<!-- menu bar -->
	<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #0A043E">
  <a class="navbar-brand" href="dash_main.php" style="color: #FFCB3D"><img src=""><span>HR_Proper</span></a>
  <button style="background-color: white" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    	<li class="nav-item active">
        <a class="nav-link" style="color: #FFCB3D" href="dash_main.php" title="Home"><i class="fas fa-home"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: #FFCB3D" href="newsdisplay.php" title="news"><i class="fas fa-globe"></i><span class="badge badge-info">14</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"style="color: #FFCB3D" href="#" title="Account Settings"><i class="fas fa-user-circle"></i></a>
      </li>
      <div class="dropdown">
      
        <a class="nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFCB3D" href="#" title="Send Mail"><i class="far fa-envelope"></i><span class=" badge badge-secondary">13</span></a>
     
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       
    <a class="dropdown-item" href="#"><b>Inbox</b><span class="badge badge-primary">2</span></a>
     <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#"><b>Sent</b><span class="badge badge-danger">3</span></a>
     <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#"><b>Drafts</b><span class="badge badge-secondary">3</span></a>

  </div>
      </div>
      <div class="dropdown">
        <a class="nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: #FFCB3D" href="#" title="Notifications"><i class="far fa-bell"></i><span class="badge badge-info"><?php echo $notifyoutput; ?></span></a>

         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       
   <?php 

$objread= new User;

 $read=$objread->leaveunread($_SESSION['userid']);


  foreach ($read as $item) {
if (!empty($item)) {

    ?>
<form  method="POST" id="myread">
  <input type="hidden" name="id"   id="id" value="<?php echo $item['leave_id']; ?>">
     <input type="hidden" name="status" value="1" id="status">
     <a href="notification.php" class="dropdown-item try2"><span class="font-weight-bold" id="click" onclick="read()"> <?php echo 'System reply: Your '. $item['leaveduration'].'days Leave Application Final Status';  ?></span>  </a>
</form>

 <?php } }?>
  </div>
</div>
<div class="">
<li class="nav-item">
  <span style="color: white; " class="animated slideInRight slow nav-link" ></span>
</li>
</div>
    </ul>

    <div>
    	<a href="logout.php" style="color: white"><button class="btn btn-success my-2 my-sm-0">Logout</button></a>
    	
    	
    </div>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
     
  </div>
</nav><br>

<!-- body -->

<div class="container-fluid">
<div class="row">
<div class="col-md-3">
<!-- section left start -->
			<!-- profile start -->
	<div class="card">
				    <h5 class="text-center card-title">Profile</h5>
				    <img src="<?php echo $holdall['userimage']?>" class="card-img-top" alt="user image" style="width: 100px;height: 100px; border-radius: 50%; align-self: center;">
    <div class="card-body">
      
		      <i class="fas fa-id-badge"></i> &nbsp;&nbsp;&nbsp;<span><?php echo'AMFB/0'. $_SESSION['userid'];  ?></span>
		      <hr>
          <i class="fas fa-user-tie"></i> &nbsp;&nbsp;&nbsp;<span><?php echo $holdall['employee_name']?></span>
          <hr>
		      <i class="fas fa-at"></i>&nbsp;&nbsp;&nbsp;<span><?php echo $_SESSION['user']; ?></span>
		      <hr>
		      <i class="fas fa-key"></i>&nbsp;&nbsp;&nbsp;<span><?php echo'<b>' .$holdall['access_level'].'</b>';?></span>
		      <hr>
		      <i class="fas fa-award"></i>&nbsp;&nbsp;&nbsp;<span><?php echo $holdall['employee_position']; ?></span>
		      <hr>
		      <i class="fas fa-sitemap"></i>&nbsp;&nbsp;&nbsp;<span><?php echo $holdall['employee_department']; ?></span>
		      <hr>
		      <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Password Reset</button>
    	</div>
 		</div>
<!-- profile end --><br>


<!-- password reset modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: grey"><i>Password Reset</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="dash_main.php" method="POST">
    		<div class="form-group">
    		<input class="form-control" type="password" name="cpass" placeholder="Current Password" id="cpass">	
    		</div>
      <div class="form-group">
        <small  id="mywarning2" style="color: white"></small>
      	<input class="form-control" type="password" placeholder="New Password" id="npass1">

      </div>
      <div class="form-group">
      	<input  class="form-control" type="password" name="npass" placeholder="Confirm Password" id="npass2">
         <small  id="mywarning" style="color: white"></small>
      </div>
      
      <button class="btn btn-secondary btn-block" type="submit" id="pReset" name="pReset" disabled="disabled">Reset</button>
  </form>
      </div>
      
    </div>
  </div>
</div>

<!-- menu start -->

<div class="card accordion" id="accordion1" >
  <div class="card-body bg-secondary">
    <nav class="nav flex-column">
   <div>
		  <a class="nav-link active bg-primary menuh1" style="color: white" data-toggle="collapse" data-target="#mydrop">Account Managemt</a>
		  <div id="mydrop" class="collapse menu1" data-parent='#accordion1'>
		    <a href="employee_details.php"><button type="button" class="btn btn-success" style="width: 100%">Add Employee</button></a><br><br>
		    <a href="details.php"><button type="button" class="btn btn-success" style="width: 100%">Edit Employee profile</button></a><br><br>
		    <a href="news.php"><button type="button" class="btn btn-success" style="width: 100%">Post News/Events</button></a><br><br>
		     <a href="quotes.php"><button type="button" class="btn btn-success" style="width: 100%">Post Quotes</button></a><br><br>
		     
		  </div>
		</div><br>
 <div>
		  <a class="nav-link active bg-primary menuh2 " href="#" style="color: white" data-toggle="collapse" data-target="#mydropL">Leave Managemt</a>
		  <div id="mydropL" class="collapse menu2" data-parent='#accordion1'>
		    <a href="leave_form.php"><button type="button" class="btn btn-success" style="width: 100%">Application</button></a><br><br>
		    <button type="button" class="btn btn-success" style="width: 100%"><a href=""></a>Leave Approval</button>
		  </div>
</div><br>

	<div>
		  <a class="nav-link active bg-primary menuh3 " href="#" style="color: white" data-toggle="collapse" data-target="#mydropP">Payrol Managemt</a>
		  <div id="mydropP" class="collapse menu3" data-parent='#accordion1'>
		  	<a href="staff_payment_details.php"><button type="button" class="btn btn-success" style="width: 100%">Add Staff Payment Details</button></a><br><br>
		    <a href="staff_deductions.php"><button type="button" class="btn btn-success" style="width: 100%">Deductions</button></a><br><br>
        <a href="allowances.php"><button type="button" class="btn btn-success" style="width: 100%">Basic Pay & Allowances</button></a><br><br>
		    <a href="Payslip.php"><button type="button" class="btn btn-success" style="width: 100%">Staff Payslip</button></a><br><br>
        <a href="paynow.php"><button type="button" class="btn btn-success" style="width: 100%">Pay Now</button></a>
		  </div>
      <div><br>
      <a class="nav-link active bg-primary menuh4 " href="#" style="color: white" data-toggle="collapse" data-target="#mydropA">Loan Management</a>
      <div id="mydropA" class="collapse menu4" data-parent='#accordion1'>
        <a href="loanapproval.php"><button type="button" class="btn btn-success" style="width: 100%">Approval</button></a><br><br>
       
      </div>
</div><br>
    </div><br>
 </nav>
    
</div>
  
</div>
 

<!-- menu end -->
</div>

<!-- section  left end -->		
