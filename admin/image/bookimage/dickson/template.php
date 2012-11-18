<?php
 require_once("conn_fun.php");
 require_once("cust_check_login.php");
					
function basetemplate_head()
{
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
</head>
<?php	}


function basetemplate_fullbody($pagestatus)
{ 

?>
<body id="page1">
<div class="tail-top">
<!-- header -->
	<div id="headernon">
		<div class="row-1">
			<div class="fleft"><a href="index.php"><img src="images/m01.gif" alt="" /></a></div>
			<div class="fright" >
			
				<ul>
					<?php checkloginstatus($pagestatus); ?>			
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
		
	</div>
<div id="content">
		<div class="row-1">
			<div class="inside">
				<div class="container">
                
<?php	}

function tempforinvoice()
{ ?>

<body id="page1">
<div class="tail-top">
<!-- header -->
	<div id="headernon">
		<div class="row-1">
			<div class="fleft"><a href="index.php"><img src="images/m01.gif" alt="" /></a></div>
			<div class="fright" >
                
				<div id="menuline">
			</div>
		       
				</div>	
			
		</div>
		
	</div>
<div id="content">
		<div class="row-1">
			<div class="inside">
				<div class="container">


<?php
}



function footer()
{ ?>

					<div class="clear"></div>
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
 
 

<?php	}
?>



