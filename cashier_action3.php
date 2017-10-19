<?php 
session_start();
if ($_SESSION['level'] == 'user') {

$total = 0;
$inv_no = $_POST['inv_no'];
$paid = $_POST['paid'];

require_once "db_connect.php"; //connection
mysql_select_db("citahati", $koneksi);

$sql = "SELECT * FROM res_transaction_detail";
$result = mysql_query($sql);

$inv_date = date("Y-m-d");

// PHP verification
while ($data=mysql_fetch_array($result))  {
if ($inv_no == $data['inv_no']) {
		$subtotal=$data['subtotal'];
		$total=$subtotal + $total;
		}
}

if ($total <= $paid) {
$change = $paid - $total;

$sql1 = "INSERT INTO `citahati`.`res_transaction` (`inv_no`, `inv_date`, `total`, `paid`, `change`) 
	VALUES ('$inv_no', '$inv_date', '$total', '$paid', '$change');";
	mysql_query($sql1);
	
} else {

	echo "error";
}

//echo $price; 

} else {
//echo "unauthorized user";
?>
<center><p>Unauthorized User!</p></center>
<?php
echo ("<META HTTP-EQUIV=Refresh CONTENT=\"3;URL=login.php\">");
}
?>