<?php

require_once('../conn_fun.php');


if(isSet($_GET['name']))
{
	$name= $_GET['name'];
	$sql="SELECT * FROM CUSTOMERS WHERE NAME='".$name."'";
		
	$stmt = oci_parse($conn,$sql);
	$r = oci_execute($stmt);

	if (oci_fetch_array($stmt)){	
		echo '<font color="#cc0000"><STRONG>'.$name.'</STRONG> is already in use.</font>';
	}else{
		echo 'OK';
	}
}
oci_close ($conn);
?>