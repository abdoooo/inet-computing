
<script language="javascript">
var submission = 0;

	function con() {
		var r=confirm("Do you want to delete this book?");
		if (r==false)
		  {
		  	 return false;
		  }

}

	function checkinfo() {
		var bookname = document.getElementById('bookname');
		var info = document.getElementById('info');
		var cat = document.getElementById('cat');
		var pri = document.getElementById('pri');
		var word = "";

		if(bookname.value == ""){
		 word = "\n-Book name";
		}
		if(info.value == ""){
		 word = word +"\n-Information";
		}
		if(pri.value == ""){
		 word = word + "\n-Price";
		}
		if(cat.value == ""){
		 word = word + "\n-Category";
		}
		if(word != ""){
		alert("You must fill in the following fields. " + word);
		submission=0;
		return false;
		}else{
			submission=1;
		}
}

function submis() {
 if(submission == 0)
	return false;
}

function checkISBN(){
	var isbn = document.getElementById('isbn').value;		
	var result = '<img src="http://covers.openlibrary.org/b/isbn/'+isbn+'-M.jpg">';
	
	if(isbn != ""){
		document.getElementById('image_h').value = result;
	}
	
	document.getElementById('file').style.visibility = 'hidden'; 
	document.getElementById("image").innerHTML = result;
}

function showfile(){
document.getElementById('file').style.visibility = 'visible';
document.getElementById('image_h').value = "";
document.getElementById("image").innerHTML = "";
}

</script>

<div class=container>

    <form enctype="multipart/form-data" method="post" action="index.php?postbook=1<?php if(isset($_GET['editbook'])) echo"&editbook=$bookid"; ?>" class="signin" onSubmit="return submis();">
        <table align="center" width="50%">
            <tr><td colspan=2>
            <legend><?php if(isset($_GET['editbook'])) echo "Update Book Information"; else echo "Post Book";?></legend>
            </td></tr>
            
            <tr><td width="30%"><label>*Book Name</label></td>
            <td><input id="bookname" name="bookname" class="span3" type="text" placeholder="Book name" value="<?php if(isset($_GET['editbook'])) echo"$nam"; ?>"></td></tr>
            
            <tr><td><label>ISBN</label></td>
            <td><input id="isbn" name="isbn" class="span3" type="text" placeholder="ISBN" value="<?php if(isset($_GET['editbook'])) echo"$cod"; ?>"></td></tr>
            
            <tr><td><label>*Price</label></td>
            <td><div class="input-prepend input-append">
              <span class="add-on">$</span>
              <input id="pri" name="pri" class="span1" type="text" placeholder="Price" value="<?php if(isset($_GET['editbook'])) echo"$price"; ?>">
              <span class="add-on">.00</span>
            </div>
            </td></tr>
            
            
            <tr><td><label>Author</label></td>
            <td><input id="auth" name="auth" class="span3" type="text" placeholder="Author" value="<?php if(isset($_GET['editbook'])) echo"$aut"; ?>"></td></tr>
            
                <tr><td><label>Publisher</label></td>
            <td><input id="pub" name="pub" class="span3" type="text" placeholder="Publisher" value="<?php if(isset($_GET['editbook'])) echo"$pub"; ?>"></td></tr>
        
            <tr><td>*Information:</td><td><textarea id="info" name="info" rows="3"><?php if(isset($_GET['editbook'])) echo"$inf"; ?></textarea></td></tr>
            
            <tr><td>*Category</td>
            <td><Select name="cat" id="cat">
                <option value="">-------</option>
                <option value="eng" <?php if(isset($_GET['editbook'])){ if($cata == "eng") echo"selected='selected'";} ?>>English</option>
                <option value="lan" <?php if(isset($_GET['editbook'])){ if($cata == "lan") echo"selected='selected'";} ?>>Languages</option>
                <option value="his" <?php if(isset($_GET['editbook'])){ if($cata == "his") echo"selected='selected'";} ?>>History</option>
                <option value="acc" <?php if(isset($_GET['editbook'])){ if($cata == "acc") echo"selected='selected'";} ?>>Accounting</option>
                <option value="sci" <?php if(isset($_GET['editbook'])){ if($cata == "sci") echo"selected='selected'";} ?>>Science</option>
                <option value="com" <?php if(isset($_GET['editbook'])){ if($cata == "com") echo"selected='selected'";} ?>>Computer</option>
                <option value="engi" <?php if(isset($_GET['editbook'])){ if($cata == "engi") echo"selected='selected'";} ?>>Engineering</option>
                <option value="mus" <?php if(isset($_GET['editbook'])){ if($cata == "mus") echo"selected='selected'";} ?>>Music</option>
                <option value="art" <?php if(isset($_GET['editbook'])){ if($cata == "art") echo"selected='selected'";} ?>>Art</option>
                <option value="oth" <?php if(isset($_GET['editbook'])){ if($cata == "oth") echo"selected='selected'";} ?>>Other</option>
            </Select>
            <br /></td></tr>
            
            
            <tr><td>Book Cover<div id=usecover></div></td><td>
        <?php 
        if(isset($_GET['editbook'])){
        if(substr($pic,0,4) == "<img")
        $imgtext = "$pic";	
        else
        $imgtext = "<img width=\"170\" src=\"./bookimg/$pic\" />";  
        }
        ?>
        
            <button id="usefile" class="btn btn-primary" onclick="showfile()">Use local file</button>
            <button onclick="checkISBN()" class="btn btn-warning">Find Cover use ISBN</button>
            <input type="hidden" id="image_h" name="image_h" value="">
            <input id="file" type="file" name="file" /><p id=image><?php if(isset($_GET['editbook'])) echo "$imgtext";?></p></td></tr>
                <tr><td></td><td><br>
            <button type="submit" class="btn btn-primary" onclick="checkinfo()">Submit</button> 
            <button type="button" class="btn">Cancel</button></td></tr>
        </table>
    </form>

</div>