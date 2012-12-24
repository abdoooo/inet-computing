<br /><br /><br />

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
<form id="startsearch" name="startsearch" action="index.php?search=1" method="post" class="navbar-search pull-right" onsubmit="return checkData();">
  <input id="search_data" name="search_data" type="text" data-provide="typeahead" placeholder="Search">
</form>
</div>


<?php
if(isset($_GET['mybook'])){
  loaddata($user, "", "mybook", 1);
}elseif(isset($_GET['upload'])){
  include ('postbook.html');
}elseif(isset($_GET['search'])){
  loaddata($user, "", "search", 1);
}elseif(isset($_GET['cat'])){
  loaddata($user, "", "cat", 1);
}else{
  loaddata("", "", "recent", 1);
}

//if(isset($_GET['recent']))

?>