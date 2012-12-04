<br /><br /><br />

<?php

include ('loaddata.php');
$user = $_SESSION['email'];

if(isset($_GET['mybook'])){
  loaddata($user, "", "mybook", 1);
}elseif(isset($_GET['upload'])){
  include ('postbook.html');
}else{
  loaddata("", "", "recent", 1);
}

//if(isset($_GET['recent']))

?>