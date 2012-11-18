<?php
  	require_once("connection/connect.php");
	
	$stmt = oci_parse($conn,'select * from BOOKS');
	$r = oci_execute($stmt);
	$i=0;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Book</title>
</head>

<body>
<?php
while( $result=oci_fetch_array($stmt) ){
	$i++;
     echo $result['ISBN'] . " " . $result['TITLE'];
}
?>
</body>
</html>