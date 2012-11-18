<?php 
require_once("../connection/connect.php");

$cat_id = $_POST['cat_id'];
$txtcategory = $_POST['txtcategory'];

$stmt = oci_parse($conn,'UPDATE CATEGORIES SET CAT_NAME = \''.$txtcategory.'\' WHERE CAT_ID = \''.$cat_id.'\'');
	$r = oci_execute($stmt);
	
?>
<meta http-equiv="REFRESH" Content="0;url=../book_cat.php">