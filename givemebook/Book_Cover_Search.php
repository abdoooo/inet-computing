
<html>
  <head>
    <title>Books API Example</title>
	
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	
	
	<script type="text/javascript">
		
		function search(){
			
			var isbn = document.getElementById("formCover").isbn.value;
			//alert("Das ist die ISBN " +isbn);

			//var result = "http://covers.openlibrary.org/b/isbn/"+isbn+"-M.jpg";
			
			var test = '<img src="http://covers.openlibrary.org/b/isbn/'+isbn+'-M.jpg">'
			
 		    document.getElementById("image").innerHTML = test; 
		}
	
	</script>
	
	
	
  </head>
  <body>
  
  
  <h2>For Testing the Function use the following ISBNS </h2>
  
  <ol>
	<li>JAVA: 0596009208	</li> 	
	<li>PHP: 0071508546 </li>
	<li>Simposns: 0007234058 </li>
  </ol>
  
  </br>
  
  
  
  
  
  
	<form id="formCover" >
		<input type="text" name="isbn"> Your Book's ISBN </input>
	</form>
	<button onclick="search()"> Search </button>	
	<p id="image"> Hier sollte was stehen</p> 
 
  </body>
</html>

