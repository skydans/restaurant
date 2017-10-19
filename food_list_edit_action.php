<?php
//session
session_start();
if ($_SESSION['level'] == 'admin') {
//end of session
echo "TEST";

require_once "db_connect.php";
mysql_select_db("citahati", $koneksi);

if (isset($_POST['id_item'])) { // capture the 'submit' value from Submit button
	$nomor=$_POST['id_item'];
	$item_name=$_POST['item_name'];
	$price=$_POST['price'];
	$remarks=$_POST['remarks'];
	
	$sql = "UPDATE `citahati`.`res_item` SET `item_name` = '$item_name', `price` = '$price', `remarks` = '$remarks'  WHERE `res_item`.`id_item` = '$nomor';";
	mysql_query($sql);
	
	echo "Edit successful!  "?> <a href="food_list.php">Go back</a> <?php  ;
	
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