<?php
session_start();
require_once("conn_fun.php");
require_once("cust_check_login.php");
require_once("book_sc_fns.php");
include_once("template.php");

basetemplate_head();
$pagestatus="";
 basetemplate_fullbody($pagestatus);

?>
					<div class="aside">
				
			<h2>Catalog</h2>
			<ul>	 	 
          <?php 
            $cat_array = get_categories();
			display_categories($cat_array);
             ?>
			</ul>
			
			<h2>Best Sellers</h2>
			<ul>	 	               
				<li><div class="extra-wrap"><a href="book.html"><span>1. Tin Tin </span><img src="images/book5.jpg" width="50" height="100" alt="" /></a></div></li>
				<li><a href="book.html"><span>2. ABC </span><img src="images/book4.jpg" width="50" height="100" alt="" /></a></li>
			</ul>
			

						
<div class="wrapper"></div>
					</div>
					<div class="content">
						<div class="tail-middle">
			<div class="row-2">
				<div class="inside">
                <?php
                    $isbn = $_GET['isbn'];
  					// get this book out of database
  					$book = get_book_details($isbn);
  					
  					display_book_details($book);
  					?>
					<h3>Business</h3>
					<table align='center 'border="1" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td><h2>ABC</h2></td><td></td>
					</tr>
					<tr>
					    <td rowspan='5'><img src="images/book3.jpg" alt="" /></td><td>Author</td>
					</tr>
					<tr> 
						<td>ISBN </td>
					</tr>

					<tr>
						<td>CATEGORIE</td>
					</tr>
					<tr>
						<td><a>Price	</a></td>
					</tr>
					<tr>
						<td><a href="cart.php?new=9780061988349">View / edit order details</a> </td>
					</tr>
					</table>				
					</div>
			</div>
            
		</div>

					</div>


<?php
footer(); 
?>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>