<?php 
require_once("../connection/connect.php");
	
$txtcat = $_POST['txtcat'];
	
	//$stmt = oci_parse($conn,'DELETE FROM CATEGORIES WHERE CAT_NAME=\''.$txtcat.'\'');
	$stmt = oci_parse($conn,'DELETE FROM CATEGORIES WHERE CAT_NAME = \''.$txtcat.'\'');
	oci_execute($stmt);
?>
<meta http-equiv="REFRESH" Content="0;url=../book_add.php">