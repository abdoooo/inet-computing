<?php
include_once("template.php");

basetemplate_head();
$pagestatus="login";
 basetemplate_fullbody($pagestatus);
?>
<div class="login">
<h3>Login</h3>
<form method="post" action="cust_check_login.php?page=login" id="form">

Username: <input name="name" type="text"  class="input" id="name" value="test4" /><br />
Password: <input name="password" type="password" class="input" id="password" value="123123"/><br/>
<input type="submit" value="Login" class="button"/>  

</form>
</div>
<!--
<form method="post" >
					<div class="login">
					
					Username: <input type="text" id="login"/></br></br>
					Password: <input type="password" id="password"/>
					
					</br></br>
					
					<input type="button" value='login'>
                
					</div>
					</form>-->
                    <div class="wrapper"></div>
<?php
footer(); 
?>