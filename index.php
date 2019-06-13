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

<!-- External css -->
<link rel="stylesheet" type="text/css" href="mycss/style.css">

<!-- internal css -->

<style type="text/css">
	

</style>


</head>
<body>

	<!-- menu bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#"><img src="images/logo2.png"><span style="color:#FFCB3D " ><b><i>HR</i></b></span> <span style="color:#0A043E "><b><i>Proper</i></b></span></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
      </li>
    </ul>
    <div class="ml-auto ">
      <button type='button' class="btn btn-outline my-2 my-sm-0 myatag " data-toggle="modal" data-target="#mylog">Client Login</button>
    </div>
  </div>
</nav>
<!-- moda login -->

<div class="modal fade" id="mylog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content">
     <div class="card" style="background-color:#0A043E; color: white">

  <div class="card-body">
    <p id="notice2"></p>
<form action="dashlogin.php" method="POST">
 
  <div class="form-group">
    <label for="exampleInputEmail1" class="mylabel"><b><i>Email address</i></b></label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="mylabel"><b><i>Password</i></b></label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <!-- <small id="notice2"></small> -->
  </div>
  
  <button class="btn btn-primary validate btn-block">Login</button>
</form>
</div>
</div>
      
    </div>
  </div>
</div>
<!-- space -->
<div class="row">
	<div class="col" style="height: 75px"></div>
	
</div>

<!-- sliding image -->
<div class="container">
	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/sitelog3.jpg" class="d-block w-100" alt="...">
      
    </div>
     <div class="carousel-item">
      <img src="images/slide1.png" class="d-block w-100" alt="...">
      <div class="carousel-caption  d-md-block">
    <h5 class="animated bounceInLeft slow badge badge-primary">lets fix your problems for you</h5>
    
  </div>
    </div>
    <div class="carousel-item">
      <img src="images/slide_edit_2.png" class="d-block w-100" alt="...">
      
    </div>
    <div class="carousel-item">
      <img src="images/slide_edit_3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption  d-md-block exp">
  <h5 class="animated bounceInUp slow badge badge-primary">lets fix your problems for you 2</h5>
    
  </div>
  <!-- <div class="carousel-caption d-none d-md-block exp1">
    <button class=" animated bounceInLeft slow btn btn-primary"><a href="#"><span>Learn More</span></a> </button>
    
  </div> -->
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
</div><br>
<div class="container">
    <div class="row jumbotron" style="background-color: #0A043E;">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
        <p class="lead" style="color: white">We offer you the best HR software that is affordable, accessible, easy to use and provides basic solutions to organizational issues...</p>
      </div>
       <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
         <a href="#"><button type="button" class="btn btn-outline btn-lg bg-light">Apply Now</button></a>
       </div> 
      </div>

    </div>
<!-- text befor card -->
 <!-- welcome section -->
<div class="container-fluid padding">
  <div class="row welcome text-center">
    <div class="col-12">
      <h1 class="display-4">HR Solution.</h1>
      <hr>
    </div>
    <div class="col-12">
      <p class="lead">welcome to my template buiding page with loots of features and is highly responsive. This will help me to build other sites that are responsive</p>
    </div>
  </div>
</div>
   <!--  three colum section -->
<div class="container-fluid padding">
<div class="row text-center padding">
  <div class="col-xs-12 col-sm-6 col-md-3 padding mymovehead1">
 <img src="images/employees2.png" class="padding mymove1 ">
    <h3>Employee Management</h3>
    <p>welcome to my template buiding page with loots of features and is highly responsive</p>
  </div>
    <div class="col-xs-12 col-sm-6 col-md-3 mymovehead2">
    <img src="images/leave_online.png" class="padding mymove2">
    <h3>Leave Managemet</h3>
    <p>welcome to my template buiding page with loots of features and is highly responsive</p>
  </div>
    <div class="col-sm-6 col-md-3 mymovehead3">
    <img src="images/payroll2.png" class="padding mymove3">
    <h3>Payroll</h3>
    <p>welcome to my template buiding page with loots of features and is highly responsive</p>
  </div>
   <div class="col-sm-6 col-md-3 mymovehead4">
    <i class="fas fa-at padding mymove4"></i>
    <h3>Email Services</h3>
    <p>welcome to my template buiding page with loots of features and is highly responsive</p>
  </div>
</div>
  
</div>
<div>
  <hr>
