<?php
session_start();
ob_start();

require_once("connection/connect.php");
include("php/define.php");

if (!$_POST == ""){
$txtcat = $_POST['txtcat'];
$_SESSION['txtcat'] =  $_POST['txtcat'];
$page = "1";
}else {
$txtcat = $_SESSION["txtcat"]; 
$page = $_GET['page'];
}

//echo "[[[[".$txtcat."]]]]";

$stmt = oci_parse($conn,'select * from BOOKS order by CAT_ID');
oci_execute($stmt);


$namestmt = oci_parse($conn,'select * from CATEGORIES order by CAT_ID');
oci_execute($namestmt);


if ($txtcat == "ALL") {
	$searchstmt = oci_parse($conn,'select * from BOOKS order by CAT_ID');
} else {
	$searchstmt = oci_parse($conn,'select * from BOOKS WHERE CAT_ID = \''.$txtcat.'\' order by CAT_ID');
}
oci_execute($searchstmt);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template_admin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Book Shop</title>

<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="calendar_db.js"></script>
<link rel="stylesheet" href="calendar.css">
<link rel="stylesheet" href="contentslider.css">

<style type="text/css">
body,td,th {
	color: #FFF;
}
body {
	background-image: url(image/bg_adminbg.png);
}
</style>
</head>

<link href="css/index.css" rel="stylesheet" type="text/css" />

