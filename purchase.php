<?php
include_once("template.php");

basetemplate_head();
$pagestatus="cart";
 basetemplate_fullbody($pagestatus);
 include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();
?>
<div class="contentfullpage">
				
					<h3><img src='images/buystep3.png'/></h3>

<?php

  include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();


  // create short variable names
 
  $name = $_SESSION["NAME"];
  $address = $_SESSION["ADDRESS"];
  $city = $_SESSION["CITY"];
  $country = $_SESSION["COUNTRY"];
  
  $_POST['name']=$_SESSION["NAME"];
  $_POST['address']=$_SESSION["ADDRESS"];
  $_POST['city']=$_SESSION["CITY"];
  $_POST['country']=$_SESSION["COUNTRY"];
  
  
  if ($_SESSION["CUST_ID"]!=null){
  // if filled out
  
  if (($_SESSION['cart']) && ($name) && ($address) && ($city) && ($country)) {
    // able to insert into database
    if(insert_order($_POST) != false ) {
      //display cart, not allowing changes and without pictures
      display_cart($_SESSION['cart'], false, 1);

      display_shipping(calculate_shipping_cost());

      //get credit card details
      display_card_form($name);

     // display_button("show_cart.php", "continue-shopping", "Continue Shopping");
    } else {
      echo "<p>Could not store data, please try again.</p>";
      //display_button('checkout.php', 'back', 'Back');
    }
  } else {
    echo "<p>You did not fill in all the fields, please try again.</p><hr />";
    //display_button('checkout.php', 'back', 'Back');
  }

  }
?>

</div>

<!-- footer -->
	<?php
footer(); 
?>

