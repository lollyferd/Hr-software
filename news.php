<?php
include('dash_top.php');

?>


<div class="col-md-6">
<div id="noted"></div>
		<div class="card">
		<div class="card-body">
<div class="btn-success text-center">
              <h4>Post News</h4>
            </div>
<form method="POST" id="newsform">
	<div class="form-group">
		<input type="text" name="newstitle" placeholder="Post Title" id="newstitle" class="form-control">
		
	</div>
	<div class="form-group">
<textarea class="form-control" name="content" id="content" placeholder="Write here..." cols="50" rows="10"></textarea>
</div>

<button type="submit" class="btn btn-info btn-block"  id="postnews">Post Now</button>
</form><br>
<a href="dash_main.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
</div>

</div>


	
</div>



<?php
include('dash_bottom.php');

?>