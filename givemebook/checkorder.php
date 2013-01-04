<script language="javascript">
function ord() {
		var r=confirm("Do you confirm to order?");
		if (r==false)
		  {
		  	 return false;
		  }

}

function delord() {
		var r=confirm("Delete the order?");
		if (r==false)
		  {
		  	 return false;
		  }

}
</script>
<?php
$name = $_SESSION['email'];
if(isset($_GET['recent']) || isset($_GET['cat'])||isset($_GET['myorder'])){
	if($usermail != $name){
	$ordersql = "SELECT * FROM `order` WHERE `email` = '$name'";
	$process2 = mysql_query($ordersql) or die('MySQL query error');
	$ordered = 0;
	while($row2 = mysql_fetch_array($process2)){
		$bkid =  $row2['bookid'];
		$ordid =  $row2['orderid'];
		if($bookid == $bkid){
		echo "<form enctype=multipart/form-data method=post action=index.php?myorder=1&delorder=1 class=\"signin\" onSubmit=\"return delord();\"><input type=\"hidden\" name=\"orderdel\" value=\"$ordid\"><button type=submit class=\"btn btn-warning\">Cancel Order</button></form>";
			$ordered = 1;
		}
	}
	if($ordered == 0){
		echo "<form enctype=multipart/form-data method=post action=index.php?myorder=1&order=1 class=\"signin\" onSubmit=\"return ord();\"><input type=\"hidden\" name=\"orderbook\" value=\"$bookid\"><button type=submit class=\"btn btn-success\">Order</button></form>";
	}
	}
}elseif(isset($_GET['mybook'])){
?>	
<div class="btn-group">
  <button class="btn btn-small">View Order (
<?php
$ordersql = "SELECT `userinfo`.`email`, `userinfo`.`facebook`, `order`.* FROM `order`, `userinfo` WHERE `bookid` = '$bookid' AND `order`.`email` = `userinfo`.`email` ORDER BY `datatime`";
	$process2 = mysql_query($ordersql) or die('MySQL query error');
	$total_rows = mysql_num_rows($process2);
	echo "$total_rows "; 
?>
)</button>
  <button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
     </button>
  <ul class="dropdown-menu">
    <?php
	$count = 0;
	while($row2 = mysql_fetch_array($process2)){
		$count += 1;
		$email =  $row2['email'];
		$fb = $row2['facebook'];			
		if($fb == 1){
		echo " <li><a tabindex=\"-1\" href=\"http://www.facebook.com/$email\" target=new>$count: $email</a></li>";
		}else{
		echo " <li><a tabindex=\"-1\" href=\"mailto:$email?Subject=I%20wan%20to%20buy%20$nam\" target=new>$count: $email</a></li>";
		}
	}
   ?>
  </ul>
</div>
<br>1.Right Click Email<br>
2.Open Link With<br>
3.Gmail<br>
<?php
}
?>