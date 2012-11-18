<?php
function do_html_header($title = '') {
  // print an HTML header

  // declare the session variables we want access to inside the function
  if (!$_SESSION['items']) {
    $_SESSION['items'] = '0';
  }
  if (!$_SESSION['total_price']) {
    $_SESSION['total_price'] = '0.00';
  }
?>
  <html>
  <head>
    <title><?php echo $title; ?></title>
    <style>
      h2 { font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: red; margin: 6px }
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #FF0000; width=70%; text-align=center}
      a { color: #000000 }
    </style>
  </head>
  <body>
  <table width="100%" border="0" cellspacing="0" bgcolor="#cccccc">
  <tr>
  <td rowspan="2">
  <a href="index.php"><img src="images/Book-O-Rama.gif" alt="Bookorama" border="0"
       align="left" valign="bottom" height="55" width="325"/></a>
  </td>
  <td align="right" valign="bottom">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Items = ".$_SESSION['items'];
     }
  ?>
  </td>
  <td align="right" rowspan="2" width="135">
  <?php
     if(isset($_SESSION['admin_user'])) {
       display_button('logout.php', 'log-out', 'Log Out');
     } else {
       display_button('show_cart.php', 'view-cart', 'View Your Shopping Cart');
     }
  ?>
  </tr>
  <tr>
  <td align="right" valign="top">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Price = $".number_format($_SESSION['total_price'],2);
     }
  ?>
  </td>
  </tr>
  </table>
<?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_footer() {
  // print an HTML footer
?>
  </body>
  </html>
<?php
}

function do_html_heading($heading) {
  // print heading
?>
  <h2><?php echo $heading; ?></h2>
<?php
}

function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
<?php
}

function newbooks()
{

$book_search='select * from BOOKS where rownum<=6 and AVAB = \'Y\' order by INDATE DESC';
$conn = db_connect();
$stmt = oci_parse($conn,$book_search);
$r = oci_execute($stmt);


while( $result=oci_fetch_array($stmt) ){

$openli = "<li><div class='box'><div class='left-bot-corner'><div class='inner'><div class='img-box2'>";

$aimg = "<a href='displaybook.php?isbn=".$result['ISBN']."'><img width='150' height='150' src='bookimage/".$result['IMG']."'></a><div class='inner'>";

$adetail = "<a href='displaybook.php?isbn=".$result['ISBN']."'>".$result['TITLE']."</a><p>Price: HKD$ ".$result['PRICE']."</p>";


$closeli = "</div></div></div></div></div></li>";


echo $openli.$aimg.$adetail.$closeli;
}
}


function mostorder()
{

$book_search='select ISBN, count(*) as NO_ORDER from ORDER_ITEMS GROUP BY ISBN  order by NO_ORDER DESC';
$conn = db_connect();
$stmt = oci_parse($conn,$book_search);
$r = oci_execute($stmt);

 $i = 0;
while( $result=oci_fetch_array($stmt) ){
	
	if ($i<6){
		$book_info='select * from BOOKS where ISBN = '.$result['ISBN'];

		//echo "[[".$book_info."]]]";where rownum<=3 

		$book_stmt = oci_parse($conn,$book_info);
		 
		$r = oci_execute($book_stmt);

			while( $result=oci_fetch_array($book_stmt) ){

$openli = "<li><div class='box'><div class='left-bot-corner'><div class='inner'><div class='img-box2'>";

$aimg = "<a href='displaybook.php?isbn=".$result['ISBN']."'><img width='150' height='150' src='bookimage/".$result['IMG']."'></a><div class='inner'>";

$adetail = "<a href='displaybook.php?isbn=".$result['ISBN']."'>".$result['TITLE']."</a><p>Price: HKD$ ".$result['PRICE']."</p>";


$closeli = "</div></div></div></div></div></li>";


echo $openli.$aimg.$adetail.$closeli;
			}
		}$i++;
	}
}



