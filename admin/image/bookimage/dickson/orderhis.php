<?php
session_start();

if ($_SESSION["CUST_ID"]!=null)
{
		$CUST_ID=$_SESSION["CUST_ID"];
		$NAME=$_SESSION["NAME"];
		$EMAIL=$_SESSION["EMAIL"];
		$ADDRESS=$_SESSION["ADDRESS"];
		$CITY=$_SESSION["CITY"];
		$COUNTRY=$_SESSION["COUNTRY"];
		$CUST_PW=$_SESSION["CUST_PW"];
		include_once("template.php");
        require_once("conn_fun.php");
		basetemplate_head();
		$pagestatus="acc";
		 basetemplate_fullbody($pagestatus);
}
else
{
		echo "<script language='javascript'>";
		echo " location='login.php';";
		echo "</script>";
	}



 
 
?>

			<div class="aside">
				
			<h2>Menu</h2>
			<ul>	 	 

				<li ><div class="extra-wrap"><a href="account.php"><span>Account Information</span></a></div></li>
				<li><a href="chpasswd.php"><span>Change Password</span></a></li>
				<li id="active"><a href="orderhis.php"><span>Order History</span></a></li>


			</ul>

<div class="wrapper"></div>
					</div>
					<div class="content">
						<div class="tail-middle">
			<div class="row-2">
				<div class="inside">
					<h3>Order History</h3>
                    
                    <?php 
					$sql="select * from ORDERS where CUST_ID=$CUST_ID ORDER BY INDATE DESC";
		$stmt = oci_parse($conn,$sql);
		oci_execute($stmt);
					?>
                    
                    
<table align='center 'border-bottom="1" cellpadding="0" cellspacing="0" style="width:100%;">
  <tr>
    <td  align="left" valign="top"  >Order Number</td>
    <td align="left" valign="top"  > Order Status </td>
    <td align="left" valign="top"  > Order Date </td>
    <td align="left" valign="top"  > Total Amount </td>
    <td  align="left" valign="top"  ></td>
  </tr>
 
 <?php 
 while( $result=oci_fetch_array($stmt) ){
    echo '<tr>';
    echo '<td  align="left" valign="top"  >'.$result['ORDER_ID'].'</td>';
    echo '<td  align="left" valign="top"  >'.$result['ORDER_STAT'].'</td>';
    echo '<td  align="left" valign="top"  >'.$result['INDATE'].'</td>';
   	echo ' <td align="left" valign="top"  >$'.$result['AMOUNT'].'</td>';
    echo '<td   >';
    
		echo '<button onClick="window.open(\'cust_order_details.php?order_id='.$result['ORDER_ID']. '\')">Order Details</button>';
										
	echo '</td>';
   	echo '</tr>';
	}
	
	
?>
</table>
				<!--	<table align='center 'border="1" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td>Name</td><td></td>
					</tr>
					<tr>
					    <td rowspan='5'><img src="images/book3.jpg" alt="" /></td><td>Price:</td>
					</tr>
					<tr> 
						<td>Order Date:</td>
					</tr>

					<tr>
						<td>Status : Shipped  on Jun 28, 2011</td>
					</tr>
					<tr>
						<td><a>Print Invoices</a></td>
					</tr>
					<tr>
						<td><a>View / edit order details</a> </td>
					</tr>
					</table>
					<br>
					
					<table align='center 'border="1" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td>Name</td><td></td>
					</tr>
					<tr>
					    <td rowspan='5'><img src="images/book3.jpg" alt="" /></td><td>Price:</td>
					</tr>
					<tr> 
						<td>Order Date:</td>
					</tr>

					<tr>
						<td>Status : Shipped  on Jun 28, 2011</td>
					</tr>
					<tr>
						<td><a>Print Invoices</a></td>
					</tr>
					<tr>
						<td><a>View / edit order details </a></td>
					</tr>
					</table><br>
					<table align='center 'border="1" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td>Name</td><td></td>
					</tr>
					<tr>
					    <td rowspan='5'><img src="images/book3.jpg" alt="" /></td><td>Price:</td>
					</tr>
					<tr> 
						<td>Order Date:</td>
					</tr>

					<tr>
						<td>Status : Shipped  on Jun 28, 2011</td>
					</tr>
					<tr>
						<td><a>Print Invoices</a></td>
					</tr>
					<tr>
						<td><a>View / edit order details </a></td>
					</tr>
					</table>-->
				</div>
			</div>
            
		</div>

					</div>
				
<?php
footer();
?>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>