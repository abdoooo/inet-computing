<?php

function postthing($sql){

  if (!mysql_query($sql)){
	  die('Error: ' . mysql_error());
	  }
	  
	  if(isset($_GET['editbook'])){
		  echo "<div align=\"center\"><h3 class=text-info>Information Updated</h3></div>";
		  
	  }elseif(isset($_GET['postbook'])){
		  
		  if(isset($_GET['del'])){
			echo "<div align=\"center\"><h3 class=text-info>The Book Deleted</h3></div>";
			
		  }else{
			echo "<div align=\"center\"><h3 class=text-info>Information uploaded</h3></div>";
			
		  }
	  }elseif(isset($_GET['signpost'])){
		  
		  if(isset($_GET['editprofile'])){
			echo "<div align=\"center\"><h3 class=text-info>Saved Change</h3></div>";
			
		  }else{
			echo "<div align=\"center\"><h3 class=text-info>Sign Up Successful</h3></div>";
		  }
		  
	  }elseif(isset($_GET['delorder'])){
		echo "<div align=\"center\"><h3 class=text-info>Deleted Order</h3></div>";
		
	  }elseif(isset($_GET['order'])){
		echo "<div align=\"center\"><h3 class=text-info>Sent Order</h3></div>";
	  }
}
?>