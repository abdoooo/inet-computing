<?php

require_once('../conn_fun.php');

$progressID=$_POST["progressID"];


$CUST_ID=$_POST["cust_id"];
$ISBN=$_POST["isbn"];
$CONTENT=$_POST["comment"];

$isbn=$_POST["isbn"];

switch ($progressID){

	case 'new':
		$sql="insert into COMMENT_TABLE values(COM_ID.NEXTVAL,".$CUST_ID.",'".$CONTENT."',".$ISBN.")";
		$stmt = oci_parse($conn,$sql);
		oci_execute($stmt);
		echo "OK";
	break;
	
	case 'show':
		$sql="select C2.NAME, C1.content from comment_table C1, CUSTOMERS C2 where C1.CUST_ID=C2.CUST_ID and ISBN =".$isbn;
		$stmt = oci_parse($conn,$sql);
		oci_execute($stmt);
		
		while( $result=oci_fetch_array($stmt) ){

			echo '<td>'.$result['NAME'].'</td>';
			echo '<td>'.$result['CONTENT'].'</td>';

			echo '<p>';
		}
	break;
	
	default: echo 'Error';
}



?>