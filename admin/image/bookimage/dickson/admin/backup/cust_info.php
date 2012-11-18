<?php
session_start();
require_once("conn_fun.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUSTOMERS info</title>
</head>

<body>

<?php
if ($_SESSION["CUST_ID"]!=null){
		$CUST_ID=$_SESSION["CUST_ID"];
		$NAME=$_SESSION["NAME"];
		$EMAIL=$_SESSION["EMAIL"];
		$ADDRESS=$_SESSION["ADDRESS"];
		$CITY=$_SESSION["CITY"];
		$COUNTRY=$_SESSION["COUNTRY"];
		$CUST_PW=$_SESSION["CUST_PW"];
		//echo '<a href="cust_logout.php">logout</a><p>';
		echo '<form><input type="button" value="Logout" class="button" onClick="{location.href=\'cust_logout.php\'}" /></form>';
?>


<form method="post" action="cust_progress.php?progressID=cust_edit" id="form">
<input type="hidden" value=<?php echo $CUST_ID; ?> name="CUST_ID" />
<table width="80%" border="0">

    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">Name</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><label>
        <input name="NAME" type="text" id="NAME" size="30" value=<?php echo $NAME; ?> >
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#999999">Email</td>
      <td align="left" valign="top" bgcolor="#999999">
      <input name="EMAIL" type="text" id="EMAIL" size="30" value=<?php echo $EMAIL; ?> readonly="readonly" disabled ="true"></td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">Password</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><input name="CUST_PW" type="password" id="CUST_PW" size="30" value=<?php echo $CUST_PW; ?> ></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top" bgcolor="#999999">Personal Info.</td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">Address</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><label>
        <textarea name="ADDRESS" cols="100" id="ADDRESS"><?php echo $ADDRESS; ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">City</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><textarea name="CITY" cols="100" id="CITY"><?php echo $CITY; ?></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#999999">Country</td>
      <td align="left" valign="top" bgcolor="#999999"><textarea name="COUNTRY" cols="100" id="COUNTRY"><?php echo $COUNTRY; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top" bgcolor="#999999">
      <input  type="submit" value="Edit"></td>
    </tr>

</table>

</form>
<!------------------------================================***************************************====================================--------->
<form method="post" action="cust_progress.php?progressID=cust_del" id="form">
<input type="hidden" value=<?php echo $CUST_ID; ?> name="CUST_ID" />
<table width="80%" border="0">
  <tr>
    <td width="600" align="left" valign="top" bgcolor="#999999"><input  type="submit" value="Delete account"></td>
  </tr>
</table>
</form>

<!------------------------================================***************************************====================================--------->

<?php

  		$sql="select * from ORDERS where CUST_ID=$CUST_ID";
		$stmt = oci_parse($conn,$sql);
		$r = oci_execute($stmt);
?>

<table width="80%" border="0">
  <tr>
    <td colspan="5" align="left" valign="top" bgcolor="#999999">Order Info</td>
  </tr>
  <tr>
    <td width="58" align="left" valign="top" bgcolor="#999999">Order ID</td>
    <td width="102" align="left" valign="top" bgcolor="#999999"> ORDER_STAT </td>
    <td width="101" align="left" valign="top" bgcolor="#999999"> INDATE </td>
    <td width="142" align="left" valign="top" bgcolor="#999999"> AMOUNT </td>
    <td width="897" align="left" valign="top" bgcolor="#999999"></td>
  </tr>
  <?php 
  
  while( $result=oci_fetch_array($stmt) ){
    echo '<tr>';
    echo '<td  align="left" valign="top" bgcolor="#999999">'.$result['ORDER_ID'].'</td>';
    echo '<td  align="left" valign="top" bgcolor="#999999">'.$result['ORDER_STAT'].'</td>';
    echo '<td  align="left" valign="top" bgcolor="#999999">'.$result['INDATE'].'</td>';
   	echo ' <td align="left" valign="top" bgcolor="#999999">$'.$result['AMOUNT'].'</td>';
    echo '<td  bgcolor="#999999">';
	if ($result['ORDER_STAT']!='CLOSE'){
		echo '<button onClick="window.open(\'#\')">Details</button>';
		echo '<button onClick="window.open(\'#\')">Tracking Oreder</button';
	}
	echo '</td>';
   echo '</tr>';}
  ?>
</table>
<p><br>
</p>
<?php
	}else{
		echo 'login ERR';
		
	}
?>
</body>
</html>
