<?php
  require_once("conn_fun.php");
?>
<html>
<head>
  <title>DBMS</title>
</head>

<body>
<!----CUSTOMERS--->
<h1>CUSTOMERS</h1>
<table border="1">
  <tr>
    <td>CUST_ID </td>
    <td>NAME</td>
    <td>EMAIL</td>
    <td>ADDRESS</td>
	<td>CITY</td>
	<td>COUNTRY</td>
	<td>CUST_PW</td>
  </tr>
<?php
$stmt = oci_parse($conn,'select * from CUSTOMERS');
$r = oci_execute($stmt);
$i=0;
while( db->next_record() ){
//while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
    // echo '<td>'.$result['CUST_ID'].'</td>';
     echo '<td>'.$db->f('CUST_ID').'</td>';
     echo '<td>'.$result['NAME'].'</td>';
     echo '<td>'.$result['EMAIL'].'</td>';
     echo '<td>'.$result['ADDRESS'].'</td>';
	 echo '<td>'.$result['CITY'].'</td>';
	 echo '<td>'.$result['COUNTRY'].'</td>';
	 echo '<td>'.$result['CUST_PW'].'</td>';
	 echo '<tr>';
	 
}
?>
</table>


<!----ORDER_ITEMS--->
<h1>ORDER_ITEMS</h1>
<table border="1">
  <tr>
    <td>ORDER_ID </td>
    <td>ISBN</td>
    <td>ITEM_PRICE</td>
    <td>QTY</td>
  </tr>
<?php
$stmt = oci_parse($conn,'select * from ORDER_ITEMS');
$r = oci_execute($stmt);
$i=0;
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
     echo '<td>'.$result['ORDER_ID'].'</td>';
     echo '<td>'.$result['ISBN'].'</td>';
     echo '<td>'.$result['ITEM_PRICE'].'</td>';
     echo '<td>'.$result['QTY'].'</td>';
	 echo '<tr>';
}
?>
</table>


</body>
</html>
