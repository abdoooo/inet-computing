<html lang="en">
<head>
<meta charset="utf-8">
<title>Sign in &middot; Twitter Bootstrap</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

    <!-- Le styles -->
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 450px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">


<script language="javascript">
	function checkEmail() {
		var email = document.getElementById('emailup');
		var pass1 = document.getElementById('passup');
		var pass2 = document.getElementById('pass2');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var filter2 = /\S{8,}/;
		if (!filter.test(email.value)) {
			alert('Please provide a valid email address');
			email.focus;
			return false;
	   }else{
		   if(!filter2.test(pass1.value)){
		   	alert('Password too short(at least 8 characters).');
			pass1.focus;
			return false;
		   }
		   if(pass1.value != pass2.value){
			alert('Two passwords are difference.');
			pass1.focus;
			return false;
		   }
	   }
}
</script>

</head>

<body>
<div class="container">
<?php
if(isset($_GET['signup'])){ ?>
<form class="form-signin" action="index.php?signpost=1" method="post" onSubmit="return checkEmail();">
<P>
<img src="./images/mainlogo.jpeg" width="460" height="276">
</P>
<input type="text" class="input-block-level" placeholder="First name" id="fname" name="fname">
<input type="text" class="input-block-level" placeholder="Last name" id="lname" name="lname">
<input type="text" class="input-block-level" placeholder="Email address" id="emailup" name="emailup">
<input type="password" class="input-block-level" placeholder="Password" name="passup" id="passup">
<input type="password" class="input-block-level" placeholder="re-type" name="pass2" id="pass2">
<button class="btn btn-large btn-block btn-danger"" type="submit">Sign Up</button>
</form>
<?php }else{?>
<form class="form-signin" action="index.php?recent=1" method="post">
<p><a href="index.php?facebook=login"><img src="./images/fb_login_icon.gif"></a></p>
<P>
<img src="./images/mainlogo.jpeg" width="460" height="276">
</P>
<input type="text" class="input-block-level" placeholder="Email address" name="email">
<input type="password" class="input-block-level" placeholder="Password" name="pass">
<button class="btn btn-large btn-block btn-primary"" type="submit">Log-in</button>
</form>

<?php }?>
</div> <!-- /container -->
</body>
</html>
