<?php 
//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","100"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
//checks if the form has been submitted
 if(isset($_POST['Submit'])) 
 {
 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'];
 	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		//print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errors=1;
 		}
 		else
 		{
//get the size of the image in bytes
 //$_FILES['image']['tmp_name'] is the temporary filename of the file
 //in which the uploaded file was stored on the server
 $size=filesize($_FILES['image']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
	echo '<h1>You have exceeded the size limit!</h1>';
	$errors=1;
}

//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="".$image_name;
//we verify if the image has been uploaded, and print error instead
$copied = copy($_FILES['image']['tmp_name'], $newname);
if (!$copied) 
{
	echo '<h1>Copy unsuccessfull!</h1>';
	$errors=1;
}}}}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
 	echo "<h1>ADD BOOK Successfully!</h1>";
	//echo $newname;
	
	require_once("../admin/connection/connect.php");

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
$txtimg = $newname;
$txtava = $_POST['txtava'];

$txtnewcat = (int)$txtcategory;
$txtnewprice = (int)$txtprice;
$txtnewdisc = (int)$txtdisc;
$txtnewqty = (int)$txtqty;
$txtnewindate = date('d-M-y', strtotime($txtindate));
$txtnewpubdate = date('d-M-y',strtotime($txtpubdate));

//to_date( '16-Nov-11', 'dd-mon-yy')

	//$stmt = oci_parse($conn,'INSERT INTO BOOKS (ISBN, AUTHOR, TITLE, CAT_ID, PRICE, DESCR, DIST, IMG, AVAB, INDATE, PUBDATE, QTY) VALUES ('.$txtisbn.', \''.$txtauthor.'\',\''.$txttitle.'\','.$txtcategory.','.$txtprice.',\''.$txtdesc.'\',\''.$txtdisc.'\',\''.$txtimg.'\',\''.$txtava.'\',to_date(\''.$txtindate.'\',\'dd-mon-yy\'),to_date(\''.$txtpubdate.'\',\'dd-mon-yy\'),'.$txtqty.')');
	$stmt = oci_parse($conn,'INSERT INTO BOOKS (ISBN,AUTHOR,TITLE,CAT_ID,PRICE,DESCR,DIST,IMG,AVAB,QTY,INDATE,PUBDATE) VALUES (\''.$txtisbn.'\',\''.$txtauthor.'\',\''.$txttitle.'\',\''.$txtnewcat.'\',\''.$txtnewprice.'\',\''.$txtdesc.'\',\''.$txtnewdisc.'\',\''.$txtimg.'\',\''.$txtava.'\',\''.$txtnewqty.'\',\''.$txtnewindate.'\',\''.$txtnewpubdate.'\')');
	$r = oci_execute($stmt);
/*	
echo 'ISBN: '.$txtisbn. '<br />';
echo 'AUTHOR: '.$txtauthor. '<br />';
echo 'TITLE: '.$txttitle. '<br />';
echo 'CATEGORY: '.$txtcategory. '<br />';
echo 'PRICE: '.$txtprice. '<br />';
echo 'DESC: '.$txtdesc. '<br />';
echo 'DISCOUNT: '.$txtdisc. '<br />';
echo 'INDATE: '.$txtindate. '<br />';
echo 'PUBLISHER: '.$txtpubdate. '<br />';
echo 'QTY: '.$txtqty. '<br />';
echo 'IMG: '.$txtimg. '<br />';
echo 'AVA: '.$txtava. '<br />';
echo 'NEWCAT: '.$txtnewcat. '<br />';
echo 'NEWINDATE: '.$txtnewindate. '<br />';
echo 'NEWPUBDATE: '.$txtnewpubdate. '<br />';*/
 }
 
 
?> 

<meta http-equiv="REFRESH" Content="0;url=../admin/book_add.php">
<!--<meta http-equiv="REFRESH" Content="0;url=<?php //echo $newname?>">
