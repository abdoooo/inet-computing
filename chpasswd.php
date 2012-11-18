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

<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
		$("#changpw").validate({
		rules: {
			newpassword: {
				required: true,
				minlength: 5 },
			newcpassword: {
				required: true,
				minlength: 5,
				equalTo: "#newpassword"},
		},
		messages: {
			newpassword: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"},
			newcpassword: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"},


			
	  }
	});
	
});
</script>
<div class="aside">
	<h2>Menu</h2>
			<ul>	 	 
				<li ><div class="extra-wrap"><a href="account.php"><span>Account Information</span></a></div></li>
				<li id="active"><a href="chpasswd.php"><span>Change Password</span></a></li>
				<li ><a href="orderhis.php"><span>Order History</span></a></li>
			</ul>
						
<div class="wrapper"></div>
</div>
<div class="content">
	<div class="tail-middle">
			<div class="row-2">
				<div class="inside">
					<h3>Change Password</h3>
					<form id="changpw" method="POST" action="cust_progress.php?progressID=chang_pw">
					<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<input type="hidden" value=<?php echo $CUST_ID;?> name="CUST_ID" />
					<tr>
					<td>Old Password:</td><td> <input type="password" name="oldpassword"/></td>
					</tr>
					<tr>
					<td>New Password: </td><td><input type="password" name="newpassword" id="newpassword"/></td>
					</tr>
					<tr>
					<td>Re-confimr New Password: </td><td><input type="password" name="newcpassword" id="newcpassword"/></td>
					</tr>
					<tr>
						<td> <input type="Submit" value="Submit">
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