function display_categories($cat_array) {
  if (!is_array($cat_array)) {
     echo "<h3>No categories currently available</h3>";
     return;
  }
  
    foreach ($cat_array as $row)  {

    echo "<li><div class='extra-wrap'>";
    $code = "<a href=\"listbook.php?catid=".$row['CAT_ID']."\"><span>".$row['CAT_NAME']."</span></a>";
	echo $code;			
    echo "</div></li>";
  }
}


function display_books($book_array) {
  //display all books in the array passed in
  if (!is_array($book_array)) {
    echo "<p>No books currently available in this category</p>";
  } else {
    //create table
    echo "<table width=\"100%\" border=\"0\">";

    //create a table row for each book
    foreach ($book_array as $row)
	 {
      $url = "displaybook.php?isbn=".$row['ISBN'];
      echo "<tr><td>";
	  
      if (@file_exists("bookimage/".$row['IMG']."")) {
        $title = "<img src=\"bookimage/".$row['IMG']."\"style=\"border: 1px solid black\"/>";
        do_html_url($url, $title);
      } else {
        echo "&nbsp;";
      }
      echo "</td><td>";
      $title = $row['TITLE']." by ".$row['AUTHOR'];
      do_html_url($url, $title);
      echo "</td></tr>";
    }

    echo "</table>";
  }

  echo "<hr />";
}

function display_book_details($book) {
  // display all details about this book
  if (is_array($book)) {
    echo "<table align='center 'border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%;\"><tr>";
	echo "<td COLSPAN=\"2\"><h3>".$book['TITLE']."</h3></td></tr><tr>";
    //display the picture if there is one
    if (@file_exists("bookimage/".$book['IMG'].""))  
	 {
		 $image = "bookimage/".$book['IMG']."";
      $size = GetImageSize($image);
      if(($size[0] > 0) && ($size[1] > 0)) {
        echo "<td rowspan='4' width='350'><img src=\"bookimage/".$book['IMG']."\"style=\"border: 1px solid black\"/></td>";
      }
    }
	echo "<td><strong>Author:  </strong>".$book['AUTHOR']."</td></tr>";
	echo "<tr><td><strong>ISBN:  </strong>".$book['ISBN']."</td></tr>";
	echo "<tr><td><strong>Our Price:  </strong>".number_format($book['PRICE'], 2)."</td></tr>";
	echo "<tr><td><strong><a href=\"cart.php?new=".$book['ISBN']."\" id='addcart'  ><img src='images/addcartlink.png' /></a></td></tr>";

	echo "<tr><td colspan='2'><strong>Description:</strong></BR>".$book['DESCR']."</td></tr>";

    echo "</table>";
  } else {
    echo "<p>The details of this book cannot be displayed at this time.</p>";
  }
  echo "<hr />";
}

function display_checkout_form() {
  //display the form that asks for name and address
?>
  <br />
  <table border="0" width="100%" cellspacing="0">
  <form action="purchase.php" method="post">
  <tr><th colspan="2" bgcolor="#cccccc">Shipping Address (leave blank if as above)</th></tr>
  <tr>
    <td>Name</td>
    <td><input type="text" name="ship_name" value="" maxlength="40" size="40"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="ship_address" value="" maxlength="40" size="40"/></td>
  </tr>
  <tr>
    <td>City/Suburb</td>
    <td><input type="text" name="ship_city" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td>State/Province</td>
    <td><input type="text" name="ship_state" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td>Postal Code or Zip Code</td>
    <td><input type="text" name="ship_zip" value="" maxlength="10" size="40"/></td>
  </tr>
  <tr>
    <td>Country</td>
    <td><input type="text" name="ship_country" value="" maxlength="20" size="40"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><p><strong>Please press Purchase to confirm
         your purchase, or Continue Shopping to add or remove items.</strong></p>
     <div align="center"><input type="image" src="images/purlink.png" border="0"/></div>
    </td>
  </tr>
  </form>
  </table><hr />
<?php
}

