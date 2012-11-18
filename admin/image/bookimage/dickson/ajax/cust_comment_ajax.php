<?php

require_once('../conn_fun.php');

$CUST_ID=$_POST["CUST_ID"];
$ISBN=$_POST["isbn"];
$CONTENT=$_POST["comment"];

if(isset($_POST['show'])){
	echo "hihi";
	
}

if(isset($_POST['insert'])){
$sql="insert into COMMENT_TABLE values(COM_ID.NEXTVAL, '".$CUST_ID."', '".$CONTENT."','".$ISBN."')";
$stmt = oci_parse($conn,$sql);
oci_execute($stmt);
echo "OK";
}



?>