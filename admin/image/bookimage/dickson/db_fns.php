<?php

function db_connect() {
	
	$db = "studora.comp.polyu.edu.hk/dbms";
	
	$result = @oci_connect('"11912682t"', "nohopar", $db);
	
	if (!$result) {
/*			$err = oci_error();
			echo "Oracle Connect Error,check conn.php <br/>" ;
			echo $err['message'];
			exit;*/
			 return false;
	}

  	 return $result;
}

function db_result_to_array($result) {
 
  $res_array = array();
  
  $count=0;
  while( $row=oci_fetch_array($result) ){
	 
	 $res_array[$count] = $row;
	 $count++;
  }
 return $res_array;

 /*mysql 
  $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
   */
}

?>
