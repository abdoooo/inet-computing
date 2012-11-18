<?php
  	require_once("php/connection/connect.php");
	include("php/php/define.php");
	
	$isbn = $_POST['isbn'];
	
	$searchstmt = oci_parse($conn,'select * from BOOKS WHERE ISBN = \''.$isbn.'\'');
	$searchr = oci_execute($searchstmt);
	$rowsearch = oci_fetch_array($searchr);
	
	
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
     <form id="form3" name="form3" method="post"  enctype="multipart/form-data" action="php/php/book_modify.php">
      <table width="80%" border="0">
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">ISBN</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtisbn" type="text" id="txtisbn" size="30" value="<?php echo $rowsearch['ISBN'] ?>" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">AUTHOR</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtauthor" type="text" id="txtauthor" size="30" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">TITLE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txttitle" type="text" id="txttitle" size="30" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">CATEGORY</td>
                <td width="400" align="left" valign="top" bgcolor="#999999">
                <select name="txtcategory" id="txtcategory">
                 <?php while( $result=oci_fetch_array($namestmt) ){ ?>
                  <option value="<?php echo $result['CAT_ID'] ?>" selected="selected"><?php echo $result['CAT_NAME'] ?></option>
                  <?php } ?>
                </select></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">PRICE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtprice" type="text" id="txtprice" size="30" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">DESCRIPTION</td>
                <td width="400" align="left" valign="top" bgcolor="#999999">
                <label>
                  <textarea name="txtdesc" id="txtdesc" cols="45" rows="5"></textarea>
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">DISCOUNT</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"> <select name="txtdisc" id="txtdisc">
                      <option value="100">100%</option>
                      <option value="95">95%</option>
                      <option value="90">90%</option>
                      <option value="85">85%</option>
                      <option value="80">80%</option>
                      <option value="75">75%</option>
                    </select></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">AVAILABLE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999">
                <select name="txtava" id="txtava">
                  <option value="Y" selected="selected">YES</option>
                  <option value="N">NO</option>
                </select></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">ON SHELVES DATE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999">
                <input name="txtindate" type="text" id="txtindate" size="30" readonly="readonly" />
                 <script language="JavaScript" type="text/javascript">
				new tcal ({
					// form name
				'formname': 'form3',
				// input name
				'controlname': 'txtindate'
				});
				</script>
                </td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">PUBLISH DATE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtpubdate" type="text" id="txtpubdate" size="30" readonly="readonly" />
                  <script language="JavaScript" type="text/javascript">
				new tcal ({
					// form name
				'formname': 'form3',
				// input name
				'controlname': 'txtpubdate'
				});
				</script>
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">STOCK of BOOKs</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><label>
                  <input name="txtqty" type="text" id="txtqty" size="30" />
                </label></td>
              </tr>
              <tr>
                <td width="200" align="left" valign="top" bgcolor="#999999">IMAGE</td>
                <td width="400" align="left" valign="top" bgcolor="#999999"><!--<label>
                  <input name="txtimg" type="file" id="txtimg" value="" size="30" readonly="readonly" />
                  </label>-->
                  <input name="image" type="file" size="30" />
                </td>
              </tr>
            </table>
    <p>
              <input type="submit" name="Submit" id="Submit" value="Submit" />
             <input type="reset" name="btnreset" id="btnreset" value="Reset" />
        </p>
      </form>
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>