<body>
<table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="100" colspan="2"><img src="image/Banner.png" alt="Book Shop" width="1024" height="100" border="0" /></td>
  </tr>
  <tr>
    <td height="50" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="200" rowspan="2" align="center" valign="top"><p><a href="index.php"><img src="image/btnhome.png" alt="Homepage" width="150" height="40" border="0" /></a></p>
    <p><a href="book.php"><img src="image/btnbook.png" alt="Book" width="150" height="40" border="0" /></a></p>
    <p><a href="adminreportmonthly.php"><img src="image/btnreport.png" alt="Report" width="150" height="40" border="0" /></a></p></td>
    <td width="800" align="right">
	<?php if(isset($_SESSION['USERNAME']))	{ ?>
	<form id="form2" name="form2" method="post" action="php/adminlogout.php">
    <input type="submit" name="btnlogout" id="btnlogout" value="Logout" />
    </form>
    <?php } ?>
    </td>
  </tr>
  <tr>
    <td width="800" valign="top">
	<!-- InstanceBeginEditable name="Content" --> <?php if (isset($_SESSION["USERNAME"])) { ?>
				<a href="book_add.php"><img src="image/btnbookadd.png"
					alt="Add New Book" width="200" height="35" border="0" /> </a><a
				href="book.php"><img src="image/btnbooksearch.png"
					alt="Add New Book" width="200" height="35" border="0" /> </a><br />
				<br /> <br />
				<form id="form1" name="form1" method="post" action="">
					<select name="txtcat" id="txtcat">
						<option value="ALL" selected="selected">ALL</option>
						<?php while( $result=oci_fetch_array($namestmt) ){ ?>
						<option value="<?php echo $result['CAT_ID'] ?>">
							<?php echo $result['CAT_NAME'] ?>
						</option>
						<?php } ?>
					</select> <input type="submit" name="Submit" id="Submit"
						value="Submit" />
					<table width="800" border="0" cellspacing="2" cellpadding="2">
						<tr>
							<!--<td align="center" bgcolor="#CCCCCC">ISBN</td>-->
							<td align="center" bgcolor="#333333">BOOK</td>
							<td width="100" align="center" bgcolor="#333333">AUTHOR</td>
							<td width="100" align="center" bgcolor="#333333">CATEGORY</td>
							<!--<td align="center" bgcolor="#CCCCCC">DESCRIPTION</td>-->
							<td width="100" align="center" bgcolor="#333333">PRICE</td>
							<td width="100" align="center" bgcolor="#333333">DISCOUNT</td>
							<!--<td align="center" bgcolor="#CCCCCC">Publication Date</td>-->
							<td width="100" align="center" bgcolor="#333333">AVAILABLE</td>
						</tr>






						<?

						// How many adjacent pages should be shown on each side?
						$adjacents = 3;

						/*
						 First get total number of rows in data table.
						If you have a WHERE clause in your query, make sure you mirror it here.
						*/
						

						if ($txtcat == "ALL") {
							$searchstmt = oci_parse($conn,'select * from BOOKS order by CAT_ID');
							//echo "[[[[Shirley]]]";

						} else {
							$searchstmt = oci_parse($conn,'select * from BOOKS WHERE CAT_ID = \''.$txtcat.'\' order by CAT_ID');
							//echo "[[[[AAAAAAAAA]]";
						}
						oci_execute($searchstmt);
						
						

						$items = 0;
 							while ($row = oci_fetch_array($searchstmt))
  							 {
  							     $items++;                          
							   }  
						
						
						// echo "[[[[".$items."]]]";
						
						
						$total_pages = $items;
						
						//echo "[[[[".$total_pages ."]]]";
								 

						/* Setup vars for query. */
						$targetpage = "book.php"; 	//your file name  (the name of this file)
						$limit = 2; 								//how many items to show per page
						
						if($page){
							$p=$page;
							$end = $p*$limit;
							$start = $end-$limit+1; 

	 					//first item to display on this page
						}else{
							$end = $limit;
							$start = 1;
							
						}							//if no page var is given, set start to 0

						/* Get data. */
						if ($txtcat == "ALL") {
						//	$searchstmt = oci_parse($conn,'select * from BOOKS order by CAT_ID LIMIT '.$start.','. $limit);
							$sql = "select * from BOOKS WHERE ROWNUM <= ".$end. " MINUS select * from BOOKS WHERE ROWNUM<".$start." order by 4";
							$searchstmt = oci_parse($conn,$sql);
							
						} else {
						//	$searchstmt = oci_parse($conn,'select * from BOOKS WHERE CAT_ID = \''.$txtcat.'\' order by CAT_ID LIMIT '.$start.','. $limit);
							
							//$searchstmt = oci_parse($conn,'select * from BOOKS WHERE ROWNUM >= '.$start.' and WHERE ROWNUM <='. $limit .'order by CAT_ID and CAT_ID = \''.$txtcat);

							
							$sql="select * from BOOKS WHERE ROWNUM <= ".$end. " and CAT_ID = '".$txtcat."' MINUS select * from BOOKS WHERE ROWNUM<".$start." and CAT_ID = '".$txtcat."'";
							//$sql="select * from BOOKS WHERE ROWNUM >=0  and ROWNUM <=10 and CAT_ID = 1 order by CAT_ID";
							$searchstmt = oci_parse($conn,$sql);
						}
						
						oci_execute($searchstmt);
						





						//$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
						//$result = oci_execute(oci_parse($conn,$sql));
						//$result = mysql_query($sql);

						/* Setup page vars for display. */
						if ($page == 0) $page = 1;					//if no page var is given, default to 1.
						$prev = $page - 1;							//previous page is page - 1
						$next = $page + 1;							//next page is page + 1
						$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
						$lpm1 = $lastpage - 1;						//last page minus 1

						/*
						 Now we apply our rules and draw the pagination object.
						We're actually saving the code to a variable in case we want to draw it more than once.
						*/
						$pagination = "";
						if($lastpage > 1)
						{
							$pagination .= "<div class=\"pagination\">";
							//previous button
							if ($page > 1)
								$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
							else
								$pagination.= "<span class=\"disabled\">previous</span>";

							//pages
							if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
							{
								for ($counter = 1; $counter <= $lastpage; $counter++)
								{
									if ($counter == $page)
										$pagination.= "<span class=\"current\">$counter</span>";
									else
										$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
								}
							}
							elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
							{
								//close to beginning; only hide later pages
								if($page < 1 + ($adjacents * 2))
								{
									for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
									{
										if ($counter == $page)
											$pagination.= "<span class=\"current\">$counter</span>";
										else
											$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
									}
									$pagination.= "...";
									$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
									$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
								}
								//in middle; hide some front and some back
								elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
								{
									$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
									$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
									$pagination.= "...";
									for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
									{
										if ($counter == $page)
											$pagination.= "<span class=\"current\">$counter</span>";
										else
											$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
									}
									$pagination.= "...";
									$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
									$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
								}
								//close to end; only hide early pages
								else
								{
									$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
									$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
									$pagination.= "...";
									for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
									{
										if ($counter == $page)
											$pagination.= "<span class=\"current\">$counter</span>";
										else
											$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
									}
								}
							}

							//next button
							if ($page < $counter - 1)
								$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
							else
								$pagination.= "<span class=\"disabled\">next</span>";
							$pagination.= "</div>\n";
						}
						?>

						<?php while( $result=oci_fetch_array($searchstmt) ){ ?>

						<tr>
							<!--<td align="center" bgcolor="#CCCCCC"><?php echo $result['ISBN']  ?></td>-->
							<td align="center" bgcolor="#333333"><a
								href="/project/admin/book_modify.php?isbn=<?php echo $result['ISBN'] ?>">
									<img src="../bookimage/<?php echo $result['IMG']?>"
									width="200" height="200" border="0" /> <br /> <?php echo $result['TITLE']  ?>
									<br /> ISBN: <?php echo $result['ISBN']  ?>
							</a>
							</td>
							<td width="100" align="center" bgcolor="#333333"><?php echo $result['AUTHOR'] ?>
							</td>
							<td width="100" align="center" bgcolor="#333333"><?php echo $result['CAT_ID']; ?>
							</td>
							<!-- <td align="center" bgcolor="#CCCCCC"><?php //echo $result['DESCR'] ?></td>-->
							<td width="100" align="center" bgcolor="#333333"><?php echo $result['PRICE'] ?>
							</td>
							<td width="100" align="center" bgcolor="#333333"><?php echo $result['DIST'] ?>
							</td>
							<!--<td align="center" bgcolor="#CCCCCC"><?php //echo $result['PUBDATE'] ?></td>-->
							<td width="100" align="center" bgcolor="#333333"><?php echo $result['AVAB'] ?>
							</td>
						</tr>

						<?}?>

						



					</table><?=$pagination?>
					<?php } else {
echo "<script>alert('Warning!!! Warning!!! Warning!!! You have no permission!!!')</script>"; ?>
					<meta http-equiv="REFRESH" Content="0;url=index.php">
					<?php } ?>
					<!-- InstanceEndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
