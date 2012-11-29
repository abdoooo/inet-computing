<?php

function checklogin($id,$pw){
$sql = "SELECT * FROM  `userinfo` WHERE  `email` =  '$id';";
$abc = "test";
//echo $sql;
$process = mysql_query($sql) or die('MySQL query error');
while($row = mysql_fetch_array($process)){
$pass = $row['password'];
if($pw == $pass)
return true;
else
return false;
}
}
?>