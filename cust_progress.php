<?php 

  require_once('recaptchalib.php');
  $privatekey = "6LerFcoSAAAAAAqK4kx9HwBlnfAjbz4DtVtAyszv";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    //die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
    //     "(reCAPTCHA said: " . $resp->error . ")");  
								

header('Location: registier.php?error=captcha');
 exit;
  } else {



session_start();
require_once("conn_fun.php");
?>

<?php

$CUST_ID=$_POST["CUST_ID"];
$NAME=$_POST["name"];
$EMAIL=$_POST["email"];
$ADDRESS=$_POST["address"];
$CITY=$_POST["city"];
$COUNTRY=$_POST["country"];
$CUST_PW=$_POST["password"];
$newcpassword=$_POST["newcpassword"];
$progressID=$_GET["progressID"];


switch ($progressID){
	case 'cust_reg':
			
		$sql="insert into CUSTOMERS values(CUST_ID.NEXTVAL, '".$NAME."', '".$EMAIL."','".$ADDRESS."','".$CITY."','".$COUNTRY."','".$CUST_PW."')";
		$stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
		oci_close ($conn);
		
		echo '<script>alert(\'Welcome\n Please login again!!\')</script>';
		echo "<body onload='window.location=\"login.php\"'>";
		
		break;
		
	case 'cust_edit':
		
		$sql="UPDATE CUSTOMERS SET EMAIL='".$EMAIL."', ADDRESS='".$ADDRESS."', CITY='".$CITY."', COUNTRY='".$COUNTRY."' WHERE CUST_ID=".$CUST_ID."";
		
		$_SESSION["NAME"]=$EMAIL;
		$_SESSION["ADDRESS"]=$ADDRESS;
		$_SESSION["CITY"]=$CITY;
		$_SESSION["COUNTRY"]=$COUNTRY;
		
		$stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
		oci_close ($conn);
		echo "</h3>Update Successful</h3>";
		echo "<script language='javascript'>";
		echo " location='account.php';";
		echo "</script>";
		break;
		
	case 'cust_del':
		$sql="DELETE FROM CUSTOMERS WHERE CUST_ID = '".$CUST_ID."'";
		$stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
		oci_close ($conn);
		echo '<script>alert(\'Account Deleted\')</script>';
		echo "<body onload='window.location=\"cust_login.php\"'>";
		break;
		
	case 'chang_pw':

		
		$sql="UPDATE CUSTOMERS SET  CUST_PW='".$newcpassword."' WHERE CUST_ID=".$CUST_ID."";
		$stmt = oci_parse($conn,$sql);
		oci_execute($stmt);
		oci_close ($conn);
		
		echo "<script>alert('Password changed!')</script>";
		echo "<body onload='window.location=\"chpasswd.php\"'>";
		
		break;
	default: echo "Error";

}
}
?>