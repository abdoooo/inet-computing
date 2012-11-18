<?php 
session_start();
include_once("template.php");
basetemplate_head();
$pagestatus="l";
 basetemplate_fullbody($pagestatus);

unset($_SESSION['CUST_ID']);
session_destroy();

echo "<div class='login'><h3>Logout!</h3></div><div class='wrapper'></div>";

footer(); 
?>
<body onload='window.location="index.php"'>
</body>
</html>