function display_shipping($shipping) {
  // display table row with shipping cost and total price including shipping
?>
  <table border="0" width="100%" cellspacing="0">
  <tr><td align="left">Shipping</td>
      <td align="right"> <?php echo number_format($shipping, 2); ?></td></tr>
  <tr><th bgcolor="#cccccc" align="left">TOTAL INCLUDING SHIPPING</th>
      <th bgcolor="#cccccc" align="right">$ <?php echo number_format($shipping+$_SESSION['total_price'], 2); ?></th>
  </tr>
  </table><br />
<?php
}

function display_card_form($name) {
  //display form asking for credit card details
?>
  <table border="0" width="100%" cellspacing="0">
  <form action="process.php" method="post">
  <tr><th colspan="2" bgcolor="#cccccc">Credit Card Details</th></tr>
  <tr>
    <td>Type</td>
    <td><select name="card_type">
        <option value="VISA">VISA</option>
        <option value="MasterCard">MasterCard</option>
        <option value="American Express">American Express</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Number</td>
    <td><input type="text" name="card_number" value="" maxlength="16" size="40"></td>
  </tr>
  <tr>
    <td>AMEX code (if required)</td>
    <td><input type="text" name="amex_code" value="" maxlength="4" size="4"></td>
  </tr>
  <tr>
    <td>Expiry Date</td>
    <td>Month
       <select name="card_month">
       <option value="01">01</option>
       <option value="02">02</option>
       <option value="03">03</option>
       <option value="04">04</option>
       <option value="05">05</option>
       <option value="06">06</option>
       <option value="07">07</option>
       <option value="08">08</option>
       <option value="09">09</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       </select>
       Year
       <select name="card_year">
       <?
       for ($y = date("Y"); $y < date("Y") + 10; $y++) {
         echo "<option value=\"".$y."\">".$y."</option>";
       }
       ?>
       </select>
  </tr>
  <tr>
    <td>Name on Card</td>
    <td><input type="text" name="card_name" value = "<?php echo $name; ?>" maxlength="40" size="40"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <p><strong>Please press Purchase to confirm your purchase, or Continue Shopping to
      add or remove items</strong></p>
     <div align="center"><input type="image" src="images/purlink.png" border="0"/></div>
    </td>
  </tr>
  </table>
<?php
}

