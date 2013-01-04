<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Give me Book</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<style type="text/css">
body {
padding-top: 60px;
padding-bottom: 40px;
}
</style>

<link href="css/bootstrap-responsive.css" rel="stylesheet"> 
</head>

<body>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
include ('connectdb.php');
include ('checklogin.php');


$normal = 0;

if(isset($_GET['sign'])){
	unset($_SESSION['email']);
	unset($_SESSION['pass']);
	session_destroy();
	$normal = 0;
}

if(isset($_GET['facebook'])){
	$facebook =	$_GET['facebook'];
	if($facebook == "login"){
		$normal = 1;
		checkfacebook();
	}elseif($facebook == "logout"){
		$facebook->destroySession();
		unset($_SESSION['email']);
		unset($_SESSION['pass']);
		session_destroy();
		$normal = 0;
	}
}



if(isset($_POST['email'])){
     if($_POST['email'] == ""){
         echo "ERROR: Please enter your email";
         }elseif($_POST['pass'] == ""){
         echo"ERROR: Please enter your password";
         }else{
         $postemail = $_POST['email'];
         $postpass = md5($_POST['pass']);
         if(checklogin($postemail, $postpass)){
          $normal = 1;
		  $_SESSION['email'] = $postemail; 
		  $_SESSION['pass'] = $postpass;
		   
         }else{
         $normal = 0;
         echo"<div align=\"center\"><h3 class=text-info>Login error</h3></div>";
         }
     }
}

if(isset($_GET['signpost'])){
	$status = $_GET['signpost'];
	if($status == 1){
		 include('uploadinformation.php');
		 $postfname = ucfirst($_POST['fname']);
         $postlname = ucfirst($_POST['lname']);
         $postpass = md5($_POST['passup']);
		if(isset($_GET['editprofile'])){
			$email = $_SESSION['email'];
			if($postpass == ""){
			$postsql = "UPDATE `userinfo` SET `firstname` = '$postfname', `lastname` = '$postlname' WHERE `email` = '$email';";
			}else{
			$postsql = "UPDATE `userinfo` SET `firstname` = '$postfname', `lastname` = '$postlname', `password` = '$postpass' WHERE `email` = '$email';";
			}
			postthing($postsql);
		}else{
			$postemail = $_POST['emailup'];
			if(!checklogin($postemail, $postpass)){
	
				$postsql = "INSERT INTO `bookdb`.`userinfo` (`userid`, `email`, `firstname`, `lastname`, `password`, `0`, `logintime`, `block`) VALUES ('0', '$postemail', '$postfname', '$postlname', '$postpass', NULL, '0');";
				
			   	postthing($postsql);
			}else{
			   	echo "<div align=\"center\"><h3 class=text-error>Email is already used.</h3></div>";
			}
		}
	}
}

if(isset($_GET['postbook'])){
include('uploadinformation.php');
if(isset($_GET['del'])){
$del = $_GET['del'];
$postsql = "DELETE FROM `bookpost` WHERE `bookid` = $del;";
postthing($postsql);
}else{
$postemail = $_SESSION['email'];
$bookname = $_POST['bookname']; 
$isbn = $_POST['isbn'];
$price = $_POST['pri'];
$author = $_POST['auth'];
$publisher = $_POST['pub'];
$info = $_POST['info'];
$cat = $_POST['cat'];
	if($_POST['image_h'] != ""){
		$cove = $_POST['image_h'];
	}else{
		$cove = "";
	}
$datetime = date('Y-m-d H:i:s', time());

	include ('uploadbook.php');
}
}

if(isset($_SESSION['email'])){
  if(isset($_SESSION['pass'])){
    $normal = 1;
    include ('loginheader.php');
    include ('loginbody.php');
    include ('footer.html');
  }
}

if($normal == 0){
  include ('header.php');
  include ('login.php');
  include ('footer.html');
}



?>


<script src="jquery_1.7.2.js"></script>
</body>
</html>