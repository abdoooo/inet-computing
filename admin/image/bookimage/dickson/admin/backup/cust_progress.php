<?php require_once("conn_fun.php");?>

<?php
$progressID=$_GET["progressID"];

$CUST_ID=$_POST["CUST_ID"];

if(isSet($_POST["NAME"]))
{
$NAME=$_POST["NAME"];
}else{
echo 'Name Err';
}
$EMAIL=$_POST["EMAIL"];
$ADDRESS=$_POST["ADDRESS"];
$CITY=$_POST["CITY"];
$COUNTRY=$_POST["COUNTRY"];
$CUST_PW=$_POST["CUST_PW"];

switch ($progressID){
	case 'cust_reg':
		$sql="insert into CUSTOMERS values(CUST_ID.NEXTVAL, '".$NAME."', '".$EMAIL."','".$ADDRESS."','".$CITY."','".$COUNTRY."','".$CUST_PW."')";
		$stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
		oci_close ($conn);
		
		echo "Welcome";
		break;
		
	case 'cust_edit':
		$sql="UPDATE CUSTOMERS SET NAME='".$NAME."', ADDRESS='".$ADDRESS."', CITY='".$CITY."', COUNTRY='".$COUNTRY."', CUST_PW='".$CUST_PW."' WHERE CUST_ID=".$CUST_ID."";
		$stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
		oci_close ($conn);
		echo 'Updated'.'<br />';
		echo "<a href='javascript:history.go(-1)'>go back</a>";
		break;
		
	case 'cust_del':
		
		$sql="DELETE FROM CUSTOMERS WHERE CUST_ID = '".$CUST_ID."'";
		$stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
		oci_close ($conn);
		echo 'Deleted'.'<br />';
		break;
	default: echo 'Error';
}




?>