function display_books_page($catid,$page) {

	// How many adjacent pages should be shown on each side?
	$adjacents = 3;

	$conn = db_connect();
	$searchstmt = oci_parse($conn,'select * from BOOKS WHERE CAT_ID = \''.$catid.'\' order by CAT_ID');
	oci_execute($searchstmt);

	$items = 0;
	while ($row = oci_fetch_array($searchstmt))
	{
		$items++;
	}

	$total_pages = $items;

	//echo "[[[[".$total_pages ."]]]";


	/* Setup vars for query. */
	$targetpage = "listbook.php?catid=".$catid ; 
	$limit = 12; 								//how many items to show per page

	if($page){
		$p=$page;
		$end = $p*$limit;
		$start = $end-$limit+1;

		//first item to display on this page
	}else{
		$end = $limit;
		$start = 1;
			
	}	//if no page var is given, set start to 0

	/* Get data. */
	
				
		$sql="select * from BOOKS WHERE ROWNUM <= ".$end. " and CAT_ID = '".$catid."' MINUS select * from BOOKS WHERE ROWNUM<".$start." and CAT_ID = '".$catid."'";
		//$sql="select * from BOOKS WHERE ROWNUM >=0  and ROWNUM <=10 and CAT_ID = 1 order by CAT_ID";
		$searchstmt = oci_parse($conn,$sql);


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
			$pagination.= "<a href=\"$targetpage&page=$prev\"><img src='images/p_prev.png'/></a>";
		else
			$pagination.= "<span class=\"disabled\"><img src='images/p_prev.png'/></span>";

		//pages
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\"><img src='images/$counter.png'/></span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\"><img src='images/$counter.png'/></a>";
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
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\"><img src='images/1.png'/></a>";
				$pagination.= "<a href=\"$targetpage&page=2\"><img src='images/2.png'/></a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\"><img src='images/$counter.png'/></a>";
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\"><img src='images/1.png'/></a>";
				$pagination.= "<a href=\"$targetpage&page=2\"><img src='images/2.png'/></a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\"><img src='images/$counter.png'/></a>";
				}
			}
		}

		//next button
		if ($page < $counter - 1)
			$pagination.= "<a href=\"$targetpage&page=$next\"><img src='images/p_next.png'/></a>";
		else
			$pagination.= "<span class=\"disabled\"><img src='images/p_next.png'/></span>";
		$pagination.= "</div>\n";
	}
	
	echo "<table width=\"100%\" border=\"0\">";
	
	$r=1;
	while( $result=oci_fetch_array($searchstmt) ){ 
	
	$url = "displaybook.php?isbn=".$result['ISBN'];
		
		if ($r==1)
		{
		echo "<tr style=\"vertical-align:top\">";
		}
		
		if ($r%3 ==1)
		{
		echo "<tr style=\"vertical-align:top\">";
		}
	
	if (@file_exists("bookimage/".$result['IMG']."")) {

			$title = "<td width=\"33%\"><a href=\"".$url."\"><img src=\"bookimage/".$result['IMG']."\"style=\"height:190px; width: 190px; border: 1px solid black \"/></a>";
	 		do_html_url($url, $title);

			
	 	} else {
	 		echo "<td width=\"33%\">&nbsp;";

	 	}
		
		echo "<br/>";
		$title = $result['TITLE']." by ".$result['AUTHOR'];
		do_html_url($url, $title);
		$price = "HKD$".$result['PRICE'];
		do_html_url($url, $price);
		echo "</td>";
	 	
		if ($r%3 ==0)
		{
		echo "</tr>";
		}
		
		$r++;
	}
	echo "</table>";
	echo "<br/>";
	echo "<H1>".$pagination."</H1>";
	}



function display_cart($cart, $change = true, $images = 1) {
  // display items in shopping cart
  // optionally allow changes (true or false)
  // optionally include images (1 - yes, 0 - no)

   echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\">
         <form action=\"cart.php\" method=\"post\">
         
         <tr><th colspan='2'>Item</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total</th>
         </tr>";

  //display each item as a table row
  foreach ($cart as $isbn => $qty)  
  {
    $book = get_book_details($isbn);
    echo "<tr>";
    if($images == true) {
      echo "<td align=\"left\">";
      if (@file_exists("bookimage/".$book ['IMG']."")) {
      
      $image = "bookimage/".$book ['IMG']."";
         $size = GetImageSize($image);
         if(($size[0] > 0) && ($size[1] > 0)) {
           echo "<img src=\"bookimage/".$book['IMG']."\"style=\"border: 1px solid black\"
                  width=\"".($size[0]/3)."\"
                  height=\"".($size[1]/3)."\"/>";
         }
      } else {
         echo "&nbsp;";
      }
      echo "</td>";
    }
    echo "<td align=\"left\">";
    if ($change == true) {
      echo "<a href=\"displaybook.php?isbn=".$isbn."\">".$book['TITLE']."</a>
          by ".$book['AUTHOR']."</td>";
    }else
    {
    echo "<b>".$book['TITLE']."</b> by ".$book['AUTHOR']."";
    }
     echo"
          <td align=\"center\">\$".number_format($book['PRICE'], 2)."</td>
          <td align=\"center\">";

    // if we allow changes, quantities are in text boxes
    if ($change == true) {
      echo "<input type=\"text\" name=\"".$isbn."\" value=\"".$qty."\" size=\"3\">";
    } else {
      echo $qty;
    }
    echo "</td><td align=\"center\">\$".number_format($book['PRICE']*$qty,2)."</td></tr>\n";
  }
  // display total row
  echo "<tr>
  <td >&nbsp;</td>
        <td >&nbsp;</td>
        
        <td colspan='3' align='right'>Total Items :".$_SESSION['items']."</td>
        </tr>
        <tr>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <td colspan='3' align='right'>Total Amount :
            \$".number_format($_SESSION['total_price'], 2)."
        </td>
        </tr>";

  // display save change button
  if($change == true) {
    echo "
    <tr>
          <td colspan=\"".(2+$images)."\" style='border-bottom:#000000';>&nbsp;</td>
          
          <td align=\"center\">
             <input type=\"hidden\" name=\"save\" value=\"true\"/>
             <input type=\"image\" src=\"images/savelink.png\"
                    border=\"0\" alt=\"Save Changes\"/>
          </td>
          <td ><a href='checkout.php'><img src='images/outlink.png'></a></td>
          
          </tr>";
  }
  echo "</form></table>";
}

