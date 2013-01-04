<?php

function checklogin($id,$pw){
$sql = "SELECT * FROM  `userinfo` WHERE  `email` =  '$id' And `block` = 0;";
$process = mysql_query($sql) or die('MySQL query error');
	while($row = mysql_fetch_array($process)){
		$pass = $row['password'];
		if($pw == $pass)
			return true;
		else
			return false;
	}
}


function checkfacebook(){
require './fb/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '430750040324017',
  'secret' => '9270d721dd3ace32a18e0548a1aee947',
  'cookie' => true,
));



$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
  
  echo "<br>$user_profile[id]<br>$user_profile[username]";
  $fbuser = $user_profile['username'];
  $fbpw = $user_profile['id'];
   $fbfname = $user_profile['first_name'];
  $fblname = $user_profile['last_name'];
    $datetime = date('Y-m-d H:i:s', time());
  if(checklogin($fbuser,$fbpw)){
  	echo "Welcome back";
  }
  else{
	$postsql = "INSERT INTO `userinfo` VALUES (NULL, '$fbuser','$fbfname','$fblname', '$fbpw', 1, '$datetime', 0);";
	include('uploadinformation.php');
	postthing($postsql);
  }
	 $_SESSION['email'] = $fbuser;
	 $_SESSION['pass'] = $fbpw;
	 $_SESSION['facebook'] = 1;
  
  header( "Location: http://localhost/givemebook/index.php" ) ;
} else {
  $loginUrl = $facebook->getLoginUrl();
  echo "$loginUrl";
  header( "Location:  $loginUrl" ) ;
}



}

?>