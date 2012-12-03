<?php

function loaddata($user, $datatime, $type, $page){
$maxpage = $page * 30;
$lowerpage = $maxpage -30;

if($type = "mybook"){
$sql = "SELECT * FROM  `bookpost`  WHERE  `useremail` LIKE  '$user' ORDER BY  `datatime` DESC LIMIT $lowerpage , $maxpage;";
}

if($type = "recent"){
$sql = "SELECT * FROM  `bookpost` ORDER BY  `datatime` DESC LIMIT  $lowerpage , $maxpage;";
}

$process = mysql_query($sql) or die('MySQL query error');
while($row = mysql_fetch_array($process)){
	$nam = $row['name'];
	$cat =  $row['cata'];
	$aut =  $row['author'];
	$pub =  $row['publisher'];
	$inf =  $row['info'];
	$cod =  $row['code'];
	$pic =  $row['pic'];
	
	echo "<div class=container><table class=\"table table-hover\">";
	echo "<thead><tr><th>$nam</th><th></th></tr></thead>";
	echo "<tbody><tr>";
	echo "<td width=\"20%\" rowspan=5><img src=\"./bookimg/$pic.jpg\" /></td>";
	echo "<td>ISBN: $cod</td></tr>";
	echo "<tr><td>Author: $aut</td></tr>";
	echo "<tr><td>Publisher: $pub</td></tr>";
	echo "<tr><td>Detail: $inf</td></tr>";
	echo "<tr><td>Category: $cat</td></tr>";
	echo "</tbody>";
	echo "</table></div><br>";

}
}
?>