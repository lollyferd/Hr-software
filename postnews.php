<?php

include ("User.php");

$news = new User;
?>


<?php 
$output = $news->postnews($_SESSION['userid'],$_POST['newstitle'],$_POST['content']);

echo $output;


 ?>