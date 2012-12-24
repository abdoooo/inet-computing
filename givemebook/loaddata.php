<?php

function loaddata($user, $datatime, $type, $page){
$maxpage = $page * 30;
$lowerpage = $maxpage -30;

if($type == "mybook"){
  $sql = "SELECT * FROM `bookpost` WHERE `useremail` = \"$user\" ORDER BY `datatime` DESC LIMIT $lowerpage , $maxpage;";
}
if($type == "recent"){
  $sql = "SELECT * FROM  `bookpost` ORDER BY  `datatime` DESC LIMIT  $lowerpage , $maxpage;";
}

if($type == "cat"){

$cata = $_GET['cat'];	

$sql = "SELECT * FROM `bookpost` WHERE `cata` = \"$cata\"";
}

if($type == "search"){

$search_data = $_POST['search_data'];
	
$sql = "SELECT * FROM `bookpost` WHERE `name` LIKE \"%$search_data%\" or `cata` LIKE \"%$search_data%\" or`author` LIKE \"%$search_data%\" or `publisher` LIKE \"%$search_data%\" or `info` LIKE \"%$search_data%\" or `code` LIKE \"%$search_data\" or `useremail` LIKE \"%$search_data%\"";
}

$process = mysql_query($sql) or die('MySQL query error');
while($row = mysql_fetch_array($process)){
	$nam = $row['name'];
	$cat =  $row['cata'];
	$aut =  $row['author'];
	$pub =  $row['publisher'];
	$inf =  nl2br($row['info']);
	$cod =  $row['code'];
	$pic =  $row['pic'];
	$test = $row['useremail'];
	
	switch ($cat){
	case "eng":
	  $cat = "English";
	break;
	
	case "lan":
	  $cat = "Languages";
	break;
	
	case "his":
	  $cat = "History";
	break;
	
	case "acc":
	  $cat = "Accounting";
	break;
	
	case "sci":
	  $cat = "Science";
	break;
	
	case "com":
	  $cat = "Computer";
	break;
	
	case "engi":
	  $cat = "Engineering";
	break;
	
	case "mus":
	  $cat = "Music";
	break;
	
	case "art":
	  $cat = "Art";
	break;
	
	case "oth":
	  $cat = "Other";
	break;
	}
	
	echo "<div class=container><table class=\"table table-hover\">";
	echo "<thead><tr><th>$nam</th><th></th></tr></thead>";
	echo "<tbody><tr>";
	if($pic == ""){
	  echo "<td width=\"20%\" rowspan=5><img src=\"./images/no.jpg\" /></td>";
	}else{
	  echo "<td width=\"20%\" rowspan=5><img src=\"./bookimg/$pic\" /></td>";	
	}
	echo "<td>ISBN: $cod</td></tr>";
	echo "<tr><td>Author: $aut</td></tr>";
	echo "<tr><td>Publisher: $pub</td></tr>";
	echo "<tr><td><div>Upload User: $test</div><br><div>Detail: $inf</div></td></tr>";
	echo "<tr><td>Category: $cat</td></tr>";
	echo "</tbody>";
	echo "</table></div><br>";
}
}
?>