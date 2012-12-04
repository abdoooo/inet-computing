<?php

function postthing($sql){

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
  if(isset($_GET['postbook'])){
	  echo "<br><br><div align=\"center\"><h3 class=text-info>Upload successful</h3></div>";
  }else{
	  echo "<div align=\"center\"><h3 class=text-info>Sign Up Successful</h3></div>";
  }
}
?>