<?php
$koneksi = mysql_connect('localhost','root','');
if ($koneksi) {
	@mysql_select_db('citahati');
} else {
	die('Could\'t create connection');
}


?>