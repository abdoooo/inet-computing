<?php
include ('connectdb.php');
$sql = "SELECT `name` FROM `bookpost`";
$data = mysql_query($sql);

$output = "";
while($row = mysql_fetch_array($data)){
$output .= "\"";
$output .= $row['name'];
$output .= "\",";
} 

$output = rtrim($output, "\,");

$myFile = "searchdata.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $output);
fclose($fh);

echo "Updated the search Data<br>";
?>

<?php include ('searchdata.txt'); ?>
<br><input type="button" value="Back" onclick="history.back()">