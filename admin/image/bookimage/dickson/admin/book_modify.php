<?php
session_start();
ob_start();

  	require_once("connection/connect.php");
	include("php/define.php");
	
	$isbn = $_GET['isbn'];
	
	$searchstmt = oci_parse($conn,'select * from BOOKS WHERE ISBN = \''.$isbn.'\'');
	oci_execute($searchstmt);
	$rowsearch = oci_fetch_array($searchstmt, OCI_ASSOC);
	
	$resultstmt = oci_parse($conn,'select * from CATEGORIES order by CAT_ID');
	$r = oci_execute($resultstmt);
	$i=0;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_admin.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
	<!-- InstanceBeginEditable name="Content" -->
    <?php if (isset($_SESSION["USERNAME"])) { ?>
     <p class="subtitle" align="left">MODIFY BOOK DATA</p>
     <form id="form3" name="form3" method="post"  enctype="multipart/form-data" action="php/bookmodify.php">
      <table width="80%" border="0">
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">ISBN</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtisbn" type="text" id="txtisbn" value="<?php echo $rowsearch['ISBN']?>" size="30" readonly="readonly" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">AUTHOR</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtauthor" type="text" id="txtauthor" size="30" value="<?php echo $rowsearch['AUTHOR']?>" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">TITLE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txttitle" type="text" id="txttitle" size="30"  value="<?php echo $rowsearch['TITLE']?>" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">CATEGORY</td>
                <td width="400" align="left" valign="top" bgcolor="#999999">
                <select name="txtcategory" id="txtcategory">
                 <?php while( $result=oci_fetch_array($resultstmt) ){ ?>
                  <option value="<?php echo $result['CAT_ID']?>" 
				  <?php if ($result['CAT_ID'] == $rowsearch['CAT_ID']) {?> selected="selected" <?php  } ?>>
				  <?php echo $result['CAT_NAME'] ?></option>
                  <?php } ?>
                </select></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">PRICE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtprice" type="text" id="txtprice" size="30" value="<?php echo $rowsearch['PRICE']?>" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">DESCRIPTION</td>
                <td width="400" align="left" valign="top" bgcolor="#999999">
                <label>
                  <textarea name="txtdesc" id="txtdesc" cols="45" rows="5" ><?php echo $rowsearch['DESCR']?></textarea>
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">DISCOUNT</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"> <select name="txtdisc" id="txtdisc">
                      <option value="100"  <?php if ($rowsearch['DIST'] == 100) {?> selected="selected" <?php  } ?>>100%</option>
                      <option value="90"  <?php if ($rowsearch['DIST'] == 90) {?> selected="selected" <?php  } ?>>90%</option>
                      <option value="80"  <?php if ($rowsearch['DIST'] == 80) {?> selected="selected" <?php  } ?>>80%</option>
                      <option value="70"  <?php if ($rowsearch['DIST'] == 70) {?> selected="selected" <?php  } ?>>70%</option>
                    </select></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">AVAILABLE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999">
                <select name="txtava" id="txtava">
                <?php if ($rowsearch['AVAB'] == "N") {?> 
                  <option value="Y">YES</option>
                  <option value="N" selected="selected" >NO</option>
                  <?php } else { ?>
                  <option value="Y" selected="selected" >YES</option>
                  <option value="N">NO</option>
                  
                  <?php }?>
                </select></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">STOCK of BOOKs</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtqty" type="text" id="txtqty" value="<?php echo $rowsearch['QTY']?>" size="30" <?php echo $rowsearch['QTY']?> />
                </label></td>
              </tr>
            </table>
    <p>
              <input type="submit" name="Submit" id="Submit" value="Submit" />
             <input type="reset" name="btnreset" id="btnreset" value="Reset" />
        </p>
      </form>
         <script language="JavaScript" type="text/javascript">
		//You should create the validator only after the definition of the HTML form
		var frmvalidator  = new Validator("form3");

 		frmvalidator.EnableMsgsTogether();
		frmvalidator.addValidation("txtisbn","req","Please enter the BOOK ISBN");
		frmvalidator.addValidation("txtisbn","maxlen=13", "ISBN: Max length is 13");
		
  		frmvalidator.addValidation("txtauthor","req","Please enter the BOOK AUTHOR");
  		frmvalidator.addValidation("txtauthor","maxlen=100", "AUTHOR: Max length is 100");
  		//frmvalidator.addValidation("txtauthor","alpha_s","First Name: Alphabetic chars and space only");
  
  		frmvalidator.addValidation("txttitle","req","Please enter the BOOK TITLE");
  		frmvalidator.addValidation("txttitle","maxlen=100","TITLE: Max length is 100");
  		//frmvalidator.addValidation("txttitle","alpha","Last Name: Alphabetic chars only");
 		
		frmvalidator.addValidation("txtprice","req", "Please enter the BOOK PRICE");
  		frmvalidator.addValidation("txtprice","maxlen= 10", "PRICE: Max length is 10");
		frmvalidator.addValidation("txtprice","numeric", "Numeric Only");		
		
		frmvalidator.addValidation("txtdesc","req", "Please enter the BOOK DESCRIPTION");
		frmvalidator.addValidation("txtdesc","maxlen= 1000", "DESCRIPTION: Max length is 1000");
		//frmvalidator.addValidation("txtdesc","numeric", "Numeric Only");
			
		frmvalidator.addValidation("txtqty","req", "Please enter the QUANTITY in STOCK");
		frmvalidator.addValidation("txtqty","maxlen=4", "STOCK of BOOKs: Max length is 4");
		frmvalidator.addValidation("txtqty","numeric", "Numeric Only");
		
		</script>
             <?php } else {
echo "<script>alert('Warning!!! Warning!!! Warning!!! You have no permission!!!')</script>"; ?>
<meta http-equiv="REFRESH" Content="0;url=../index.php">
<?php } ?>
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>