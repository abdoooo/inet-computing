<?php
if(isset($_GET['editbook'])){
		$editbook = $_GET['editbook'];
		$file_name = $_FILES['file']['name'];

		if($cove == "" && $file_name == ""){
			$postsql = "UPDATE `bookpost` SET `name` = \"$bookname\", `cata` = \"$cat\", `author` = \"$author\", `publisher` = \"$publisher\", `info` = \"$info\",`code` = \"$isbn\", `price` = \"$price\", `datatime` = \"$datetime\" WHERE `bookpost`.`bookid` = $editbook;";
		}elseif($cove != ""){
			$postsql = "UPDATE `bookpost` SET `name` = \"$bookname\", `cata` = \"$cat\", `author` = \"$author\", `publisher` = \"$publisher\", `info` = \"$info\",`code` = \"$isbn\",`pic` = '$cove', `price` = \"$price\", `datatime` = \"$datetime\" WHERE `bookpost`.`bookid` = $editbook;";
		}elseif($file_name != ""){
			include ('uploadfile.php');
			$postsql = "UPDATE `bookpost` SET `name` = \"$bookname\", `cata` = \"$cat\", `author` = \"$author\", `publisher` = \"$publisher\", `info` = \"$info\",`code` = \"$isbn\",`pic` = '$cove', `price` = \"$price\", `datatime` = \"$datetime\" WHERE `bookpost`.`bookid` = $editbook;";
		}
		postthing($postsql);
	}else{
		if($cove == "")
			include ('uploadfile.php');

			$postsql = "INSERT INTO `bookpost` VALUES (NULL, '$bookname', '$cat', '$author', '$publisher', '$info', '$isbn', '$cove', '$postemail', '$price','$datetime', '0');";
			postthing($postsql);
	}
?>