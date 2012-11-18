<?php 
session_start();
ob_start();

require_once("connection/connect.php");
	
$namestmt = oci_parse($conn, 'select * from CATEGORIES');
$namer = oci_execute($namestmt);
$stmt = oci_parse($conn, 'select * from CATEGORIES');
$r = oci_execute($stmt);

$bookstmt = oci_parse($conn, 'select * from BOOKS');
$bookr = oci_execute($bookstmt);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_admin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Book Shop</title>

<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="calendar_db.js"></script>
<link rel="stylesheet" href="calendar.css">

<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

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
	<!-- InstanceBeginEditable name="Content" -->
    <?php if (isset($_SESSION["USERNAME"])) { ?>
    <a href="book_add.php"><img src="image/btnbookadd.png" alt="Book Management" width="200" height="35" border="0" /></a><a href="book.php"><img src="image/btnbooksearch.png" alt="Book Searching" width="200" height="35" border="0" /></a>
    <a href="book_cat.php"><img src="image/btnbookcat.png" alt="Category Management" width="200" height="35" border="0" /></a>
    <br /><br /><br />
    <p class="subtitle" align="left">ADD CATEGORIES</p>
    <form id="form1" name="form1" method="post" action="php/bookaddcategory.php" >
      <table width="80%" border="0">
        <tr>
          <td width="200" align="left" valign="top" bgcolor="#999999">CATEGORY</td>
          <td width="400" align="left" valign="top" bgcolor="#999999"><label>
            <input name="txtcat" type="text" id="txtcat" size="30" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" bgcolor="#999999"><label>
            <input type="submit" name="btnadd" id="btnadd" value="Add Category" />
          </label></td>
        </tr>
      </table>
    </form>
    <br />
    <p class="subtitle" align="left">MODIFY CATEGORIES</p>
    <form id="form10" name="form10" method="post" action="php/bookmodifycategory.php" >
      <table width="80%" border="0">
        <tr>
          <td width="200" align="left" valign="top" bgcolor="#999999">CATEGORY</td>
          <td width="400" align="left" valign="top" bgcolor="#999999"><select name="cat_id" id="cat_id">
            <?php while( $result=oci_fetch_array($stmt) ){ ?>
            <option value="<?php echo $result['CAT_ID'] ?>" selected="selected"><?php echo $result['CAT_NAME'] ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td colspan="1" align="left" valign="top" bgcolor="#999999">NEW CATEGORY NAME</td>
          <td width="200" align="left" valign="top" bgcolor="#999999"><label>
            <input name="txtcategory" type="text" id="txtcategory" size="30" />
          </label></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" bgcolor="#999999"><label>
            <input type="submit" name="btnadd" id="btnadd" value="Modify Category" />
          </label></td>
        </tr>
      </table>
    </form>
    <br />
    <p class="subtitle" align="left">DELETE CATEGORIES</p>
    <form id="form" name="form2" method="post" action="php/bookdeletecategory.php" >
      <table width="80%" border="0">
        <tr>
          <td width="200" align="left" valign="top" bgcolor="#999999">CATEGORY</td>
          <td width="400" align="left" valign="top" bgcolor="#999999"><select name="txtcat" id="txtcat">
            <?php $stmt = oci_parse($conn, 'select * from CATEGORIES');
$r = oci_execute($stmt);
while( $result2=oci_fetch_array($stmt) ){ ?>
            <option value="<?php echo $result2['CAT_NAME'] ?>" selected="selected"><?php echo $result2['CAT_NAME'] ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" bgcolor="#999999"><label>
            <input type="submit" name="btndel" id="btndel" value="Delete Category" />
          </label></td>
        </tr>
      </table>
    </form>
    <p class="subtitle" align="left"></p>
                     <?php } else {
echo "<script>alert('Warning!!! Warning!!! Warning!!! You have no permission!!!')</script>"; ?>
<meta http-equiv="REFRESH" Content="0;url=index.php">
<?php } ?>
	
    
     <script language="JavaScript" type="text/javascript">
	 var frmvalidator  = new Validator("form1");

 		frmvalidator.EnableMsgsTogether();
		frmvalidator.addValidation("txtcat","req","Please enter the CATEGORY NAME");
		frmvalidator.addValidation("txtcat","maxlen=20", "ISBN: Max length is 20");
		
		var frmvalidator  = new Validator("form10");

 		frmvalidator.EnableMsgsTogether();
		frmvalidator.addValidation("txtcategory","req","Please enter the CATEGORY NAME");
		frmvalidator.addValidation("txtcategory","maxlen=20", "ISBN: Max length is 20");
		
		
		</script>
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>