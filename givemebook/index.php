<html>
<head>
<title>Give Me Book</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
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
  include ('login.html');
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