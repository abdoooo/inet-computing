<?php
  session_start();
  require_once("conn_fun.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Check Login</title>
</head>
<?php
$email=$_POST["email"];
$password=$_POST["password"];

if ($email !=null && $password!=null){
	$stmt = oci_parse($conn,'select * from CUSTOMERS where EMAIL=\''.$email.'\' and CUST_PW=\''.$password.'\'');
	$r = oci_execute($stmt);

	$result=oci_fetch_array($stmt);
	if (!$result && $sid==null){
		echo "Email or Password NOT correct,plaese try again!";
	}else{
		$_SESSION["CUST_ID"]=$result["CUST_ID"];
		$_SESSION["NAME"]=$result["NAME"];
		$_SESSION["EMAIL"]=$result["EMAIL"];
		$_SESSION["ADDRESS"]=$result["ADDRESS"];
		$_SESSION["CITY"]=$result["CITY"];
		$_SESSION["COUNTRY"]=$result["COUNTRY"];
		$_SESSION["CUST_PW"]=$result["CUST_PW"];
										
		echo "Loading...".'<p>';
		echo "<script language='javascript'>";
		echo " location='cust_info.php';";
		echo "</script>";
	}
}else{
	echo 'Email or Password cannot NULL,please try again!!'	;
}

?>

<body>
</body>
</html>
<?php oci_close ($conn); ?>