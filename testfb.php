<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>



<html>
    <head>
      <title>My Great Web page</title>
    </head>
    <body>
       <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo curPageURL(); ?>"
        scrolling="no" frameborder="0"
        style="border:none; width:450px; height:80px"></iframe>
    </body>
 </html>