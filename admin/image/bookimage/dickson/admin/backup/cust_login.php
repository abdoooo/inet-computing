<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<title>CUSTOMER Login</title>
</head>

<body>

<h2>Login</h2>
<form method="post" action="cust_check_login.php" id="form">

<label>Email</label> <br/>
<input name="email" type="text"  class="input" id="email" value="test3@gmail.com" /><span id="status"></span><br />


<label>Password</label><br />
<input name="password" type="password" class="input" id="password" value="password"/><br/>
<input type="submit" value="Login" class="button"/> 

<input type="button" value="Registration" class="button" onclick="{location.href='cust_reg.php'}" />

</form>

</body>
</html>