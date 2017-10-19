<?php 
session_start();
if ($_SESSION['level'] == 'user') {
require_once "db_connect.php"; //connection
mysql_select_db("citahati", $koneksi);

$sql = "SELECT * FROM res_item";
$result = mysql_query($sql);

$inv = $_POST['inv'];
$id_item = $_POST['id_item'];
$quantity = $_POST['quantity'];

//PHP verification - the subtotal is counted on the javascript too, this is just to verify
$cek = true;
while (($data=mysql_fetch_array($result)) && ($cek == true))  {
if ($id_item == $data['id_item']) {
		$price=$data['price'];
		$cek=false;
		}
}


$subtotal = $price * $quantity;


$sql = "INSERT INTO `citahati`.`res_transaction_detail` (`inv_no`, `id_item`, `qty`, `subtotal`) 
	VALUES ('$inv', '$id_item', '$quantity', '$subtotal');";
	mysql_query($sql);



echo $price; 

} else {
//echo "unauthorized user";
?>
<center><p>Unauthorized User!</p></center>
<?php
echo ("<META HTTP-EQUIV=Refresh CONTENT=\"3;URL=login.php\">");
}
?>