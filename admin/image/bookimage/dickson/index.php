<?php
session_start();
require_once("conn_fun.php");
require_once("cust_check_login.php");
require_once("book_sc_fns.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Book Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Online Book Store" />
<meta name="keywords" content="book, online, shop, store" />
<meta name="author" content="Comp320 project group dickson shirley ken hei thomas"/>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/AvantGarde_Bk_BT_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_300.font.js" type="text/javascript"></script>
<script src="js/jcarousellite.js" type="text/javascript"></script>
<script src="js/jquery.slidertron-0.1.js" type="text/javascript" ></script>
<script type="text/javascript">

	$(document).ready(function(){
	
	  $("a.new_window").attr("target", "_blank");
	  
	  //carousel
	  $(".carousel").jCarouselLite({
		  btnNext: ".next",
		  btnPrev: ".prev"
	  });

	  $("a.new_window").attr("target", "_blank");
	  //carousel
	  $(".carousel2").jCarouselLite({
		  btnNext: ".next1",
		  btnPrev: ".prev1"
	  });
	});
		
</script>
<style type="text/css">
@import "slidertron.css";
</style>
</head>
<body id="page1">
<div class="tail-top-left"></div>
<div class="tail-top">
<!-- header -->
	<div id="header">
		<div class="row-1">
			<div class="fleft"><a href="index.php"><img src="images/m01.gif" alt="" /></a></div>
			<div class="fright" >
			
				<ul>
				
                    <?php 
					$pagestatus  =   "";
					checkloginstatus($pagestatus);
					 ?>
                      
				</ul>
				<div id="menuline">
			</div>
		       
			<div id="search">
			<form method="post" name="SearchForm" id="SearchForm" class="SearchForm" action="search.php" onsubmit="return checkform(this);"> 
 
				<fieldset>
                <select name="search_type" id="search_type" value="Please Select">
				
				<option value="1" selected  > Title </option>	
				<option value="2"   > Author </option>	
				<option value="3"   > Keyword </option>	
					
               </select>
				<input type="text" datatype="Require" class="txtFieldMed" name="search_words" id="search_words"size="15" />
				<input type="submit"  id="search-submit" class="btnSubmit"  value="GO" />
				</fieldset>
			</form>
		</div>	
				</div>
				
		

			
			
		</div>
		<div class="row-2">
		
<div id="slideshow">
	<!-- start -->
	<div id="foobar">

		<div id="col2">
			<div class="viewer">
				<div class="reel">
					<div class="slide"><a href="sitemap.html"><img src="images/img04.jpg" width="949" height="273" alt="" /> <span>Lorem Ipsum Dolor Sit Amet.</span>About Us</a></div>
					<div class="slide"><img src="images/img07.jpg" width="949" height="273" alt="" /> <span>Mauris vitae nisl nec metus placerat consectetuer.</span> </div>
					<div class="slide"><img src="images/img08.jpg" width="949" height="273" alt="" /> <span>Nam bibendum dadn nulla tortor elementum ipsum</span> </div>
				</div>
			</div>
		</div>

	</div>
	<script type="text/javascript">

						$('#foobar').slidertron({
							viewerSelector:			'.viewer',
							reelSelector:			'.viewer .reel',
							slidesSelector:			'.viewer .reel .slide',
							navPreviousSelector:	'.previous',
							navNextSelector:		'.next',
							navFirstSelector:		'.first',
							navLastSelector:		'.last'
						});
						
					</script>
	<!-- end -->
</div>
		
		</div>
	</div>
<div id="content">
		<div class="row-1">
			<div class="inside">
				<div class="container">
					<div class="aside">
				
			<h2>Catalog</h2>
			<ul>	 	 
            <?php 
            $cat_array = get_categories();
			display_categories($cat_array);
             ?>
			</ul>
			
	<!--		<ul>
							<li>
								<img src="images/pic1.gif" alt="" /><div class="extra-wrap"><span>Consultation</span>Sed ut perspiciatis unde<a href="#">...</a></div>
							</li>
							<li>
								<img src="images/pic2.gif" alt="" /><div class="extra-wrap"><span>Business Planning</span>Iste natus error sit voluptatem<a href="#">...</a></div>
							</li>
							<li>
								<img src="images/pic3.gif" alt="" /><div class="extra-wrap"><span>Target Marketing</span>Accusantium dolmque ldan<a href="#">...</a></div>
							</li>
							<li>
								<img src="images/pic4.gif" alt="" /><div class="extra-wrap"><span>Market Research</span>Tium totam rem aperiam eaque<a href="#">...</a></div>
							</li>
							<li>
								<img src="images/pic5.gif" alt="" /><div class="extra-wrap"><span>Quick Business Help</span>Ipsa quae ab illo inventore<a href="#">...</a></div>
							</li>
						</ul>*-->
						
<div class="wrapper"></div>
					</div>
					<div class="content">
						<div class="tail-middle">
			<div class="row-2">
				<div class="inside">
					<h3>New Books</h3>
					<div class="carousel-box">
						<div class="prev"><a href="#"><img src="images/prev.png" alt="" /></a></div>
						<div class="next"><a href="#"><img src="images/next.png" alt="" /></a></div>
						<div class="carousel">
							<ul>
								<li>
									<div class="box">
										<div class="left-bot-corner">	
																<div class="inner">	
																<div class="img-box2"><a href="displaybook.php?"><img src="images/book4.jpg" alt="" /></a>
																	<div class="inner">
																		<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																	</div>
																</div>
																</div>
										</div>
									</div>
								</li>
								<li>
									<div class="box">
										<div class="left-bot-corner">
																<div class="inner">
																	<div class="img-box2"><a href="displaybook.php?"><img src="images/book2.jpg" alt="" /></a>
																		<div class="inner">
																			<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																		</div>
																	</div>
																</div>
										</div>
									</div>
								</li>
								<li>
									<div class="box">
										<div class="left-bot-corner">
																<div class="inner">
																	<div class="img-box2"><a href='#'><img src="images/book3.jpg" alt="" /></a>
																		<div class="inner">
																			<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																		</div>
																	</div>
																</div>														
										</div>
									</div>
								</li>
								<li>
									<div class="box">
										<div class="left-bot-corner">
																<div class="inner">
																	<div class="img-box2"><a href='#'><img src="images/book3.jpg" alt="" /></a>
																		<div class="inner">
																			<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																		</div>
																	</div>
																</div>														
										</div>
									</div>
								</li>
							</ul>
						</div>						
					</div>
				</div>
			</div>
            <div class="row-3">
				<div class="inside">
					<h3>Best Sellers</h3>
					<div class="carousel-box">
						<div class="prev1"><a href="#"><img src="images/prev.png" alt="" /></a></div>
						<div class="next1"><a href="#"><img src="images/next.png" alt="" /></a></div>
						<div class="carousel2">
							<ul>
								<li>
									<div class="box">
										<div class="left-bot-corner">	
																<div class="inner">	
																<div class="img-box2"><img src="images/book4.jpg" alt="" />
																	<div class="inner">
																		<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																	</div>
																</div>
																</div>
										</div>
									</div>
								</li>
								<li>
									<div class="box">
										<div class="left-bot-corner">
																<div class="inner">
																	<div class="img-box2"><img src="images/book2.jpg" alt="" />
																		<div class="inner">
																			<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																		</div>
																	</div>
																</div>
										</div>
									</div>
								</li>
								<li>
									<div class="box">
										<div class="left-bot-corner">
																<div class="inner">
																	<div class="img-box2"><a href='#'><img src="images/book3.jpg" alt="" /></a>
																		<div class="inner">
																			<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																		</div>
																	</div>
																</div>														
										</div>
									</div>
								</li>
								<li>
									<div class="box">
										<div class="left-bot-corner">
																<div class="inner">
																	<div class="img-box2"><a href='#'><img src="images/book3.jpg" alt="" /></a>
																		<div class="inner">
																			<h4>Business Plans</h4>
																		<p>Publisher: 天地圖書有限公司 HKD85.00 </p>
																		</div>
																	</div>
																</div>														
										</div>
									</div>
								</li>
							</ul>
						</div>						
					</div>
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
	<div id="footer">
		<div class="footer">© 2010 - 2011 HK Online Book Store. All rights reserved.  service@HKOBS.com<br />
		</div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>