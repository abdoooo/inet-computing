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

				<li id="active"><div class="extra-wrap"><a href="account.php"><span>Account Information</span></a></div></li>
				<li><a href="chpasswd.php"><span>Change Password</span></a></li>
				<li><a href="orderhis.php"><span>Order History</span></a></li>
	

			</ul>

						
<div class="wrapper"></div>
					</div>
					<div class="content">
						<div class="tail-middle">
			<div class="row-2">
				<div class="inside">
					<h3>Account Information</h3>
					
<form method="post" action="cust_progress.php?progressID=cust_edit" id="form">
<input type="hidden" value=<?php echo $CUST_ID; ?> name="CUST_ID" />

<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
 <tr>
      <td width="200" align="left" valign="top"  >Name</td>
      <td width="400" align="left" valign="top"  >
       <?php echo $NAME; ?>
		<!-- readonly="readonly" disabled ="true"-->
     </td>
    </tr>
    <tr>
      <td align="left" valign="top"  >Email</td>
      <td align="left" valign="top"  >
      <input name="email" type="text" id="email" size="30" value=<?php echo $EMAIL; ?> ></td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top"  >Address</td>
      <td width="400" align="left" valign="top"  ><label>
        <textarea name="address" cols="100" id="address"><?php echo $ADDRESS; ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top"  >City</td>
      <td width="400" align="left" valign="top"  ><textarea name="city" cols="100" id="city"><?php echo $CITY; ?></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top"  >Country</td>
      <td align="left" valign="top"  ><textarea name="country" cols="100" id="country"><?php echo $COUNTRY; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top"  >
      <input  type="submit" value="Edit"></td>
    </tr>

</table>

</form>
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