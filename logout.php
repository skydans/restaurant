<?php 
session_start();

if ($_SESSION['level'] == 'user') {

	require_once "db_connect.php";
	mysql_select_db("citahati", $koneksi);
	
	$id_cashier = $_SESSION['id'];
	
	date_default_timezone_set('Asia/Bangkok');
	$last_login=date('Y-m-d H:i:s');
	
	$remarks = 'logout';
	
	$sql1 = "SELECT no FROM res_cashier";
	$result = mysql_query($sql1);
	while ($data=mysql_fetch_row($result)) {
	$nomor = (int)$data[0];
	}
	$nomor++;
	
	$sql = "INSERT INTO `citahati`.`res_cashier` (`no`, `id_cashier`, `last_login`, `remarks`) 
	VALUES ('$nomor', '$id_cashier', '$last_login', '$remarks');";
	mysql_query($sql);

	
}

session_destroy();
?>
<html>
<head>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
<div align="center" style=" font-family:Tahoma; font-size:14px; ">
<?php
echo "You have logged out";
?>
<br>
<br>
<a href="login.php">Click here to login</a>
</div>
</body>
</html>
