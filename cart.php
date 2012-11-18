<?php
include_once("template.php");
 include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();
?>

<?php
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

basetemplate_head();
$pagestatus="cart";
 basetemplate_fullbody($pagestatus);
 
 ?>
 <div class="contentfullpage">
				
	
		<h3><img src='images/buystep1.png'/></h3>
		

<?php
  
  if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    display_cart($_SESSION['cart']);
  } else {
    echo "<h3>There are no items in your cart</h3><hr/>";
  }

  $target = "index.php";

  // if we have just added an item to the cart, continue shopping in that category
  if($new)   {
    $details =  get_book_details($new);
    if($details['CAT_ID']) {
      $target = "cat.php?catid=".$details['CAT_ID'];
    }
  }
?>

		
</div>

<!-- footer -->
	<?php
footer(); 
?>
