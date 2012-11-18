<?php
session_start();
ob_start();

include('../connection/connect.php');

$txtusername=$_POST['txtusername'] ; 
$txtpass=$_POST['txtpass']; 
$txtnewusername=(string)$txtusername; 
$txtnewpass=(string)$txtpass; 

$stmt = oci_parse($conn,'select * from ADMIN WHERE USERNAME = \''.$txtusername.'\' and PASSWORD = \''.$txtpass.'\' order by ADMIN_ID');
oci_execute($stmt);
$row = oci_fetch_array($stmt);

$count = oci_num_rows($stmt);

if ($count == 1) {
	echo "Login Successfully";
	session_register("txtusername");
	$_SESSION["USERNAME"]=$row['USERNAME'];
	//session_register("s_acc");
	//$_SESSION['s_id'] = $row['s_id'];
	echo "<script>alert('Login Successful')</script>";
} else {
	echo "<script>alert('Wrong name or Password')</script>";
}

/*if ($txtusername !=null && $txtpass!=null){
	$stmt = oci_parse($conn,'select * from ADMIN_TABLE where USERNAME=\''.$txtusername.'\' and PASSWORD=\''.$txtpass.'\'');
	$r = oci_execute($stmt);
	$result=oci_fetch_array($stmt);
	if (!$result ==null){
		echo "Email or Password NOT correct,plaese try again!";
	}else{
		$_SESSION["USERNAME"]=$result["USERNAME"];
		$_SESSION["PASSWORD"]=$result["PASSWORD"];
		echo "success";
	}
}else{
	echo 'USERNAME or PASSWORD cannot NULL,please try again!!'	;
}*/

//$stmt = oci_parse($conn,'SELECT * FROM ADMIN_TABLE WHERE USERNAME = \''.$txtusername.'\' and PASSWORD = \''.$txtpass.'\'');

/*$textstmt = oci_parse($conn,'SELECT * FROM ADMIN_TABLE');
oci_execute($textstmt);
oci_execute($stmt);
$array=oci_fetch_array($textstmt);
echo 'USERNAME:'.$array['USERNAME']. "<BR />";

$row=oci_fetch_row($textstmt);
echo 'row:'.$row[1] . "<BR />";

$count = oci_num_rows($textstmt);
echo 'oci_num_rows:'.$count. "<BR />";

$field = oci_num_fields(oci_parse($conn,'SELECT * FROM ORDERS'));
echo 'oci_num_fields: ' . $field. "<BR />";
*/
/*
$stmt = oci_parse($conn, "SELECT * FROM ADMIN");
oci_execute($stmt);

while (oci_fetch($stmt)) {
    echo "\n";
    $ncols = oci_num_fields($stmt);
	echo 'fields: ' .$ncols . "<BR />";
    for ($i = 1; $i <= $ncols; $i++) {
        $column_name  = oci_field_name($stmt, $i);
        $column_value = oci_result($stmt, $i);
        echo $column_name . ': ' . $column_value . "\n";
    }
    echo "<BR />";
}
*/

/*$query = "SELECT * FROM ADMIN_TABLE WHERE USERNAME= '$txtusername' AND PASSWORD= '$txtpass'";
//$stmt = oci_parse($conn,'SELECT * FROM ADMIN_TABLE WHERE USERNAME =\''.$txtusername.'\' AND PASSWORD=\''.$txtpass.'\'');
$result_set = oci_parse($conn, $query);
$r = oci_execute($stmt);
$i=0;
$count = oci_num_rows($stmt);
echo $query;
echo $count;
*/

/*
if($count==1) {
session_register("txtaccount");
$_SESSION['username'] = $result['username'];
session_register("txtpass"); 

echo "<script>alert('Login successful')</script>";
} else if ($count == 0 ){
echo "<script>alert('Wrong Member name or Password')</script>"; 
} else {
echo "<script>alert('Warning!!!  Warning!!!  Warning!!!	You have no permission to access the system!!!')</script>"; 
}
ob_end_flush();*/
?>
<meta http-equiv="REFRESH" Content="0;url=../index.php">
<title>check login......</title>
