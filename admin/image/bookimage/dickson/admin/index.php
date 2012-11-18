<?php 
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- #BeginTemplate "/Templates/template_admin.dwt.php" --><!-- DW6 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Book Shop</title>

<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="calendar_db.js"></script>
<link rel="stylesheet" href="calendar.css">

<style type="text/css">
body,td,th {
	color: #FFF;
}
body {
	background-image: url(image/bg_adminbg.png);
}
</style>
</head>

<link href="css/index.css" rel="stylesheet" type="text/css" />

<body>
<table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="100" colspan="2"><img src="image/Banner.png" alt="Book Shop" width="1024" height="100" border="0" /></td>
  </tr>
  <tr>
    <td height="50" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="200" rowspan="2" align="center" valign="top"><p><a href="index.php"><img src="image/btnhome.png" alt="Homepage" width="150" height="40" border="0" /></a></p>
    <p><a href="book.php"><img src="image/btnbook.png" alt="Book" width="150" height="40" border="0" /></a></p>
    <p><a href="adminreportmonthly.php"><img src="image/btnreport.png" alt="Report" width="150" height="40" border="0" /></a></p></td>
    <td width="800" align="right">
	<?php if(isset($_SESSION['USERNAME']))	{ ?>
	<form id="form2" name="form2" method="post" action="php/adminlogout.php">
    <input type="submit" name="btnlogout" id="btnlogout" value="Logout" />
    </form>
    <?php } ?>
    </td>
  </tr>
  <tr>
    <td width="800" valign="top">
	<!-- #BeginEditable "Content" -->

    <?php if (isset($_SESSION["USERNAME"])) {  
	echo "<p class=\"content\">";
		echo "Welcome! ".$_SESSION['username'];
		echo "</p>";
	} else {
    ?>
    <form id="form3" name="form3" method="post" action="php/adminchklogin.php">
	<table width="500" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td colspan="4" bgcolor="#999999" class="Title">Administration</td>
	    </tr>
	  <tr>
	    <td width="10" bgcolor="#999999">&nbsp;</td>
	    <td width="100" bgcolor="#999999">Username</td>
	    <td align="right" bgcolor="#999999"><input type="text" name="txtusername" id="txtusername" /></td>
	    <td width="10" align="right" bgcolor="#999999">&nbsp;</td>
	    </tr>
	  <tr>
	    <td width="10" bgcolor="#999999">&nbsp;</td>
	    <td width="100" bgcolor="#999999">Password</td>
	    <td align="right" bgcolor="#999999"><input type="password" name="txtpass" id="txtpass" /></td>
	    <td width="10" align="right" bgcolor="#999999">&nbsp;</td>
	    </tr>
	  <tr>
	    <td width="10" align="right" bgcolor="#999999">&nbsp;</td>
	    <td align="right" bgcolor="#999999">&nbsp;</td>
	    <td align="right" bgcolor="#999999"><input type="submit" name="btnlogin" id="btnlogin" value="Login" /></td>
	    <td width="10" align="right" bgcolor="#999999">&nbsp;</td>
	    </tr>
	  </table>
      </form>
    <?php }?>
	<!-- #EndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- #EndTemplate --></html>