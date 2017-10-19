<?php

//session
session_start();
if ($_SESSION['level'] == 'admin') {
//end of session

require_once "db_connect.php";
if (isset($_GET['id_item'])) { // capture the 'submit' value from Submit button
	$nomor=$_GET['id_item'];
	$item_name=$_GET['item_name'];
	$price= $_GET['price'];
	$remarks=$_GET['remarks'];
	
	
	mysql_select_db("citahati", $koneksi);
	
	if ($nomor == '0') {
	
	
	$sql1 = "SELECT id_item FROM res_item";
	$result = mysql_query($sql1);
	while ($data=mysql_fetch_row($result)) {
	$nomor = (int)substr($data[0],1,3);
	}
	$nomor++;
	echo $nomor;
	$nomor="C".sprintf("%03s",$nomor);
	echo $nomor;

	
	
	$sql = "INSERT INTO `citahati`.`res_item` (`id_item`, `item_name`, `price`, `remarks`) 
	VALUES ('$nomor', '$item_name', '$price', '$remarks');";
	mysql_query($sql);
	
	} else {
	
	$sql = "INSERT INTO `citahati`.`res_item` (`id_item`, `item_name`, `price`, `remarks`) 
	VALUES ('$nomor', '$item_name', '$price', '$remarks');";
	mysql_query($sql);
	}
	
	echo "Insert successful! "?> <a href="food_list.php?last=<?php echo $nomor; ?>">Go back</a> <?php ;
	
}

?>
<!--SESSION-->
<?php 

} else {
//echo "unauthorized user";
?>
<center><p>Unauthorized User!</p></center>



<?php
echo ("<META HTTP-EQUIV=Refresh CONTENT=\"2;URL=login.php\">");

} 


?>
<!--SESSION-->
<?php

?>