</div>
<br><br>
<!-- where to find us -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center padding"><h3 style="background-color:#0A043E; color: #FFCB3D ">Where To Find Us</h3></div>
		<div class="col-md-4"></div>
	</div>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 mymapmove">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2845.044713524965!2d3.3563359954914596!3d6.614245351586052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b93b65ba86e15%3A0x3ae060fb3436c3ad!2sIkeja+City+Mall!5e1!3m2!1sen!2sng!4v1548920690868" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>

<div class="col-md-3"></div>
	</div>
	
</div><br>
<hr style="background-color:#0A043E; width: 800px">
<!-- message befor contact us form -->
<div class="container">
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md affect">
		<i class="fas fa-map-pin"></i> &nbsp;&nbsp;<span style="color: #0A043E">We offer the best HR platform that will solve all We offer the best HR platform that will solve all We offer the best HR platform that will solve all We offer the best HR platform that will solve all  </span><br><br>

		<i class="fas fa-map-pin"></i> &nbsp;&nbsp;<span style="color: #0A043E"><b>Contact</b> Us now for the best solution to your organisation issues </span>
	</div>
	<div class="col-md-2"></div>
</div>  
<hr style="background-color:#0A043E ">
<!-- contact us form -->
<div class="container">
<form action="Contact_us.php"  method="POST">
  <div class="form-row">
  	<div class="form-group col-md-4">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" name="fullname" placeholder="John Mike">
  </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" placeholder="John@mail.com">
    </div>
    <div class="form-group col-md-4">
      <label for="inputOrganizationId">Phone</label>
      <input type="text" class="form-control" name="phone">
    </div>
  </div>

  <div class="form-group">
  	<label for="inputeMessage">Message</label>
  	<textarea class="form-control" placeholder="Type your Message" name="message"></textarea>
  </div>
 
  <button class="btn btn-primary btn-lg">Send Message</button>
</form>
</div>
</div><br>
 <!-- footer -->
    <footer>
      <div class="container-fluid padding">
        <div class="row text-center">
          <div class="col-md-4">
            <img src="">
            <hr class="light">
            <p>555 5555 555</p>
            <p>email address</p>
            <p>street address</p>
            <p>city and state</p>
          </div>
          <div class="col-md-4">
            <hr class="light">
            <h5>Our hours</h5>
            <hr class="light">
            <p>mondays: 9am - 5pm</p>
            <P> Saturdays: 2pm - 4pm</P>
            <P> Sundays: Closed</P>
          </div>
          <div class="col-md-4">
            <hr class="light">
            <h5>Our hours</h5>
            <hr class="light">
            <p>mondays: 9am - 5pm</p>
            <P> Saturdays: 2pm - 4pm</P>
            <P> Sundays: Closed</P>
          </div>
          <div class="col-12">
            <hr class="light-100">
            <h5>&copy; www.hrproper.com</h5>
          </div>
        </div>
      </div>
    </footer>

































<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src=js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){

$('.validate').click(function(){
  
 var y=$('#exampleInputEmail1').val();
 var z=$('#exampleInputPassword1').val();



 if (y=='') {
  $('#exampleInputEmail1, #notice2').addClass('alert alert-danger');
  $('#notice2').text("Can't Remember your Login Details? Please Contact Your Admin");
  event.preventDefault();

 }

 if (z=='') {
  $('#exampleInputPassword1, #notice2').addClass('alert alert-danger');
   $('#notice2').text("Can't Remember your Login Details? Please Contact Your Admin");
  event.preventDefault();

 }


else{
  $('#notice2,exampleInputPassword1').addClass('alert alert-success');
}

});

});

       $(document).ready(function(){

$('.mymovehead1').mouseenter(function(){
$(".mymove1").addClass("animated heartBeat");

})
$('.mymovehead1').mouseleave(function(){
$(".mymove1").removeClass("animated heartBeat");

})
$('.mymovehead2').mouseenter(function(){
$(".mymove2").addClass("animated heartBeat");

})
$('.mymovehead2').mouseleave(function(){
$(".mymove2").removeClass("animated heartBeat");

})
$('.mymovehead3').mouseenter(function(){
$(".mymove3").addClass("animated heartBeat");

})
$('.mymovehead3').mouseleave(function(){
$(".mymove3").removeClass("animated heartBeat");

})
$('.mymovehead4').mouseenter(function(){
$(".mymove4").addClass("animated heartBeat");

})
$('.mymovehead4').mouseleave(function(){
$(".mymove4").removeClass("animated heartBeat");

})
})

    </script>
</body>
</html>