<?php
  include_once("template.php");
  require_once("conn_fun.php");
?>

<? 
$sword = CCGetFromPost("search_words", '');
$stype = CCGetFromPost("search_type", '');

$sword = strtoupper($sword);

$arr = array_slice(explode(" ", $sword), 0,  10);


if ($stype==1)
{ $scolumn = "TITLE";}
else if ($stype==2)
{ $scolumn = "AUTHOR";}
else if ($stype==3)
{ $scolumn = "DESCR ";}

$k = 0;
$statement = "";
while ($k < count($arr))
{
$statement .=' UPPER('.$scolumn.') like \'%'. $arr[$k] .'%\' OR ';
$k++;
}

$statement = rtrim($statement, " OR ");

$book_search='select * from BOOKS where '.$statement;

//echo "[[".$book_search."]]]";

$stmt = oci_parse($conn,$book_search);
 

$r = oci_execute($stmt);
$pagestatus ="";
 basetemplate_head();
 basetemplate_fullbody($pagestatus);
 ?>
<!----BOOKS--->
<h3>Search Result</h3>
<table border="0">
  <tr>
   <td>BOOK </td>
   <td>TITLE </td>
    <td>AUTHOR </td>
	<td>DESCR </td>

  </tr>
<?php
//$stmt = oci_parse($conn,'select * from BOOKS');
//$r = oci_execute($stmt);



while( $result=oci_fetch_array($stmt) ){
	echo '<tr>';
	echo '<td><a href="displaybook.php?isbn='.$result['ISBN'].'">
	<img src="bookimage/'.$result['IMG'].'"width=250 height=200><a></td>';
	echo '<td><a href="displaybook.php?isbn='.$result['ISBN'].'">'.$result['TITLE'].'</a></td>';
	echo '<td>'.$result['AUTHOR'].'</td>';
	echo '<td>'.$result['DESCR'].'</td>';
/*	echo '<td>'.$result['ISBN'].'</td>';
	echo '<td>'.$result['AUTHOR'].'</td>';
	echo '<td>'.$result['TITLE'].'</td>';
	echo '<td>'.$result['CAT_ID'].'</td>';
	echo '<td>'.$result['PRICE'].'</td>';
	echo '<td>'.$result['DESCR'].'</td>';
	echo '<td>'.$result['DIST'].'</td>';
	echo '<td><img src="../admin/image/bookimage/'.$result['IMG'].'"width=250 height=200></td>';
	echo '<td>'.$result['AVAB'].'</td>';
	echo '<td>'.$result['INDATE'].'</td>';
	echo '<td>'.$result['PUBDATE'].'</td>';
	echo '<td>'.$result['QTY'].'</td>';*/
	echo '<tr>';
}

/*
if (!oci_fetch_array($stmt))
{
echo '<td colspan="12"> No result match. May be find another word. </td>';
}
else 
{}*/
?>
</table>

<?php
footer(); 
?>
 
 
 
 
 
 
 
<?php
//CCGetFromPost @0-393586D2
function CCGetFromPost($parameter_name, $default_value = "")
{
    return isset($_POST[$parameter_name]) ? CCStrip($_POST[$parameter_name]) : $default_value;
}
//End CCGetFromPost

//CCStrip @0-E1370054
function CCStrip($value)
{
  if(get_magic_quotes_gpc() != 0)
  {
    if(is_array($value))  
      foreach($value as $key=>$val)
        $value[$key] = stripslashes($val);
    else
      $value = stripslashes($value);
  }
  return $value;
}
//End CCStrip
?>
 
 
 
 
 
 
 
 
 