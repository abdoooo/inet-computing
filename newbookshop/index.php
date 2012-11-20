<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Magnetic 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120825

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Your Bookshop</title>
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery/jquery.gallerax-0.2.js"></script>
<style type="text/css">
@import "gallery.css";
</style>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#"><img src="images/BookShopBanner.png"   alt="" /></a></h1>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li class="first"><a href="#">Home</a></li>
			<li class="mid"><a href="#">Book</a></li>
			<li class="mid"><a href="#">News</a></li>
			<li class="mid"><a href="#">About</a></li>
			<li class="mid"><a href="#">Links</a></li>
			<li class="last"><a href="#">Contact</a></li>
		</ul>
	</div>
	<div id="banner"><img src="images/sub_banner.png" width="1000" height="361" alt="" /></div>
	<div id="welcome">
		<h2 class="title"><a href="#"><img src="images/sign.png"   alt="" /> Welcome to Bookshop</a></h2>
		<div class="entry">
		</div>
        
       
        <div id="page">
		<div id="content">
			<div class="post">
				<div class="entry">
					<p>What is Book?<br />
                    A book is a set of written, printed, illustrated, or blank sheets, made of ink, paper, parchment, or other materials, usually fastened together to hinge at one side. A single sheet within a book is called a leaf, and each side of a leaf is called a page. A book produced in electronic format is known as an electronic book (e-book).<br />
Books may also refer to works of literature, or a main division of such a work. In library and information science, a book is called a monograph, to distinguish it from serial periodicals such as magazines, journals or newspapers. The body of all written works including books is literature. In novels and sometimes other types of books (for example, biographies), a book may be divided into several large sections, also called books (Book 1, Book 2, Book 3, and so on). A lover of books is usually referred to as a bibliophile or, more informally, a bookworm — an avid reader of books.<br /></p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li><h2>Category:</h2>
                <?php
  include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  // get categories out of database
  $cat_array = get_categories();

  // display as links to cat pages
  display_categories($cat_array);

  // if logged in as admin, show add, delete, edit cat links
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  do_html_footer();
?>
                
                	</li>
			</ul>

		</div>
	</div>
	<!-- end #page --> 
</div>
       
       
        
        
        
        
        
	</div>
	<div id="three-columns">
		<div id="column1">
			<h2>Bookshop News</h2>
			<p>News</p>
			<p><a href="#" class="link-style">Read More</a></p>
		</div>
		<div id="column2">
			<h2>Top Book</h2>
			<p>Top</p>
			<p><a href="#" class="link-style">Read More</a></p>
		</div>
		<div id="column3">
			<h2>New Book</h2>
			<p>New.</p>
			<p><a href="#" class="link-style">Read More</a></p>
		</div>
	</div>
    
    
    
    
    
    
    
    
    
    

    
	<div id="two-columns">
		<div id="col1">
			<h2>About Us</h2>
			<p>Member List <br />
			</p>
		</div>
		<div id="col2"><img src="images/pics02.jpg" alt="" width="240" height="180" class="image-style" />
		</div>
	</div>
	
<div id="footer">
	<p>Copyright (c) 2012 bookshop.com. All rights reserved.</p>
</div>
<!-- end #footer -->
</body>
</html>
