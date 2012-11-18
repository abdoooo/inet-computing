<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="sources/jscharts.js"></script>
<!-- InstanceBegin template="/Templates/template_admin.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
	background-image: url(../image/bg_adminbg.png);
}
</style>
</head>

<link href="css/index.css" rel="stylesheet" type="text/css" />

<body>
<table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="100" colspan="2"><img src="../image/Banner.png" alt="Book Shop" width="1024" height="100" border="0" /></td>
  </tr>
  <tr>
    <td height="50" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="200" rowspan="2" align="center" valign="top"><p><a href="../index.php"><img src="../image/btnhome.png" alt="Homepage" width="150" height="40" border="0" /></a></p>
    <p><a href="../book.php"><img src="../image/btnbook.png" alt="Book" width="150" height="40" border="0" /></a></p></td>
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
    <script type="text/javascript">
	
	var myData = new Array(['Jan', 2], ['Feb', 1], ['Mar', 3], ['Apr', 6], ['May', 8], ['Jun', 10], ['Jul', 9], ['Aug', 8], ['Sep', 5], ['Oct', 6], ['Nov', 2], ['Dec', 4]);
	var colors = ['#CE0000', '#EF2323', '#D20202', '#A70000', '#850000', '#740000', '#530000', '#850000', '#B00000', '#9C0404', '#CE0000', '#BA0000'];
	var myChart = new JSChart('graph', 'bar');
	myChart.setDataArray(myData);
	myChart.colorizeBars(colors);
	myChart.setDataArray(myData);
	myChart.setAxisColor('#9D9F9D');
	myChart.setAxisWidth(1);
	myChart.setAxisNameX('Months');
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
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>