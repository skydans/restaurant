<?php
$koneksi = mysql_connect('localhost','root','');
if ($koneksi) {
	@mysql_select_db('testing');
} else {
	die('Could\'t create connection');
}


?>