<?php
include ('loaddata.php');
$user = $_SESSION['email'];
?>

<script language="javascript">
	function checkData() {
		var data = document.getElementById('search_data');
		
		if (data.value == "") {
			return false;
	   }else{
		    document.startsearch.submit()
			return false;
	   }
}
</script>

<div class=container>
<div class="span11">
<?php 

$name = $_SESSION['email']; 

if(isset($_SESSION['facebook'])){
echo "Welcome, <a href=\"http://facebook.com/$name\"><img src=\"https://graph.facebook.com/$name/picture\" width=\"1.8%\" height=\"1.8%\"> $name</a>";
}else{
echo "Welcome, $name <a href=index.php?editprofile=1>(Edit)</a>";
}

?>
<form id="startsearch" name="startsearch" action="index.php?search=1" method="post" class="navbar-search pull-right" onsubmit="return checkData();">
  <input id="search_data" name="search_data" type="text" data-provide="typeahead" placeholder="Search">
</form>
</div>
</div>


<?php
if(isset($_GET['mybook']) || isset($_GET['postbook'])){
  loaddata($user, "", "mybook", 1);
}elseif(isset($_GET['upload'])){
  include ('postbook.php');
}elseif(isset($_GET['editbook'])){
  echo "<div align=\"center\"><h2>Update Page</h2></div>";
  include('editbook.php');
  list($bookid, $nam, $cat, $aut, $pub, $inf, $cod, $pic, $usermail, $price, $hidden, $cata) = loaddata($user, "", "edit", 1);
  echo "<div align=\"center\"><form enctype=multipart/form-data method=post action=index.php?postbook=1&del=$bookid class=\"signin\" onSubmit=\"return con();\"><button type=submit class=\"btn btn-danger\">Delete The Book</button></form></div>";
  include ('postbook.php');
}elseif(isset($_GET['editprofile'])){
echo "<div align=\"center\"><h2>User Information</h2></div>";
include('editprofile.php');
}elseif(isset($_GET['order'])){
	$datetime = date('Y-m-d H:i:s', time());
	$bookid = $_POST['orderbook'];
	$postsql = "INSERT INTO `order` VALUES ('0', '$bookid', '1', '$user', '$datetime');";
	include('uploadinformation.php');
	postthing($postsql);
	loaddata($user, "", "myorder", 1);
}elseif(isset($_GET['delorder'])){
	$orderdel = $_POST['orderdel'];
	$postsql = "DELETE FROM `order` WHERE `orderid` = '$orderdel';";
	include('uploadinformation.php');
	postthing($postsql);
	loaddata($user, "", "myorder", 1);
}elseif(isset($_GET['myorder'])){
	loaddata($user, "", "myorder", 1);
}elseif(isset($_GET['search'])){
  loaddata($user, "", "search", 1);
}elseif(isset($_GET['cat'])){
  loaddata($user, "", "cat", 1);
}else{
  loaddata("", "", "recent", 1);
}

//if(isset($_GET['recent']))

?>