<?php
if(isset($_GET['hidden'])){
	$editbook = $_GET['editbook'];
	
	$hidden = $_GET['hidden'];
	
	$postsql = "UPDATE `bookdb`.`bookpost` SET `hidden` = $hidden WHERE `bookpost`.`bookid` = $editbook;";
	include('uploadinformation.php');
	postthing($postsql);
}
?>