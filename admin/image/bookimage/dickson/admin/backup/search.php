<?php
?>

<form method="post" name="SearchForm" id="SearchForm" class="SearchForm" action="search_step2.php" onsubmit="return checkform(this);"> 
 
 <tr>
    <td>
        
		Search <span class="required">*</span><br />
		<select name="search_type" id="search_type" value="Please Select">
				
				<option value="1" selected  > Title </option>	
				<option value="2"   > Author </option>	
				<option value="3"   > Keyword </option>	
					
        </select>
		
		
        <input type="text" datatype="Require" class="txtFieldMed" name="search_words" id="search_words">
		
		<input type="submit" value="Enter" class="btnSubmit" />
    </td>
</tr>
 
 </table >
</form>