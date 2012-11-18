<?php 
require_once("connection/connect.php");

$txtcat = $_POST['txtcat'];
	
	$searchstmt = oci_parse($conn,'select * from BOOKS WHERE CATEGORIES = \''.$txtcat.'\'');
	$searchr = oci_execute($searchstmt);
	$searchi=0;

?>