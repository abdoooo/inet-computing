<?php 
require_once("../connection/connect.php");
	
$txtusername = $_POST['txtusername'];
$txtpass = $_POST['txtpass'];

$txtnewusername =(string)$txtusername;
$txtnewpass = (string)$txtusername;

$i=0;
	$stmt = oci_parse($conn,'select * from ADMIN where ADMIN_ID = '.$i);
	$r = oci_execute($stmt);

	while( $result=oci_fetch_array($stmt) ){
 		while ($i == $result['ADMIN_ID']) {
			$i++;
			$stmt = oci_parse($conn,'select * from ADMIN where ADMIN_ID = '.$i);
			$r = oci_execute($stmt);
		}
	}

	$stmt = oci_parse($conn,'INSERT INTO ADMIN (ADMIN_ID, USERNAME, PASSWORD) VALUES (\' '. $i .' \',\' '. $txtusername .' \', \' '. $txtpass . '\')');
	$r = oci_execute($stmt);

?>
<meta http-equiv="REFRESH" Content="0;url=../index.php">