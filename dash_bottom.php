<?php
//session_start();
 if (!isset($_SESSION['user'])) {
   header("location:index.php");
}

$w=$obj->selectQuotesw();
$m=$obj->selectQuotesm();



date_default_timezone_set('Africa/Lagos');



$output=$obj->birthday();

// echo "<prev>";
// echo print_r($w);
// echo "</prev>";



?>


<!-- section right start -->
<div class="col-md-3">
		<div class="card" style="width: 18rem;">
			<div class="card-body">
			    <h5 class="card-title text-center" style="background-color: lightgreen; color: purple"><i>Employee's Birthday Notification</i></h5>
          <?php if (!empty($output)) {?>
            
<img src="<?php echo $output['userimage'];  ?>" class="card-img-top" alt="birthday image of <?php echo $output['employee_name']?>"><br><br>
          <p class="card-text text-center" style="color: blue"><?php echo'Happy Birthday To You' .' '. '<br>'.'<b>'.strtoupper($output['employee_name'].'</b>');  ?></p><br>
          <p class="card-text text-center"><span style="color: purple"><b><i>Date of Birth</i></b></span> :::  <b><?php echo date("d, F  ...",strtotime($output['dob']));  ?></b></p>

          <?php } else{ ?>
           <div>
            <img src="images/birthday.jpg" style="height: 200px; width: 250px;"><br>
            <h5 style="color: purple;">Who's Birthday is Next!!</h5>
          </div>
			    <?php } ?>

			</div>
			    
		</div><br><br>
	<!-- qoutes of the week -->
	<div class="card bg-success" style="width: 18rem; color: white">
  <div class="card-body">
    <h5 class="card-title">Quotes of the week</h5>
    <h6 class="text-center"><i></i></h6>
    <p class="card-text"><?php echo $w['qcomment']; ?></p>
    </div>
    <hr>
    <div class="text-center">
          <small><?php echo date("d,F Y H:i", strtotime($w['datecreated'])) ; ?></small>
         </div>
  
</div><br><br>

<!-- quotes of the month -->

<div class="card bg-primary" style="width: 18rem; color: white">
  <div class="card-body">
    <h5 class="card-title">Quotes of the Month</h5>
    
    <p class="card-text"><?php echo $m['qcomment']; ?></p>
    </div>
    <hr>
    <div class="text-center">
      <small ><?php echo date("d,F Y H:i", strtotime($m['datecreated'])) ; ?></small>
    </div>
    
          
      
  
</div>
</div> 

<!-- section right end -->

</div>
	
</div>









<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">




      $(document).ready(function() {

        

  var bars = $('.progress-bar');
  for (i = 0; i < bars.length; i++) {
    console.log(i);
    var prog = $(bars[i]).attr('aria-valuenow');
    $(bars[i]).width(prog + '%');
    
    if (prog >= '90') {
      $(bars[i]).addClass("bg-success");
    }else if (prog >= '50' && prog < '90') {
      $(bars[i]).addClass("bg-warning");
    } else {
      $(bars[i]).addClass("bg-danger");
    }
  }
});



      // to sear for product and display it in prdcontainer
     $(document).ready(function(){
  $('#search').keyup(function(){
    var searchvalue = $('#search').val();
    //alert(searchvalue);

    $('#searchcont').load("search.php",{mysearch: searchvalue});
  });
  });



$(document).ready(function(){
     $('#npass2').keyup(function(){

$x = $('#npass1').val();

$y = $('#npass2').val();
 
 if ($x===$y) {
$('#mywarning').text('Passwords match confirmed.');
$('#mywarning').addClass('bg-info');
$('#mywarning').removeClass('bg-danger');
$('#pReset').removeAttr("disabled");

 }
 else{
  $('#mywarning').text('Passwords do not match.');
$('#mywarning').addClass('bg-danger');
$('#mywarning').removeClass('bg-info');
$('#pReset').attr("disabled","disabled");
event.preventDefault();

 }


 });

     });
  


$(document).ready(function(){
     $('#npass2').click(function(){

$x = $('#npass1').val();

$y = $('#npass2').val();

 if ($x=='') {
 $('#npass1').addClass('alert-danger');
 event.preventDefault();
}

 else{
$('#npass1').removeClass('alert-danger');
 }
});

     });


$(document).ready(function(){
     $('#loan').click(function(){
$x = $('#loanA').val();
$y = $('#duration').val();
$z = $('#loanP').val();


if ($x ==''||$y==''||$z=='') {
  $('#mywarning3').text('Please complete your loan Form before Submitting ');
  $('#mywarning3').addClass('bg-danger');
  event.preventDefault();

}

else{
  $('#mywarning3').removeClass('bg-danger');
}

      });

     });




    