function email_order($oid) {

require_once("conn_fun.php");	
$conn = db_connect();
$ORDER_ID=$oid;
$sql='select * from ORDERS where ORDER_ID='.$ORDER_ID;
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);

$result1=oci_fetch_array($stmt);

$AMOUNT=$result1["AMOUNT"];
$INDATE=$result1["INDATE"];
$ORDER_STAT=$result1["ORDER_STAT"];
$SHIP_NAME=$result1["SHIP_NAME"];
$SHIP_ADDRESS =$result1["SHIP_ADDRESS"];
$SHIP_CITY=$result1["SHIP_CITY"];
$SHIP_COUNTRY=$result1["SHIP_COUNTRY"];

$con = "<img src=\"http://ithink.homeip.net:8080/project/dickson/images/m01.gif\" />";
	/*--------------------------------order details---------------------------------------------------- */
$con .= "<table width=\"80%\"  border=\"1\">";
$con .= "<tr>  <td colspan=\"2\" align=\"left\" valign=\"top\" ><h3>Order Details</h3></td>  </tr> ";
$con .= "<tr> <td align=\"left\" valign=\"top\"  >Order Number</td>  <td align=\"left\" valign=\"top\" >";
$con .=  $ORDER_ID."</td>  </tr>";
$con .= "<tr>";
$con .= "<td width=\"214\" align=\"left\" valign=\"top\" >Order status</td>";
$con .= "<td width=\"576\" align=\"left\" valign=\"top\" >". $ORDER_STAT."</td>";
$con .=  "</tr>";
$con .=  "<tr>";
$con .=  " <td width=\"214\" align=\"left\" valign=\"top\"  >Order Date</td>";
$con .=   "<td width=\"576\" align=\"left\" valign=\"top\"  >". $INDATE."</td>";
$con .=   "</tr>";
$con .=   "<tr>";
$con .=   " <td width=\"214\" align=\"left\" valign=\"top\"  >Customer Name</td>";
$con .=   "<td width=\"576\" align=\"left\" valign=\"top\"  >". $SHIP_NAME."</td>";
$con .=   " </tr>";
$con .=   "<tr>";
$con .=   " <td align=\"left\" valign=\"top\"  >Delivery Address</td>";
$con .=   "<td align=\"left\" valign=\"top\"  >". $SHIP_ADDRESS."</td>";
$con .=   "</tr>";
$con .= "</table>";
$con .= "<br>";


$con .= "<table width=\"80%\"  border=\"1\">";
$con .=  "<tr>";
$con .=   "<td colspan=\"6\" align=\"left\" valign=\"top\"  ><h3>Order List</h3></td>";
$con .=   "</tr>";


$sql2='select * from ORDER_ITEMS where ORDER_ID='.$ORDER_ID;
$stmt2 = oci_parse($conn, $sql2);
oci_execute($stmt2);


