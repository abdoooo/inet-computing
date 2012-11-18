<?php
  require_once("conn_fun.php");
?>
<html>
<head>
  <title>DBMS</title>
</head>

<body>
<!---Update--->
<h1>Update:</h1>
1)BOOKS table add "INDATE", "PUBDATE", "QTY"
<hr>
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
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
     echo '<td>'.$result['CUST_ID'].'</td>';
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

<!----ORDERS--->
<h1>ORDERS</h1>
<table border="1">
  <tr>
	<td>ORDER_ID </td>
	<td>AMOUNT </td>
	<td>INDATE </td>
	<td>ORDER_STAT </td>
	<td>SHIP_NAME </td>
	<td>SHIP_ADDRESS </td>
	<td>SHIP_CITY </td>
	<td>SHIP_COUNTRY </td>
	<td>CUST_ID </td>
	<td>TRACKING_ID </td>

  </tr>
<?php
$stmt = oci_parse($conn,'select * from ORDERS');
$r = oci_execute($stmt);
$i=0;
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
     echo '<td>'.$result['ORDER_ID'].'</td>';
     echo '<td>'.$result['AMOUNT'].'</td>';
     echo '<td>'.$result['INDATE'].'</td>';
     echo '<td>'.$result['ORDER_STAT'].'</td>';
     echo '<td>'.$result['SHIP_NAME'].'</td>';
     echo '<td>'.$result['SHIP_ADDRESS'].'</td>';
     echo '<td>'.$result['SHIP_CITY'].'</td>';
     echo '<td>'.$result['SHIP_COUNTRY'].'</td>';
     echo '<td>'.$result['CUST_ID'].'</td>';
     echo '<td>'.$result['TRACKING_ID'].'</td>';

	 echo '<tr>';
}
?>
</table>


<!----TRACKING--->
<h1>TRACKING</h1>
<table border="1">
  <tr>
	<td>TRACKING_ID </td>
	<td>TRACK_STAT </td>
	<td>ORDER_ID </td>
	<td>INDATE </td>
  </tr>
<?php
$stmt = oci_parse($conn,'select * from TRACKING');
$r = oci_execute($stmt);
$i=0;
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
     echo '<td>'.$result['TRACKING_ID'].'</td>';
     echo '<td>'.$result['TRACK_STAT'].'</td>';
     echo '<td>'.$result['ORDER_ID'].'</td>';
     echo '<td>'.$result['INDATE'].'</td>';
	 echo '<tr>';
}
?>
</table>

<!----COMMENT_TABLE--->
<h1>COMMENT_TABLE</h1>
<table border="1">
  <tr>
	<td>COM_ID </td>
	<td>CUST_ID </td>
	<td>CONTENT </td>
  </tr>
<?php
$stmt = oci_parse($conn,'select * from COMMENT_TABLE');
$r = oci_execute($stmt);
$i=0;
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
     echo '<td>'.$result['COM_ID'].'</td>';
     echo '<td>'.$result['CUST_ID'].'</td>';
     echo '<td>'.$result['CONTENT'].'</td>';
	 echo '<tr>';
}
?>
</table>

<!----BOOKS--->
<h1>BOOKS</h1>
<table border="1">
  <tr>
	<td>ISBN </td>
	<td>AUTHOR </td>
	<td>TITLE </td>
	<td>CAT_ID </td>
	<td>PRICE </td>
	<td>DESCR </td>
	<td>DIST </td>
	<td>COM_ID </td>
	<td>IMG </td>
	<td>AVAB</td>
	<td>INDATE</td>
	<td>PUBDATE</td>
	<td>QTY</td>

  </tr>
<?php
$stmt = oci_parse($conn,'select * from BOOKS');
$r = oci_execute($stmt);
$i=0;
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
	echo '<td>'.$result['ISBN'].'</td>';
	echo '<td>'.$result['AUTHOR'].'</td>';
	echo '<td>'.$result['TITLE'].'</td>';
	echo '<td>'.$result['CAT_ID'].'</td>';
	echo '<td>'.$result['PRICE'].'</td>';
	echo '<td>'.$result['DESCR'].'</td>';
	echo '<td>'.$result['DIST'].'</td>';
	echo '<td>'.$result['COM_ID'].'</td>';
	echo '<td><img src="'.$result['IMG'].'"width=250 height=200></td>';
	echo '<td>'.$result['AVAB'].'</td>';
	echo '<td>'.$result['INDATE'].'</td>';
	echo '<td>'.$result['PUBDATE'].'</td>';
	echo '<td>'.$result['QTY'].'</td>';
	echo '<tr>';
}
?>
</table>

<!----CATEGORIES--->
<h1>CATEGORIES</h1>
<table border="1">
  <tr>
	<td>CAT_ID </td>
	<td>CAT_NAME </td>

  </tr>
<?php
$stmt = oci_parse($conn,'select * from CATEGORIES');
$r = oci_execute($stmt);
$i=0;
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
	echo '<td>'.$result['CAT_ID'].'</td>';
	echo '<td>'.$result['CAT_NAME'].'</td>';
	echo '<tr>';
}
?>
</table>


<!----ADMIN_TABLE--->
<h1>ADMIN_TABLE</h1>
<table border="1">
  <tr>
	<td>USERNAME </td>
	<td>PASSWORD </td>

  </tr>
<?php
$stmt = oci_parse($conn,'select * from ADMIN_TABLE');
$r = oci_execute($stmt);
$i=0;
while( $result=oci_fetch_array($stmt) ){
	$i++;
	 echo '<tr>';
	echo '<td>'.$result['USERNAME'].'</td>';
	echo '<td>'.$result['PASSWORD'].'</td>';
	echo '<tr>';
}
?>
</table>

</body>
</html>