$(document).ready(function(){
     $(".alert").click(function(){
      
$('.alert').hide('slow');
 })

     })







// function postQuotes() {

// formated_data = $('#myform').serialize();
// //alert(formated_data);

// $.ajax({
//   url:'q.php',
//   type:'POST',
//   dataType:'json',
//   data:formated_data,
//   success:function(rsp){ //response will come in this format {'msg':'',msgclass:'',}
//     //rsp is the response from the server
//     //alert(rsp)
//     if ($('#note').html(rsp.msg)=='success') {
//       $('#note').addClass('alert alert-info')
//     }else{
//       $('#note').addClass('alert alert-danger')
//     }
    
    
//     $('#type').val('');
//     $('#comment').val('');
//     $('#btn').html('Post Quotes');
//     //alert(formated_data)

//   },

//   error:function(err){
//     console.log(err)
//     //err is the response from the server if there is an error
//   }
//   // beforeSend:function(){
//   //   $('#quotes').html('Loading...');
//   // }
// })
// }









function read() {


 formated_data = $('#myread').serialize();


$.ajax({
  url:'read.php',
  type:'POST',
  //dataType:'json',
  data:formated_data,
  success:function(rsp1){ 

    
  },

  error:function(err){
    console.log(err)
    //err is the response from the server if there is an error
  }

});
}




$(function() {

  // Get the form.
  var form = $('#newsform');

  // Get the messages div.
  var formMessages = $('#noted');
  
   
  // Set up an event listener for the contact form.
  //$(form).submit(function(e) {
              
  $("#postnews").click(function(e){ 
    // Stop the browser from submitting the form.
    e.preventDefault();
 
    // Serialize the form data.
    var formData = $(form).serialize();
console.log(formData);
    // Submit the form using AJAX.
    $.ajax({
      type: 'POST',
      url: "postnews.php",
      dataType:'json',
      data: formData
    })
    .done(function(response) {
      // Make sure that the formMessages div has the 'success' class.
      $(formMessages).removeClass('alert alert-danger');
      $(formMessages).addClass('alert alert-success');

      // Set the message text.
      $(formMessages).text(response.msg);

      // Clear the form.
      $('#newstitle, #content').val('');
    })
    .fail(function(data) {
      // Make sure that the formMessages div has the 'error' class.
      $(formMessages).removeClass('alert alert-success');
      $(formMessages).addClass('alert alert-danger');
      console.log(data);
      // Set the message text.
      if (data.msg !== '') {
        $(formMessages).text("Please Complete the form and Try Again");
      } else {
        $(formMessages).text('Oops! An error occured and your message could not be sent.');
      }
    });

  });

});





$(function() {

  // Get the form.
  var form = $('#payform');

  // Get the messages div.
  var formMessages = $('#noted');
  
   var name = $('#employeename');
  // Set up an event listener for the contact form.
  //$(form).submit(function(e) {
              
  $("#payclick").click(function(e){ 
    // Stop the browser from submitting the form.
    e.preventDefault();
 
    // Serialize the form data.
    var formData = $(form).serialize();
console.log(formData);
// if (name=='Employee Name') {
//   alert('hello');
// }
    // Submit the form using AJAX.
    $.ajax({
      type: 'POST',
      url: "paymentdetails.php",
      dataType:'json',
      data: formData
    })
    .done(function(response) {
      // Make sure that the formMessages div has the 'success' class.
      $(formMessages).removeClass('alert alert-danger');
      $(formMessages).addClass('alert alert-success');

      // Set the message text.
      $(formMessages).text(response.msg);

 $(".alert").click(function(){
      
$('.alert').hide('slow');
 });


      // Clear the form.
      $('#accountno, #accountname').val('');
    })
    .fail(function(data) {
      // Make sure that the formMessages div has the 'error' class.
      $(formMessages).removeClass('alert alert-success');
      $(formMessages).addClass('alert alert-danger');
      console.log(data);
      // Set the message text.
      if (data.msg !== ' ') {
        $(formMessages).text("Please Complete the form and Try Again");
      } else {
        $(formMessages).text('Oops! An error occured and your message could not be sent.');
      }
      $(".alert").click(function(){
      
        $('.alert').hide('slow');
 });

    });

  });

});


$(document).ready(function(){
     $('#add').click(function(){

$x = $('#deductiontype').val();



 if ($x=='') {
 $('#deductiontype').addClass('alert-danger');
 event.preventDefault();
}

 else{
$('#deductiontype').removeClass('alert-danger');
 }
});

});















    </script>	

</body>
</html>



<!-- Modal -->
