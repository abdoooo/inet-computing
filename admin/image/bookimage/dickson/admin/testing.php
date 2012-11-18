<?php 
require_once("connection/connect.php"); 

$year = $_POST['lstyear'];
$mon = $_POST['lstmon'];

if ($year == ""){
	$year = '11';
} 
if ($mon == ""){
	$mon = 'JAN';	
}

$janstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%JAN-'.$year.'\'');
oci_execute($janstmt);
$i=0;
while( $janresult=oci_fetch_array($janstmt) ){
	$i++;
	$janamount +=  $janresult['AMOUNT'];
}

$febstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%FEB-'.$year.'\'');
oci_execute($febstmt);
$i=0;
while( $febresult=oci_fetch_array($febstmt) ){
	$i++;
	$febamount +=  $febresult['AMOUNT'];
}

$marstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%MAR-'.$year.'\'');
oci_execute($marstmt);
$i=0;
while( $marresult=oci_fetch_array($marstmt) ){
	$i++;
	$maramount +=  $marresult['AMOUNT'];
}

$aprstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%APR-'.$year.'\'');
oci_execute($aprstmt);
$i=0;
while( $aprresult=oci_fetch_array($aprstmt) ){
	$i++;
	$apramount +=  $aprresult['AMOUNT'];
}

$maystmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%MAY-'.$year.'\'');
oci_execute($maystmt);
$i=0;
while( $mayresult=oci_fetch_array($maystmt) ){
	$i++;
	$mayamount +=  $mayresult['AMOUNT'];
}

$junstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%JUN-'.$year.'\'');
oci_execute($junstmt);
$i=0;
while( $junresult=oci_fetch_array($junstmt) ){
	$i++;
	$junamount +=  $junresult['AMOUNT'];
}

$julstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%JUL-'.$year.'\'');
oci_execute($julstmt);
$i=0;
while( $julresult=oci_fetch_array($julstmt) ){
	$i++;
	$julamount +=  $julresult['AMOUNT'];
}

$augstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%AUG-'.$year.'\'');
oci_execute($augstmt);
$i=0;
while( $augresult=oci_fetch_array($augstmt) ){
	$i++;
	$augamount +=  $augresult['AMOUNT'];
}

$sepstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%SEP-'.$year.'\'');
oci_execute($sepstmt);
$i=0;
while( $sepresult=oci_fetch_array($sepstmt) ){
	$i++;
	$sepamount +=  $sepresult['AMOUNT'];
}

$octstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%OCT-'.$year.'\'');
oci_execute($octstmt);
$i=0;
while( $octresult=oci_fetch_array($octstmt) ){
	$i++;
	$octamount +=  $octresult['AMOUNT'];
}

$novstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%NOV-'.$year.'\'');
oci_execute($novstmt);
$i=0;
while( $novresult=oci_fetch_array($novstmt) ){
	$i++;
	$novamount +=  $novresult['AMOUNT'];
}

$decstmt = oci_parse($conn,'select * from ORDERS where INDATE like \'%DEC-'.$year.'\'');
oci_execute($decstmt);
$i=0;
while( $decresult=oci_fetch_array($decstmt) ){
	$i++;
	$decamount +=  $decresult['AMOUNT'];
}

if ($janamount == ""){
	$janamount = 0;
}
if ($febamount == ""){
	$febamount = 0;
}
if ($maramount == ""){
	$maramount = 0;
}
if ($apramount == ""){
	$apramount = 0;
}
if ($mayamount == ""){
	$mayamount = 0;
}
if ($junamount == ""){
	$junamount = 0;
}
if ($julamount == ""){
	$julamount = 0;
}
if ($augamount == ""){
	$augamount = 0;
}
if ($sepamount == ""){
	$sepamount = 0;
}
if ($octamount == ""){
	$octamount = 0;
}
if ($novamount == ""){
	$novamount = 0;
}
if ($decamount == ""){
	$decamount = 0;
}

/*echo 'JAN: '.$janamount. '<br />';
echo 'FEB: '.$febamount. '<br />';
echo 'MAR: '.$maramount. '<br />';
echo 'APR: '.$apramount. '<br />';
echo 'MAY: '.$mayamount. '<br />';
echo 'JUN: '.$junamount. '<br />';
echo 'JUL: '.$julamount. '<br />';
echo 'AUG: '.$augamount. '<br />';
echo 'SEP: '.$sepamount. '<br />';
echo 'OCT: '.$octamount. '<br />';
echo 'NOV: '.$novamount. '<br />';
echo 'DEC: '.$decamount. '<br />';
*/


?>

<html>
<head>

<title>Monthly Report</title>

<script type="text/javascript" src="sources/jscharts.js"></script>

</head>
<body>

<div id="graph">Loading graph...</div>
<br />
<font color="black"> <form id="form3" name="form3" method="post" action="">
        <label>Year:
          <select name="lstyear" id="lstyear">
            <option value="11" selected="selected">2011</option>
            <option value="12">2012</option>
            <option value="13">2013</option>
            <option value="14">2014</option>
          </select>
        </label>
        <input type="submit" name="btnSearch" id="btnSearch" value="Search" />
      </form>
      </font>
<script type="text/javascript">
	
	var myData = new Array(['Jan',  <?php echo $janamount?>], ['Feb',  <?php echo $febamount?>], ['Mar',  <?php echo $maramount?>], ['Apr',  <?php echo $apramount?>], ['May', <?php echo $mayamount?>], ['Jun', <?php echo $junamount?>], ['Jul', <?php echo $julamount?>], ['Aug', <?php echo $augamount?>], ['Sep', <?php echo $sepamount?>], ['Oct', <?php echo $octamount?>], ['Nov', <?php echo $novamount?>], ['Dec', <?php echo $decamount?>]);
	var colors = ['#CE0000', '#EF2323', '#D20202', '#A70000', '#850000', '#740000', '#530000', '#850000', '#B00000', '#9C0404', '#CE0000', '#BA0000'];
	var myChart = new JSChart('graph', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setDataArray(myData);
	myChart.setAxisColor('#9D9F9D');
	myChart.setAxisWidth(1);
	myChart.setAxisNameX('Months');
	myChart.setAxisNameY('Values');
	myChart.setAxisNameColor('#655D5D');
	myChart.setAxisNameFontSize(9);
	myChart.setAxisPaddingLeft(50);
	myChart.setAxisValuesDecimals(1);
	myChart.setAxisValuesColor('#9C1919');
	myChart.setTextPaddingLeft(0);
	myChart.setBarValuesColor('#9C1919');
	myChart.setBarBorderWidth(0);
	myChart.setTitleColor('#8C8382');
	myChart.setGridColor('#5D5F5D');
	myChart.draw();
	
</script>

</body>
</html>