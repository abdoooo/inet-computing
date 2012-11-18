<?php
include_once("template.php");

basetemplate_head();
$pagestatus="reg";
 basetemplate_fullbody($pagestatus);
?>
<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">



$(document).ready(function() {
	$("#cust_reg").validate({
		rules: {
			name: "required",
			password: {
				required: true,
				minlength: 5 },
			cpassword: {
				required: true,
				minlength: 5,
				equalTo: "#password"},
			email: {
				required: true,
				email: true},
			address: "required",
			city:"required",
			country:"required",
		},
		messages: {
			name: "Please enter your name",
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"},
			cpassword: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"},
			email: "Please enter a valid email address",
			address: "Please enter your address",
			city: "Please enter your city",
			country: "Please enter your country",
	  }
	});
	
		//**********************************//
	$("#name").change(function(){ 
		var name = $("#name").val();
		var msgbox = $("#status");
		
		if(name.length !=null){
			$("#status").html('<img src="img/loader.gif" align="absmiddle">&nbsp;Checking availability...');
			
			$.ajax({  
			type: "GET",
			url: "ajax/cust_check_ajax.php",
			data: "name="+ name,
			 
			success: function(msg){
				$("#status").ajaxComplete(function(event, request){
					if(msg == 'OK'){
						 msgbox.html('<img src="img/yes.png" align="absmiddle"> <font color="Green"> Available </font>  ');
					}else{
						msgbox.html(msg);
					}
				});
			} 
  			}); 
		}
	return false;
	});	
	//**********************************//

	
});
</script>

				<div class="registier" align="center">
				<h3>Registier</h3>
				<form id="cust_reg" method="POST" action="cust_progress.php?progressID=cust_reg">
					<table border="0" cellspacing="10px"  >
					<tr>
					<td>Username: </td><td><input type="text" id="name" name="name"/><span id="status" /></td>
					</tr>
					<tr>
					<td>Password: </td><td><input id="password" name="password" type="password" /></td>
					</tr>
					<tr>
					<td>Confirm password</td><td><input id="cpassword" name="cpassword" type="password" /></td>
					</tr>
					<tr>
					<td>E-mail:</td><td> <input id="email" name="email" type="email"/></td>
					</tr>
					<tr>
					<td>Address: </td><td><textarea NAME="address"  name="address" COLS=40 ROWS=6></textarea></td>
					</tr>
					<tr>
					<td>City </td><td><input id="city" name="city" type="city" /></td>
					</tr>
					<tr>
					<td>Country: </td><td><input id="country" name="country" type="country" /></td>
					</tr>
					<td>
					<input  id="submit" type="submit"  value="Registier"/>
					</td>
					</tr>
					
                
					</table>
					</form>
					</div>


	<div class="wrapper"></div>
<?php
footer(); 
?>