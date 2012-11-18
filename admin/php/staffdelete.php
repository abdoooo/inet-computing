<?php 
include('../connection/connect.php');

//$query = 'create table ADMIN (ADMIN_ID number primary key, USERNAME varchar2(100), PASSWORD varchar2(100))';
//$query ='insert into ADMIN(ADMIN_ID, USERNAME, PASSWORD) values(0, \'thomas\', \'thomas\')';
//$query = 'delete from ADMIN where ADMIN_ID = 0';
//$query = 'DROP TABLE ADMIN';
//$stmt = oci_parse($conn, $query);
//oci_execute($stmt);

/*$stmt = oci_parse($conn, "SELECT * FROM ADMIN");
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
}*/

for ($i = 1000; $i < 1010; $i++) {

$QTY = rand(100, 150);
$price = 210 * $QTY;
	$query ='insert into ORDERS(ORDER_ID, ISBN, ITEM_PRICE, QTY) values('. $i .', 9781449309053, \''.$price.'\', \''.$QTY.'\')';
	$stmt = oci_parse($conn, $query);
	oci_execute($stmt);
}
?>