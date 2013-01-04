<?php
$sql = "SELECT * FROM `userinfo` WHERE `email` = '$name';";

$process = mysql_query($sql) or die('MySQL query error');
while($row = mysql_fetch_array($process)){
$fname =  $row['firstname'];
$lname =  $row['lastname'];
$opass =  $row['password'];
}
?>


<script language="javascript">
	function checkinfo() {
		var pass1 = document.getElementById('passup');
		var pass2 = document.getElementById('pass2');
		var filter2 = /\S{8,}/;
		
		if(!filter2.test(pass1.value)){
			alert('Password too short(at least 8 characters).');
			pass1.focus;
			return false;
		}
		
		
		if (pass1.value == pass2.value) {
			return true;
		}else{
			return false;
		}
}
</script>

<div class="container">
<form class="form-signin" action="index.php?signpost=1&editprofile=1" method="post" onSubmit="return checkinfo();">
<table align="center" width="40%"><br>
<tr><td>First name</td>
<td><input type="text" class="input-block-level" placeholder="First name" id="fname" name="fname" value="<?php echo"$fname"; ?>"></td></tr>
<tr><td>Last Name</td>
<td><input type="text" class="input-block-level" placeholder="Last name" id="lname" name="lname" value="<?php echo"$lname"; ?>"></td></tr>
<tr><td>Password</td>
<td><input type="password" class="input-block-level" placeholder="Password" name="passup" id="passup"></td></tr>
<tr><td>Re-Type Password</td>
<td><input type="password" class="input-block-level" placeholder="re-type" name="pass2" id="pass2"></td></tr>
<tr><td align="center" colspan="2"><br><button class="btn btn-danger"" type="submit">Save Change</button></td></tr>
</td></tr></table>
</form>
</div>