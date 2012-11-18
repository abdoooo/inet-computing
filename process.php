<?php
include_once("template.php");
require_once("conn_fun.php");

basetemplate_head();
$pagestatus="cart";
 basetemplate_fullbody($pagestatus);
 include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();
?>
<div class="contentfullpage">
				
<h3><img src='images/buystep4.png'/></h3>

<?php
  include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  $card_type = $_POST['card_type'];
  $card_number = $_POST['card_number'];
  $card_month = $_POST['card_month'];
  $card_year = $_POST['card_year'];
  $card_name = $_POST['card_name'];

  if(($_SESSION['cart']) && ($card_type) && ($card_number) &&
     ($card_month) && ($card_year) && ($card_name)) {
    //display cart, not allowing changes and without pictures
    if(process_card($_POST)) {
      //empty shopping cart
	  
	  //$abc =  display_cart_email($_SESSION['cart'], false, 0);

      //$abc .= display_shipping_email(calculate_shipping_cost());
	  
				
	  $abc = email_order($_SESSION['for_email_oid']);
	  
	
	  $user_email = $_SESSION["EMAIL"];
	  
	  email_invoice($abc,$user_email);
	  
	  
	  $_SESSION['cart']=null;
	  $_SESSION['items'] = null;
          $_SESSION['total_price'] =null;
	  
	  
	  //session_destroy();
      echo "<h3>Invoice E-mail to you. 
      </br>Thank you for shopping with us. Your order has been placed.</h3>
      <h4><a href='index.php'>Home Page</a></h4>";
     // display_button("index.php", "continue-shopping", "Continue Shopping");
    } else {
      echo "<p>Could not process your card. Please contact the card issuer or try again.</p>";
   //   display_button("purchase.php", "back", "Back");
    }
  } else {
    echo "<p>You did not fill in all the fields, please try again.</p><hr />";
   // display_button("purchase.php", "back", "Back");
  }

?>
</div>

<!-- footer -->
	<?php
footer(); 
?>