<?php session_start();?>
<html>
<head>

<title>Login</title>
</head>



<?php
unset($_SESSION['CUST_ID']);
session_destroy();

echo 'Logout~!';
?>
<body onload='window.location="cust_login.php"'>
</body>
</html>
