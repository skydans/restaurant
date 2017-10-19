<?php

session_start();

require_once "db_connect.php";
if (isset($_POST['user'])) { // capture the 'submit' value from Submit button
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	
	mysql_select_db("citahati", $koneksi);
	
	$sql1 = "SELECT * FROM res_user";
	$result = mysql_query($sql1);
	
	$cek = false;
	while ($data=mysql_fetch_array($result)) {
		if (($username == $data['username']) && ($password == $data['password'])) {
		$_SESSION['id']=$username;
		$_SESSION['level'] = $data['level'];
		$cek = true;
		}
	}
	
	if ($cek == false) {

	echo "Login Error!";
	
	
	} else {
		if ($_SESSION['level'] == 'user') {

			
		$id_cashier = $_SESSION['id'];
		
		date_default_timezone_set('Asia/Bangkok');
		$last_login=date('Y-m-d H:i:s');
		
		$remarks = 'login';
		
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
	
	
		switch ($_SESSION['level']) {
		case "admin": echo ("admin_menu.php"); break;
		case "user": echo ("cashier.php"); break;
		}
	}

}
?>