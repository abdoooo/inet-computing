<?php

session_start();
require_once("conn_fun.php");

if ($_SESSION["CUST_ID"]==null){

		echo "<script language='javascript'>";
		echo " location='login.php';";
		echo "</script>";
	}
else{
	
include_once("template.php");
basetemplate_head();
$pagestatus="acc";
tempforinvoice();
	
$CUST_ID=$_SESSION["CUST_ID"];	

$ORDER_ID=$_GET["order_id"];
$sql='select * from ORDERS where ORDER_ID='.$ORDER_ID;
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);

$result=oci_fetch_array($stmt);

$AMOUNT=$result["AMOUNT"];
$INDATE=$result["INDATE"];
$ORDER_STAT=$result["ORDER_STAT"];
$SHIP_NAME=$result["SHIP_NAME"];
$SHIP_ADDRESS =$result["SHIP_ADDRESS"];
$SHIP_CITY=$result["SHIP_CITY"];
$SHIP_COUNTRY=$result["SHIP_COUNTRY"];

?>
<html>

<script type="text/javascript" src="js/jquery-1.7.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#ShowOrderTracking").click(function(){
		$("#status").html('<img src="img/loader.gif" align="absmiddle">&nbsp;&nbsp;Loading...');
		var ORDER_ID = $("#orderID").val();
		
				
		$.ajax({  
			type: "GET",
			url: "ajax/cust_order_tracking_ajax.php",
			data: "ORDER_ID="+ORDER_ID,
			
			success: function(msg){
				$('#status').html(msg);
			} 
  		});
	});
 
 });
</script>

<!--------------------------------order details---------------------------------------------------->
<table width="80%"  border="1">
  <tr>
    <td colspan="2" align="left" valign="top"  ><h3>Order Details</h3></td>
  </tr>
  <tr>
    <td align="left" valign="top"  >Order Number</td>
    <td align="left" valign="top"  ><?php echo $ORDER_ID;?></td>
  </tr>
  <tr>
    <td width="214" align="left" valign="top"  >Order status</td>
    <td width="576" align="left" valign="top"  ><?php echo $ORDER_STAT;?></td>
  </tr>
  <tr>
    <td width="214" align="left" valign="top"  >Order Date</td>
    <td width="576" align="left" valign="top"  ><?php echo $INDATE;?></td>
  </tr>
  <tr>
    <td width="214" align="left" valign="top"  >Customer Name</td>
    <td width="576" align="left" valign="top"  ><?php echo $SHIP_NAME;?></td>
  </tr>
  <tr>
    <td align="left" valign="top"  >Delivery Address</td>
    <td align="left" valign="top"  ><?php echo $SHIP_ADDRESS;?></td>
  </tr>
</table>
<br>


<!--------------------------------order list---------------------------------------------------->
<table width="80%"  border="1">
  <tr>
    <td colspan="6" align="left" valign="top"  ><h3>Order List</h3></td>
  </tr>
<?php 
$sql2='select * from ORDER_ITEMS where ORDER_ID='.$ORDER_ID;
$stmt2 = oci_parse($conn, $sql2);
oci_execute($stmt2);


	echo '<tr>';
	echo ' <td width="174" align="left" valign="top"  >ISBN</td>';
	echo '<td width="176" align="left" valign="top"  >Title</td>';
	echo '<td width="159" align="left" valign="top"  >Price</td>';
	echo '<td width="273" align="left" valign="top"  >Quantity</td>';
	echo '<td width="273" align="left" valign="top"  >Amount</td>';
	echo '</tr>';

	while( $result2=oci_fetch_array($stmt2) ){
		
		$select_BOOK='select * from BOOKS where ISBN='.$result2["ISBN"];
		$BOOK_stmt = oci_parse($conn, $select_BOOK);
		oci_execute($BOOK_stmt);
		while( $BOOK_result=oci_fetch_array($BOOK_stmt) ){
			$book_TITLE=$BOOK_result["TITLE"];
		}
		
		echo '<tr>';
		echo ' <td align="left" valign="top"  >'. $result2["ISBN"].'</td>';
		echo ' <td align="left" valign="top"  >'.$book_TITLE.'</td>';
		echo ' <td align="left" valign="top"  >'.$result2["ITEM_PRICE"] .'</td>';
		echo ' <td align="left" valign="top"  >'.$result2["QTY"] .'</td>';
		echo ' <td align="left" valign="top"  >'.$result2["ITEM_PRICE"]*$result2["QTY"].'</td>';
		$total+=($result2["ITEM_PRICE"]*$result2["QTY"]);
		echo ' </tr>';
	}
	
	echo ' <tr>';
	echo '<td colspan="5" align="left" valign="top"  >Total Amount: <b>'.$total.'</b></td>';
	echo '</tr>';

?>

</table>
<!--------------------------------order tracking---------------------------------------------------->
<br>
<form>
<input type="button" value="Show Order Tracking" id="ShowOrderTracking"/>
<input type="button" value="Print Invoices" onClick="window.print()"/>
<input type="hidden" value=<?php echo $ORDER_ID ?> id="orderID"  />
</form>

<span id="status"/>
<div class="wrapper"></div>

<?php                 
footer(); 

oci_close ($conn);
}
?>