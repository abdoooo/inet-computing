<?php 
require_once("../connection/connect.php");
	
$txtisbn = $_POST['txtisbn'];

//echo $txtisbn;

	$stmt = oci_parse($conn,'DELETE FROM BOOKS WHERE ISBN = \''.$txtisbn.'\'');
	oci_execute($stmt);
?>
<meta http-equiv="REFRESH" Content="0;url=../book_add.php">