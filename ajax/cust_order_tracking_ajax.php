<?php
session_start();
require_once('../conn_fun.php');

?>
<link rel="stylesheet" type="text/css" href="../style.css" />
<? 
if ($_SESSION["CUST_ID"]!=null){
$tid = $_GET["ORDER_ID"];

$tracking_status='select * from TRACKING where ORDER_ID ='. $tid;
$stmt = oci_parse($conn,$tracking_status);
oci_execute($stmt);
 
 ?>
 
<?php
echo '<br><table  border="1">';
echo '<tr>';
echo '<td><h4>Order tracking</h4></td>';
echo '</tr>';
while( $result=oci_fetch_array($stmt) ){

echo '<tr>';
echo '<td align="left" valign="top"  >The order on '.$result['INDATE'].' delivered to <b>'.$result['TRACK_STAT'].'</b></td>';
echo '</tr>';


}
echo '</table>';
?>
</table>
<?php
}else{
	echo '<a href=\'cust_login.php\'>Login first,please</a>';
	
}
?>
 
 
 
 
 

 
 
 
 
 
 
 
 