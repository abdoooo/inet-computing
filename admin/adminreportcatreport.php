<?php 
session_start();
ob_start();

require_once("connection/connect.php"); 

$year = $_POST['lstyear'];
$cat = $_POST['lstcat'];

if ($year == ""){
	$year = '11';
} 
if ($cat == ""){
	$cat = '0';	
}
$resultstmt = oci_parse($conn,'select * from CATEGORIES order by CAT_ID');
	$r = oci_execute($resultstmt);
	$i=0;


echo '  <script type="text/javascript"> var myData = new Array(';
$bookstmt = oci_parse($conn,'select * from BOOKS where CAT_ID = \''.$cat.'\' order by CAT_ID');
	$r = oci_execute($bookstmt);
	$i=0;
	
	while( $bookresult=oci_fetch_array($bookstmt) ){
	$i++;
	
		$orderstmt = oci_parse($conn,'select * from ORDER_ITEMS where ISBN = \''.$bookresult['ISBN'].'\' ');
		$r = oci_execute($orderstmt);
		$j=0;
			while( $orderresult=oci_fetch_array($orderstmt) ){
			$j++;
			//echo $orderresult['ORDER_ID'] . '<br />';
				$amountstmt = oci_parse($conn,'select * from ORDERS where ORDER_ID = \''.$orderresult['ORDER_ID'].'\' and INDATE like \'%-'.$year.'\' ');
				$r = oci_execute($amountstmt);
				$x=0;
				while( $amountresult=oci_fetch_array($amountstmt) ){
				$x++;
				$amount += $amountresult['AMOUNT'];
				//echo $amount . '<br />';
				
			}
		}
	
	//echo $bookresult['TITLE'] . ': ';
	if ($amount == ""){
			$amount = 0;
	}
	
	//echo $amount . '<br />';
$array .= '[\''.substr($bookresult['TITLE'] , 0, 7).'\',  '.$amount .'],';
//echo '<script type="text/javascript">  var myData = new Array(['. $bookresult['TITLE'] .',  '.$amount .']');';

}
echo substr($array, 0, -1);
echo ');';



echo '  var colors = [';
	$bookstmt = oci_parse($conn,'select * from BOOKS where CAT_ID = \''.$cat.'\' order by CAT_ID');
	$r = oci_execute($bookstmt);
	$i=0;
	while( $bookresult=oci_fetch_array($bookstmt) ){
	$i++;
	$color .= '\'#CE0000\''.',';
	}
echo substr($color, 0, -1);	
echo ']';
echo '</script>';
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
         <label>Category:
          <select name="lstcat" id="lstcat">
                 <?php while( $result=oci_fetch_array($resultstmt) ){ ?>
                  <option value="<?php echo $result['CAT_ID']?>" 
				  <?php if ($result['CAT_ID'] == $rowsearch['CAT_ID']) {?> selected="selected" <?php  } ?>>
				  <?php echo $result['CAT_NAME'] ?></option>
                  <?php } ?>
                </select>
        </label>
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
	var myChart = new JSChart('graph', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setDataArray(myData);
	myChart.setAxisColor('#9D9F9D');
	myChart.setAxisWidth(1);
	myChart.setAxisNameX('Year <?php echo '20'.$lstyear ?>');
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