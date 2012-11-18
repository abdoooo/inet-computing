<?php 
require_once("../connection/connect.php");
	
$txtcat = $_POST['txtcat'];

//$namestmt = oci_parse($conn, 'select * from CATEGORIES where CAT_NAME LIKE \''.$txtcat.'\'');
/*$name ="LIFTSTYLE";
$namestmt = oci_parse($conn,'select * from CATEGORIES where CAT_NAME = \''.$name.'\'');
$namer = oci_execute($namestmt);
$nameresult=oci_fetch_array($namestmt);

while( $result=oci_fetch_array($namestmt) ){
	$result=oci_fetch_array($namestmt);
	echo 'CAT_NAME:'.$result['CAT_NAME'];
}
*/
//$m_type = $_POST['m_type'];


if ($txtcat == "") {
	echo "<script>alert('Please input Category name')</script>"; 
} /*else if ($txtcat == "") {
	echo "<script>alert('Category name is existing')</script>"; 
} */else {

	$i=0;
	$stmt = oci_parse($conn,'select * from CATEGORIES where CAT_ID = '.$i);
	$r = oci_execute($stmt);

	while( $result=oci_fetch_array($stmt) ){
 		while ($i == $result['CAT_ID']) {
			$i++;
			$stmt = oci_parse($conn,'select * from CATEGORIES where CAT_ID = '.$i);
			$r = oci_execute($stmt);
		}
	}

	$stmt = oci_parse($conn,'INSERT INTO CATEGORIES (CAT_ID, CAT_NAME) VALUES ('.$i.', \''.$txtcat.'\')');
	$r = oci_execute($stmt);
}
?>
<meta http-equiv="REFRESH" Content="0;url=../book_cat.php">