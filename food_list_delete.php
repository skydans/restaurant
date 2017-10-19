<html>
<!-- SESSION -->
<?php

session_start();
if ($_SESSION['level'] == 'admin') {

require_once "db_connect.php"; //connection

$sql = "SELECT * FROM res_item";
$result = mysql_query($sql);

//$username = $_POST['username'];




?>
<body>

<div align="center">

<p align=right style=" font-family:Tahoma; font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>
<!-- SESSION -->
 
<div align="center" style=" font-family:Tahoma;">
<?php
require_once "db_connect.php";
	
	$id=$_GET['id'];
	
	if ($id == "all") {
	
	
	if (isset($_POST['yes'])) {
	
	mysql_select_db("citahati", $koneksi);
	
	
	$sql1 = "SELECT id_item FROM res_item";
	$result = mysql_query($sql1);

	while ($data=mysql_fetch_row($result)) {
	$nomor = $data[0]; // $data[0] is the 0 column order
	$sql = "DELETE FROM `citahati`.`res_item` WHERE `res_item`.`id_item` = '$nomor' ";
	mysql_query($sql);
	}
	
	echo "Delete all successful!"?> <a href="food_list.php">Go back</a> <?php  ;
	
	} else {
	
		if (isset($_POST['no'])) {
		echo "Nothing has been deleted";
		echo ("<META HTTP-EQUIV=Refresh CONTENT=\"1;URL=food_list.php\">");
		} else {
	
		?>
		<form method="POST" action "book_delete.php">
		Confirm delete ALL? <br>
		<input type="submit" name="yes" value="Yes">
		<input type="submit" name="no" value="No">
		</form>
		<?php
	
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	//***********************************************************************************************************
	} else {

	
	if (isset($_POST['yes'])) {
	
	mysql_select_db("citahati", $koneksi);
	
	$sql = "DELETE FROM `citahati`.`res_item` WHERE `res_item`.`id_item` = '$id' "; //since the data type is string (e.g. C001), '' must be added at the beginning and end of the variable
	mysql_query($sql);
	?><br><?php
	
	echo "Delete successful!"?> <a href="food_list.php">Go back</a> <?php  ;
	} else {
	
		if (isset($_POST['no'])) {
		echo "Nothing has been deleted";
		echo ("<META HTTP-EQUIV=Refresh CONTENT=\"1;URL=food_list.php\">");
		} else {
	
		?>
		<form method="POST" action "book_delete.php">
		Confirm delete <?php echo "Item ID ", $id; ?>? <br>
		<input type="submit" name="yes" value="Yes">
		<input type="submit" name="no" value="No">
		</form>
		<?php
	
		}
	}
}	
	mysql_close($koneksi); //close connection to database

// $sql1 = "SELECT * FROM teachers";
// $result = mysql_query($sql1);

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




</div>

</body>
</html>