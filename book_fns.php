<?php
function calculate_shipping_cost() {
  // as we are shipping products all over the world
  // via teleportation, shipping is fixed
  return 20.00;
}

function get_categories() {
   // query database for a list of categories
   $conn = db_connect();
   $result = oci_parse($conn,'select CAT_ID, CAT_NAME from CATEGORIES');
   oci_execute($result); 
   if (!$result) {
     return false;
   }
      
/*   $num_cats = oci_num_rows($result);
   if ($num_cats == 0) {
      return false;
   }*/
   
   $result = db_result_to_array($result);
   return $result;
  
 /*  mysql
   $query = "select catid, catname from categories";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;*/
}



function get_category_name($catid) {
   // query database for the name for a category id
   $conn = db_connect();
   $result = oci_parse($conn,"select CAT_NAME from CATEGORIES where CAT_ID='".$catid."'");
   
   oci_execute($result); 
   
   if (!$result) {
     return false;
   }
  
  
 
  while ($row = oci_fetch_object($result)) {
    // Use upper case attribute names for each standard Oracle column
 return $row->CAT_NAME;
}
  
  
/*  mysql
   $conn = db_connect();
   $query = "select catname from categories
             where catid = '".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->catname;*/
}


function get_books($catid) {
   // query database for the books in a category
  if (!isset($catid)) {
     return false;
   }

   $conn = db_connect();
   $result = oci_parse($conn,"select * from BOOKS where CAT_ID = '".$catid."'");
   oci_execute($result); 
   if (!$result) {
     return false;
   }
   
   $result = db_result_to_array($result);
   return $result;
}

function get_book_details($isbn) {
  // query database for all details for a particular book
  if (!isset($isbn)) {
     return false;
  }
   $conn = db_connect();
   $result = oci_parse($conn,"select * from BOOKS where ISBN='".$isbn."'");
   oci_execute($result); 
   if (!$result) {
     return false;
   }
  
 while ($row = oci_fetch_assoc($result)) {
 return $row;
 } 
 

}




function calculate_price($cart) {
  // sum total price for all items in shopping cart
  $price = 0.0;
  
  if(is_array($cart)) {
    $conn = db_connect();
    
	foreach($cart as $isbn => $qty) {
		   $result = oci_parse($conn,"select * from BOOKS where ISBN='".$isbn."'");
   		   oci_execute($result); 

      if ($result) {
 			while ($item = oci_fetch_object($result)) {
		 		$item_price = $item->PRICE;
				$price +=$item_price*$qty;
        /*$item = $result->fetch_object();
        $item_price = $item->price;
        $price +=$item_price*$qty;*/
      }
    }
  }
  return $price;
}
}

function calculate_items($cart) {
  // sum total items in shopping cart
  $items = 0;
  if(is_array($cart))   {
    foreach($cart as $isbn => $qty) {
      $items += $qty;
    }
  }
  return $items;
}

?>
