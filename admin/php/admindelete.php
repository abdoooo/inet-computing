<?php 
require_once("../connection/connect.php");
	
	$stmt = oci_parse($conn,'DELETE FROM ADMIN_TABLE WHERE USERNAME=\'thomas\'');
	oci_execute($stmt);

?>
