<?php 
session_start();
if ($_SESSION['level'] == 'user') {
require_once "db_connect.php"; //connection
mysql_select_db("citahati", $koneksi);

$sql = "SELECT * FROM res_item";
$result = mysql_query($sql);

$id_item = $_POST['id_item'];
$cek = true;
while (($data=mysql_fetch_array($result)) && ($cek == true))  {
if ($id_item == $data['id_item']) {
		$price=$data['price'];
		$cek=false;
		}
}
echo $price; 

} else {
//echo "unauthorized user";
?>
<center><p>Unauthorized User!</p></center>
<?php
echo ("<META HTTP-EQUIV=Refresh CONTENT=\"3;URL=login.php\">");
}
?>