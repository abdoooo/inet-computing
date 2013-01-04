<?php

function loaddata($user, $datatime, $type, $page){
$maxpage = $page * 30;
$lowerpage = $maxpage -30;

if($type == "mybook"){
  $sql = "SELECT * FROM `bookpost` WHERE `useremail` = \"$user\" ORDER BY `datatime` DESC LIMIT $lowerpage , $maxpage;";
}
if($type == "recent"){
  $sql = "SELECT * FROM  `bookpost` WHERE `hidden` = 0 ORDER BY  `datatime` DESC LIMIT  $lowerpage , $maxpage;";
}

if($type == "myorder"){
  $sql = "SELECT * FROM `bookpost`, `order` WHERE `order`.`email` = '$user' AND `order`.`bookid`= `bookpost`.`bookid`";
}


if($type == "cat"){

$cata = $_GET['cat'];	

$sql = "SELECT * FROM `bookpost` WHERE `cata` = \"$cata\" and `hidden` = 0";
}

if($type == "edit"){

$edit = $_GET['editbook'];	

$sql = "SELECT * FROM `bookpost` WHERE `bookid` = $edit and `useremail` = \"$user\"";
}

if($type == "search"){

$search_data = $_POST['search_data'];
	
$sql = "SELECT * FROM `bookpost` WHERE `name` LIKE \"%$search_data%\" or `cata` LIKE \"%$search_data%\" or`author` LIKE \"%$search_data%\" or `publisher` LIKE \"%$search_data%\" or `info` LIKE \"%$search_data%\" or `code` LIKE \"%$search_data\" or `useremail` LIKE \"%$search_data%\"";
}

$process = mysql_query($sql) or die('MySQL query error');
while($row = mysql_fetch_array($process)){
	$bookid =  $row['bookid'];
	$nam = $row['name'];
	$cat =  $row['cata'];
	$cata =  $row['cata'];
	$aut =  $row['author'];
	$pub =  $row['publisher'];
	$inf =  nl2br($row['info']);
	$cod =  $row['code'];
	$pic =  $row['pic'];
	$usermail = $row['useremail'];
	$price = $row['price'];
	$hidden = $row['hidden'];
	
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
	
	$edit="";
	$order="";
	if($type == "mybook"){
		if($hidden == 0){
		$edit = "<a href=index.php?editbook=$bookid>[Edit]</a>";
		}else{
		$edit = "(The book is hidden) <a href=index.php?editbook=$bookid>[Edit]</a>";
		}
	}elseif($type == "edit"){
		if($hidden == 0){
			$edit = "<a href=index.php?editbook=$bookid&hidden=1>[Hidden]</a>";
		}else{
			$edit = "(The book is hidden) <a href=index.php?editbook=$bookid&hidden=0>[Show]</a>";
		}
	}
	
	echo "<div class=container><div class=span11><table class=\"table table-hover\">";
	echo "<thead><tr><th colspan=3>$nam $edit [Seller: $usermail]</th></tr></thead>";
	echo "<tbody><tr>";
	if($pic == ""){
	  echo "<td width=\"20%\" rowspan=6><img src=\"./images/no.jpg\" /></td>";
	}else{
	  if(substr($pic,0,4) == "<img")
	  echo "<td width=\"20%\" rowspan=6>$pic</td>";	
	  else
	  echo "<td width=\"20%\" rowspan=6><img width=\"180\" height=\"209\" src=\"./bookimg/$pic\" /></td>";  
	}
	echo "<td width=\"9%\">ISBN:</td><td>$cod</td><td width=\"10%\" rowspan=5>";
	include('checkorder.php');
	echo "</td></tr><tr><td>Author:</td><td>$aut</td></tr>";
	echo "<tr><td>Publisher:</td><td>$pub</td></tr>";
	echo "<tr><td>Information:</td><td>$inf</td></tr>";
	echo "<tr><td>Category:</td><td>$cat</td>";

	echo "<tr><td>Price:</td><td>$$price ";

	

	echo " </td></tr></tbody>";
	echo "</table></div></div><br>";
}
if($type == "edit"){
	return array($bookid, $nam, $cat, $aut, $pub, $inf, $cod, $pic, $usermail, $price, $hidden, $cata);
}
}
?>