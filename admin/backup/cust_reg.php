<?php require_once("cust_fun.php");?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUST Registration</title>
</head>

<body>
<form method="post" action="cust_progress.php?progressID=cust_reg" id="form">
<table width="80%" border="0">

    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">Name</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><label>
        <input name="NAME" type="text" id="NAME" size="30">
      </label></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#999999">Email</td>
      <td align="left" valign="top" bgcolor="#999999"><input name="EMAIL" type="text" id="EMAIL" size="30"></td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">Password</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><input name="CUST_PW" type="password" id="CUST_PW" size="30"></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top" bgcolor="#999999">Personal Info.</td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">Address</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><label>
        <input name="ADDRESS" type="text" id="ADDRESS" size="30">
      </label></td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top" bgcolor="#999999">City</td>
      <td width="400" align="left" valign="top" bgcolor="#999999"><input name="CITY" type="text" id="CITY" size="30"></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#999999">Country</td>
      <td align="left" valign="top" bgcolor="#999999"><input name="COUNTRY" type="text" id="COUNTRY" size="30"></td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top" bgcolor="#999999">
      <input  type="submit" value="Completed"></td>
    </tr>

</table>

</form>
</body>
</html>
