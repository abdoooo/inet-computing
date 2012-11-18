<?php
$db = "studora.comp.polyu.edu.hk/dbms";

$conn = @oci_connect('"11912682t"', "nohopar", $db);

if (!$conn) {
		$err = oci_error();
		echo "Oracle Connect Error,check conn.php <br/>" ;
		echo $err['message'];
		exit;
}

?>
