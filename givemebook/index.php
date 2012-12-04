<html>
<head>
<title>Give Me Book</title>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>


<?php
include ('connectdb.php');
include ('checklogin.php');
session_start();

$normal = 0;

if(isset($_GET['sign'])){
	unset($_SESSION['email']);
	unset($_SESSION['pass']);
	session_destroy();
	$normal = 0;
}

if(isset($_POST['email'])){
     if($_POST['email'] == ""){
         echo "ERROR: Please enter your email";
         }elseif($_POST['pass'] == ""){
         echo"ERROR: Please enter your password";
         }else{
         $postemail = $_POST['email'];
         $postpass = $_POST['pass'];
         if(checklogin($postemail, $postpass)){
          $normal = 1;
		  $_SESSION['email'] = $postemail; 
		  $_SESSION['pass'] = $postpass; 
         }else{
         $normal = 0;
         echo"Login error";
         }
     }
}

if(isset($_GET['signpost'])){
	$status = $_GET['signpost'];
	if($status == 1){
		 $postemail = $_POST['emailup'];
         $postpass = $_POST['passup'];
		if(!checklogin($postemail, $postpass)){
			$postsql = "INSERT INTO `userinfo` VALUES (NULL, '$postemail', '$postpass', NULL, NULL);";
		   include('postinformation.php');
		   postthing($postsql);
		}else{
		echo "<div align=\"center\"><h3 class=text-error>Email is already used.</h3></div>";
		}
	}
}

if(isset($_GET['postbook'])){
	
$postemail = $_SESSION['email'];
$bookname = $_POST['bookname'];
$isbn = $_POST['isbn'];
$author = $_POST['auth'];
$publisher = $_POST['pub'];
$info = $_POST['info'];
$cat = $_POST['cat'];
$cove = "";
$datetime = date('Y-m-d H:i:s', time());

	include ('uploadfile.php');
	$postsql = "INSERT INTO `bookpost` VALUES (NULL, 'testbook', '$cat', '$author', '$publisher', '$info', '$isbn', '$cove', '$postemail', '$datetime', '0');";
	include('postinformation.php');
 	postthing($postsql);
//echo "<br><br>$php_unix_timestamp";
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
<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
</body>
</html>