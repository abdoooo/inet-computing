<?php
include_once("template.php");

basetemplate_head();
$pagestatus="cart";
 basetemplate_fullbody($pagestatus);
 include ('book_sc_fns.php'); 
 include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  @$new = $_GET['new'];

  if($new) {
    //new item selected
    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
      $_SESSION['items'] = 0;
      $_SESSION['total_price'] ='0.00';
    }

    if(isset($_SESSION['cart'][$new])) {
      $_SESSION['cart'][$new]++;
    } else {
      $_SESSION['cart'][$new] = 1;
    }

    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

  if(isset($_POST['save'])) {
    foreach ($_SESSION['cart'] as $isbn => $qty) {
      if($_POST[$isbn] == '0') {
        unset($_SESSION['cart'][$isbn]);
      } else {
        $_SESSION['cart'][$isbn] = $_POST[$isbn];
      }
    }

    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

  do_html_header("Your shopping cart");

  if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    display_cart($_SESSION['cart']);
  } else {
    echo "<p>There are no items in your cart</p><hr/>";
  }

  $target = "index.php";

  // if we have just added an item to the cart, continue shopping in that category
  if($new)   {
    $details =  get_book_details($new);
    if($details['CAT_ID']) {
      $target = "show_cat.php?catid=".$details['CAT_ID'];
    }
  }
?>

					<div class="contentfullpage">
						<div class="tail-middle">
			<div class="row-2">
				<div class="inside">
					<h3>Order History</h3>
					<table align='center 'border="1" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td>Name</td><td></td>
					</tr>
					<tr>
					    <td rowspan='5'><img src="images/book3.jpg" alt="" /></td><td>Price:</td>
					</tr>
					<tr> 
						<td>Order Date:</td>
					</tr>

					<tr>
						<td>Status : Shipped  on Jun 28, 2011</td>
					</tr>
					<tr>
						<td><a>Print Invoices</a></td>
					</tr>
					<tr>
						<td><a>View / edit order details</a> </td>
					</tr>
					</table>
					<br>
					
					<table align='center 'border="1" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td>Name</td><td></td>
					</tr>
					<tr>
					    <td rowspan='5'><img src="images/book3.jpg" alt="" /></td><td>Price:</td>
					</tr>
					<tr> 
						<td>Order Date:</td>
					</tr>

					<tr>
						<td>Status : Shipped  on Jun 28, 2011</td>
					</tr>
					<tr>
						<td><a>Print Invoices</a></td>
					</tr>
					<tr>
						<td><a>View / edit order details </a></td>
					</tr>
					</table><br>
					<table align='center 'border="1" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td>Name</td><td></td>
					</tr>
					<tr>
					    <td rowspan='5'><img src="images/book3.jpg" alt="" /></td><td>Price:</td>
					</tr>
					<tr> 
						<td>Order Date:</td>
					</tr>

					<tr>
						<td>Status : Shipped  on Jun 28, 2011</td>
					</tr>
					<tr>
						<td><a>Print Invoices</a></td>
					</tr>
					<tr>
						<td><a>View / edit order details </a></td>
					</tr>
					</table>
				</div>
			</div>
            
		</div>

					</div>
				
					<div class="clear">
					
					</div>
				</div>
			</div>
		</div>
		
		
</div>

<!-- footer -->
	<?php
footer(); 
?>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>