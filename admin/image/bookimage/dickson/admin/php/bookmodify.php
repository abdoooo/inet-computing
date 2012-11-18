<?php 
require_once("../connection/connect.php");

$txtisbn  = $_POST['txtisbn'];
$txtauthor = $_POST['txtauthor'];
$txttitle = $_POST['txttitle'];
$txtcategory = $_POST['txtcategory'];
$txtprice = $_POST['txtprice'];
$txtdesc = $_POST['txtdesc'];
$txtdisc = $_POST['txtdisc'];
$txtqty = $_POST['txtqty'];
$txtava = $_POST['txtava'];

$txtnewprice = (int)$txtprice;
$txtnewcat = (int)$txtcategory;
$txtnewdisc = (int)$txtdisc;
$txtnewqty = (int)$txtqty;

//$stmt = oci_parse($conn,'UPDATE BOOKS SET (AUTHOR, TITLE, CAT_ID, PRICE, DESCR, DIST, AVAB, QTY) = (\' '. $txtauthor . '\' , \' '. $txttitle . '\', \' '. $txtcategory . '\', \' '. $txtprice . '\', \' '. $txtdesc . '\', \' '. $txtdisc . '\', \' '. $txtava . '\', \' '. $txtqty . '\') WHERE ISBN = \''.$txtisbn.'\'');
$stmt = oci_parse($conn,'UPDATE BOOKS SET AUTHOR = \''.$txtauthor.'\', TITLE = \''.$txttitle.'\', CAT_ID = \''.$txtnewcat.'\', PRICE = \' '. $txtnewprice . '\', DESCR = \''.$txtdesc.'\', DIST = \''.$txtnewdisc.'\', QTY = \''.$txtqty.'\', AVAB = \''.$txtava.'\' WHERE ISBN = \''.$txtisbn.'\'');
	$r = oci_execute($stmt);
	
?>
<meta http-equiv="REFRESH" Content="0;url=../book.php">