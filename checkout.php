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
				
					<h3><img src='images/buystep2.png'/></h3>
									
<?php
if ($_SESSION["CUST_ID"]!=null)
{
  include ('book_sc_fns.php');

  // The shopping cart needs sessions, so start one
  session_start();


  if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    display_cart($_SESSION['cart'], false, 1);
    display_checkout_form();
  } else {
    echo "<h3>There are no items in your cart</h3>";
  }
}
else
{
		echo "<script language='javascript'>";
		echo " location='login.php';";
		echo "</script>";
	}
?>

		
</div>

<!-- footer -->
	<?php
footer(); 
?>
