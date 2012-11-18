<?php
  session_start();

  $page =$_GET["page"];
    if ($page=="login")
   {
	  checklogin();
   }
   
	  ?>
 <?php
  
   function checkloginstatus($pagestatus)
 {
	 $loginpagestatus=" ";
$regpagestatus=" ";
$accpagestatus=" ";
$cartpagestatus=" ";
$abtuspagestatus=" ";
if($pagestatus != "")
{
if ($pagestatus == "login")
{
$loginpagestatus = "active";
}
else{
if ($pagestatus == "reg")
{
$regpagestatus = "active";
}else{
if ($pagestatus == "acc")
{
$accpagestatus = "active";
}else{
if ($pagestatus == "cart")
{
$cartpagestatus = "active";
}else{
if ($pagestatus == "abtus")
{
$abtuspagestatus = "active";
}
}
}
}
}
}
else
{
$loginpagestatus="";
$regpagestatus="";
$accpagestatus="";
$cartpagestatus="";
$abtuspagestatus="";
}
	                $reghrefcode="";
	                $username="";
					$loginstatus ="";
					$aname="";
					if ($_SESSION["CUST_ID"]!=null)
					{
						$username = $_SESSION["NAME"]." ! "; 
					    $loginstatus = "logout.php";
						$aname = "Logout";
 					}
					else
					{
						$username = "Guess ! </b>" ;
						$loginstatus = "login.php";
						$aname = "Login";
						$reghrefcode = " <li><a href='registier.php' class='".$regpagestatus."'>Registier</a></li>";
					}
					$loginhrefcode = " <a href='".$loginstatus."' class='".$loginpagestatus."' >".$aname."</a></li>".$reghrefcode;		
					$acchrefcode = " <li><a href='account.php' class='".$accpagestatus ."'>My Account</a></li>";
					$carthrefcode = " <li><a href='cart.php' class='".$cartpagestatus."'>View Shopping Cart</a></li>";
					$aboutashrefcode = " <li><a href='aboutas.html' class='".$abtuspagestatus."'>About Us</a></li>";
					echo "<li> Hi ".$username.$loginhrefcode.$acchrefcode.$carthrefcode.$aboutashrefcode;
}
?>

<?php

function checklogin()
{
include_once("template.php");
basetemplate_head();
$pagestatus="";
 basetemplate_fullbody($pagestatus);
require_once("conn_fun.php");
$name=$_POST["name"];
$password=$_POST["password"];

if ($name !=null && $password!=null){
	$stmt = oci_parse($conn,'select * from CUSTOMERS where NAME=\''.$name.'\' and CUST_PW=\''.$password.'\'');
	$r = oci_execute($stmt);

	$result=oci_fetch_array($stmt);
	if (!$result && $sid==null){
		echo " <div class='login'><h3>Username or Password NOT correct,plaese try again!</h3><br><a href='javascript:history.go(-1)'>go back</a></div>";
			
	}else{
		$_SESSION["CUST_ID"]=$result["CUST_ID"];
		$_SESSION["NAME"]=$result["NAME"];
		$_SESSION["EMAIL"]=$result["EMAIL"];
		$_SESSION["ADDRESS"]=$result["ADDRESS"];
		$_SESSION["CITY"]=$result["CITY"];
		$_SESSION["COUNTRY"]=$result["COUNTRY"];
		$_SESSION["CUST_PW"]=$result["CUST_PW"];
										

		echo "<div class='login'><h3>Loading...</h3></div>";
		echo "<script language='javascript'>";
		echo " location='index.php';";
		echo "</script>";
	}
}else{
	echo "<div class='login'><h3>Username or Password cannot NULL,please try again!!</h3></div>"	;
}
echo "<div class='wrapper'></div>";
footer();
oci_close ($conn); 
}
?>


