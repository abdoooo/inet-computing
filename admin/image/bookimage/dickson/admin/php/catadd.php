<?php 
require_once("../connection/connect.php");
	
$cat_name = $_POST['CAT_NAME'];

	$stmt = oci_parse($conn,'INSERT INTO ADMIN_TABLE (CAT_NAME) VALUES (\' '. $cat_name .' \')');
	$r = oci_execute($stmt);

?>
<meta http-equiv="REFRESH" Content="0;url=../index.php">