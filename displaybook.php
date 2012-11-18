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
			
			<h2>Best Sales</h2>
			<ul>	 	              
            	<?php best_sales_in_detail(); ?> 
				<!--<li><div class="extra-wrap"><a href="book.html"><span>1. Tin Tin </span><img src="images/book5.jpg" width="50" height="100" alt="" /></a></div></li>
				<li><a href="book.html"><span>2. ABC </span><img src="images/book4.jpg" width="50" height="100" alt="" /></a></li>-->
			</ul>
			
					
<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#ok_button").click(function(){ 
		var cust_id = $("#CUST_ID").val();
		var isbn = $("#isbn").val();
		var comment = $("#comment").val();
		
		var msgbox = $("#status");

		if( comment.length >=3){
			$("#status").html('<img src="img/loader.gif" align="absmiddle">&nbsp;Please waiting...');
			
			$.ajax({  
			type: "POST",
			url: "ajax/cust_comment_ajax.php",
			data:"progressID=new&cust_id="+cust_id+"&isbn="+isbn+"&comment="+comment,
			
			 
			success: function(msg){
				$("#status").ajaxComplete(function(event, request){
					if(msg == 'OK'){
						alert("Thanks your comment");
						 /*msgbox.html('<img src="img/yes.png" align="absmiddle"> <font color="Green">Thanks your comment </font>  ');*/
						location.reload();

					}else{
						msgbox.html(msg);

					}
				});
			} 
  			}); 
		}
	return false;
	});



});
</script>
						
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
					
					//show comment start
					$sql='select C2.NAME, C1.content from comment_table C1, CUSTOMERS C2 where C1.CUST_ID=C2.CUST_ID and ISBN='.$isbn.'order by COM_ID desc';
					$stmt = oci_parse($conn,$sql);
					oci_execute($stmt);
					echo '<h3>Customers Comment</h3>';
					while( $result=oci_fetch_array($stmt) ){
						
						echo '<div id="com_main">';
						echo '<li class="com_box">';
						echo '<span class="com_name">'.$result['NAME'].'&nbsp;&nbsp;said:</span> <br />';
						echo $result['CONTENT'];
						echo '</div>';
					}
					//shwo comment end
					
  					
  					?>

<?php if($_SESSION["CUST_ID"]!=null){?>
 <form>   
    <input type="hidden" value=<?php echo $_SESSION["CUST_ID"]; ?>  id="CUST_ID"/>
    
    <input type="hidden"  name="name" id="name" value=<?php echo $_SESSION["NAME"]; ?>>
	<input type="hidden"  name="isbn" id="isbn" value='<?php echo $isbn;?>'>
    Comment:<br/><textarea name="comment" cols="60" rows="10" id="comment"></textarea><p/>

    <input type="submit" id="ok_button" value="OK">

</form>
<?php } ?>
<span id="status" />
					
					</div>
			</div>
            
		</div>

					</div>


<?php
footer(); 
?>