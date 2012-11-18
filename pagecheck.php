<?php
 function checkloginstatus()
 {
	                $username="";
					if ($_SESSION["CUST_ID"]!=null)
					{
						$username = $_SESSION["NAME"]." ! "; 
					    $loginstatus = "logout.php";
						$aname = "logout";
 					}
					else
					{
						$username = "Guess ! </b>" ;
						$loginstatus = "login.php";
						$aname = "login";
					}
					$hrefcode = " <a href='".$loginstatus."' >".$aname."</a>";
					echo $username.$hrefcode;
}
?>



