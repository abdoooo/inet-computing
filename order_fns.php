<?php
function process_card($card_details) {
  // connect to payment gateway or
  // use gpg to encrypt and mail or
  // store in DB if you really want to

  return true;
}

function insert_order($order_details) {
  // extract order_details out as variables
  extract($order_details);

  // set shipping address same as address
  if((!$ship_name) && (!$ship_address) && (!$ship_city) && (!$ship_country)) {
    $ship_name = $name;
    $ship_address = $address;
    $ship_city = $city;
    $ship_country = $country;
	
  }

  
  
  
  
  
  
 /* $conn = db_connect();

  // we want to insert the order as a transaction
  // start one by turning off autocommit
  $conn->autocommit(FALSE);

  // insert customer address
  $query = "select customerid from customers where
            name = '".$name."' and address = '".$address."'
            and city = '".$city."' and state = '".$state."'
            and zip = '".$zip."' and country = '".$country."'";

  $result = $conn->query($query);

  if($result->num_rows>0) {
    $customer = $result->fetch_object();
    $customerid = $customer->customerid;
  } else {
    $query = "insert into customers values
            ('', '".$name."','".$address."','".$city."','".$state."','".$zip."','".$country."')";
    $result = $conn->query($query);

    if (!$result) {
       return false;
    }
  }
*/
  $customerid = $_SESSION["CUST_ID"]; 

  $date = date('d-M-Y');

  $query = "insert into ORDERS values
            (ORDER_ID.NEXTVAL, '".$_SESSION['total_price']."', to_date( '".$date."', 'dd-mon-yyyy'), '"."Delivering"."', '".$ship_name."', '".$ship_address."', '".$ship_city."', '".$ship_country."', '".$customerid."', '')";

	$conn = db_connect();
    $result = oci_parse($conn,$query);
   
   oci_execute($result); 		
	if (!$result) {
     return false;
	}		
			


	
	  $query = "select ORDER_ID from ORDERS where AMOUNT = ".$_SESSION['total_price']." and INDATE = '".$date."' and ORDER_STAT = 'Delivering' and SHIP_NAME = '".$ship_name."' and SHIP_ADDRESS = '".$ship_address."' and SHIP_CITY = '".$ship_city."' and SHIP_COUNTRY = '".$ship_country."' and CUST_ID = '".$customerid."'";
			   
	$conn = db_connect();
    $result = oci_parse($conn,$query);
			   
    oci_execute($result); 		
	if (!$result) {
     return false;
	}

	while ($order = oci_fetch_object($result)) {
		$orderid = $order->ORDER_ID; 
	}
	
	$query = "insert into TRACKING values (TRACKING_ID.NEXTVAL, 'HK', '".$orderid."' ,to_date( '".$date."', 'dd-mon-yy'))";

    $result = oci_parse($conn,$query);
			   
    oci_execute($result);
	
    if(!$result) {
      return false;
    }
	
	$_SESSION['for_email_oid']=$orderid;

  /*if($result->num_rows>0) {
    $order = $result->fetch_object();
    $orderid = $order->orderid;
  } else {
    return false;
  }*/

  // insert each book
  foreach($_SESSION['cart'] as $isbn => $quantity) {
  
    $detail = get_book_details($isbn);
    $query = "delete from ORDER_ITEMS where ORDER_ID = '".$orderid."' and ISBN = '".$isbn."'";
			  
	$conn = db_connect();
    $result = oci_parse($conn,$query);
			   
    oci_execute($result);
	
	
    $query = "insert into ORDER_ITEMS values ('".$orderid."', '".$isbn."', '".$detail['PRICE']."', '".$quantity."')";
    

    $result = oci_parse($conn,$query);
			   
    oci_execute($result);
	
    if(!$result) {
      return false;
    }
  }

  // end transaction
oci_free_statement($result);
oci_close($conn);

  return $orderid;
}

?>