$con .=  '<tr>';
$con .=  '<td width=\"174\" align=\"left\" valign=\"top\"  >ISBN</td>';
$con .=  '<td width=\"176\" align=\"left\" valign=\"top\"  >Title</td>';
$con .=  '<td width=\"159\" align=\"left\" valign=\"top\"  >Price</td>';
$con .=  '<td width=\"273\" align=\"left\" valign=\"top\"  >Quantity</td>';
$con .=  '<td width=\"273\" align=\"left\" valign=\"top\"  >Amount</td>';
$con .=  '</tr>';

	while( $result2=oci_fetch_array($stmt2) ){
		
		$select_BOOK='select * from BOOKS where ISBN='.$result2["ISBN"];
		$BOOK_stmt = oci_parse($conn, $select_BOOK);
		oci_execute($BOOK_stmt);
		while( $BOOK_result=oci_fetch_array($BOOK_stmt) ){
			$book_TITLE=$BOOK_result["TITLE"];
		}
		
$con .=  '<tr>';
$con .=  ' <td align=\"left" valign="top"  >'. $result2["ISBN"].'</td>';
$con .=  ' <td align=\"left" valign="top"  >'.$book_TITLE.'</td>';
$con .=  ' <td align=\"left" valign="top"  >'.$result2["ITEM_PRICE"] .'</td>';
$con .=   ' <td align=\"left" valign="top"  >'.$result2["QTY"] .'</td>';
$con .=   ' <td align="left" valign="top"  >'.$result2["ITEM_PRICE"]*$result2["QTY"].'</td>';
		$total+=($result2["ITEM_PRICE"]*$result2["QTY"]);
$con .=  ' </tr>';
	}
	
$con .=  ' <tr>';
$con .=   '<td colspan="5" align="left" valign="top"  >Total Amount: <b>'.$total.'</b></td>';
$con .=   '</tr>';

$con .=  "</table>";

return $con ;

}


function best_sales($cid) 
{

$book_search='select A1.ISBN, A2.CAT_ID, a2.img, a2.title, count(A1.ISBN) as NO_ORDER from ORDER_ITEMS A1, BOOKS A2 where A1.ISBN=A2.ISBN and a2.cat_id='.$cid.' GROUP BY A1.ISBN, A2.CAT_ID, a2.img, a2.title order by NO_ORDER DESC';


$conn = db_connect();
$stmt = oci_parse($conn,$book_search);
$r = oci_execute($stmt);

$i = 1;
			while( $result=oci_fetch_array($stmt) ){
if ($i<=3){
				$openli = "<li><div class='extra-wrap'><a href='displaybook.php?isbn=".$result['ISBN']."'><span><B>".$i."</B> <H5>".$result['TITLE']."</H5></span><img height='100' src='bookimage/".$result['IMG']."'></a></div></li>";

		echo $openli;
		$i++;
        }
			}
}


function best_sales_in_detail() 
{
$book_search='select ISBN, count(*) as NO_ORDER from ORDER_ITEMS GROUP BY ISBN  order by NO_ORDER DESC';
$conn = db_connect();
$stmt = oci_parse($conn,$book_search);
$r = oci_execute($stmt);

 $i = 1;
while( $result=oci_fetch_array($stmt) ){
	
	if ($i<=3){
		$book_info='select * from BOOKS where ISBN = '.$result['ISBN'];

		//echo "[[".$book_info."]]]";where rownum<=3 

		$book_stmt = oci_parse($conn,$book_info);
		 
		$r = oci_execute($book_stmt);

			while( $result=oci_fetch_array($book_stmt) ){

				$openli = "<li><div class='extra-wrap'><a href='displaybook.php?isbn=".$result['ISBN']."'><span><B>".$i."</B> <H5>".$result['TITLE']."</H5></span><img height='100' src='bookimage/".$result['IMG']."'></a></div></li>";

		echo $openli;
			}
		}$i++;
	}
}
?>

