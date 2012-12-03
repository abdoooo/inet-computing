<br /><br /><br />

<?php
include ('loaddata.php');

if(isset($_GET['mybook'])){
loaddata("admin", "", "mybook", 1);
}

if(isset($_GET['recent'])){
loaddata("", "", "recent", 1);
}

if(isset($_GET['upload'])){
include ('postbook.html');
}

?>