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
					$catid = $_GET['catid'];
					$name = get_category_name($catid);
					echo "<h3>".$name."</h3>";
            		$book_array = get_books($catid);
					display_books($book_array);
        		     ?>
					<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
					    <td><img src="images/book4.jpg" alt="" />
					    	<h4>Business Plans</h4>
							<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
					    <td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
					    </td>
					    <td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
					    <td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
					</tr>
					<tr> 
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
					</tr>
					<tr>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
					</tr>
					<tr>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
						<td><img src="images/book4.jpg" alt="" />
					    <h4>Business Plans</h4>
						<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
						</td>
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