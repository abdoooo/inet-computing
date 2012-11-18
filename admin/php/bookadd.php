<?php 
require_once("../connection/connect.php");

$txtisbn  = $_POST['txtisbn'];
$txtauthor = $_POST['txtauthor'];
$txttitle = $_POST['txttitle'];
$txtcategory = $_POST['txtcategory'];
$txtprice = $_POST['txtprice'];
$txtdesc = $_POST['txtdesc'];
$txtdisc = $_POST['txtdisc'];
$txtindate = $_POST['txtindate'];
$txtpubdate = $_POST['txtpubdate'];
$txtqty = $_POST['txtqty'];
$txtimg = $_POST['txtimg'];
$txtava = $_POST['txtava'];

/*
$txtisbn  = "9781449309053";
$txtauthor = "Mac OS X Lion";
$txttitle = "David Pogue";
$txtcategory = "0";
$txtprice = "210";
$txtdesc = "With Lion, Apple has unleashed the most innovative version of Mac OS X yet—and once again, David Pogue brings his humor and expertise to the #1 bestselling Mac book. Mac OS X 10.7 completely transforms the Mac user interface with multi-touch gestures borrowed from the iPhone and iPad, and includes more 250 brand-new features. This book reveals them all with a wealth of insight and detail--and even does a deep dive into iCloud, Apple's wireless, free syncing service for Macs, PCs, iPhones, and iPads.";
$txtdisc = "100";
$txtindate = "16-NOV-11";
$txtpubdate = "16-NOV-11";
$txtqty = "100";
$txtimg = "macosx.jpg";
$txtava = "Y";
*/
//to_date( '16-Nov-11', 'dd-mon-yy')

	//$stmt = oci_parse($conn,'INSERT INTO BOOKS (ISBN, AUTHOR, TITLE, CAT_ID, PRICE, DESCR, DIST, IMG, AVAB, INDATE, PUBDATE, QTY) VALUES ('.$txtisbn.', \''.$txtauthor.'\',\''.$txttitle.'\','.$txtcategory.','.$txtprice.',\''.$txtdesc.'\',\''.$txtdisc.'\',\''.$txtimg.'\',\''.$txtava.'\',to_date(\''.$txtindate.'\',\'dd-mon-yy\'),to_date(\''.$txtpubdate.'\',\'dd-mon-yy\'),'.$txtqty.')');
	$stmt = oci_parse($conn,'INSERT INTO BOOKS (ISBN, AUTHOR, TITLE, CAT_ID, PRICE, DESCR, DIST, IMG, AVAB, INDATE, PUBDATE, QTY) VALUES (\' '. $txtisbn .' \', \' '. $txtauthor . '\' , \' '. $txttitle . '\', \' '. $txtcategory . '\', \' '. $txtprice . '\', \' '. $txtdesc . '\', \' '. $txtdisc . '\', \' '. $$filename . '\', \' '. $txtava . '\', \' '. $txtindate . '\', \' '. $txtpubdate . '\', \' '. $txtqty . '\')');
	$r = oci_execute($stmt);
	
echo $txtisbn. '<br />';
echo $txtauthor. '<br />';
echo $txttitle. '<br />';
echo $txtcategory. '<br />';
echo $txtprice. '<br />';
echo $txtdesc. '<br />';
echo $txtdisc. '<br />';
echo $txtindate. '<br />';
echo $txtpubdate. '<br />';
echo $txtqty. '<br />';
echo $txtimg. '<br />';
echo $txtava. '<br />';
?>

<meta http-equiv="REFRESH" Content="0;url=../book_add.php">