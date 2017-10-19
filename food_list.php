<html>
<head>

<title>Restaurant</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/css-menu.css" media="screen" type="text/css" />
</head>

<body>

<?php
session_start();
if ($_SESSION['level'] == 'admin') {

require_once "db_connect.php"; //connection

$sql = "SELECT * FROM res_item";
$result = mysql_query($sql);

//$username = $_POST['username'];




?>


<div align="center">

<p align=right style=" font-family:Tahoma; font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>
 
 <div class="menu3">
    <a href="admin_menu.php" >Home</a>
    <a href="food_list.php" class="current">Food List</a>
    <a href="transaction_list.php" >Transaction Details</a>
    <a href="cashiers_log.php">Cashiers Log</a>
    <a href="report.php" >Report</a>
</div>
<div class="menu3sub"> </div>



<br>
<h3 style="color:orange; font-family:Tahoma;">Food List</h3>
<table align=center border = 0 cellpadding="3" cellspacing"2" bgcolor = "#cccccc" style=" font-family:Tahoma; font-size:12px; ">
<tr bgcolor="#949494" style = "color:#ffffff">
<td>No.</td>
<td>ID Item</td>
<td>Item Name</td>
<td>Selling Price</td>
<td>Remarks</td>

<td align=center><a href="food_list_add.php"><img border="0" alt="Add" src="add.png" width="20" height="20" ></td>

</tr>

<?php
$i = 0;
$i2 = 0;
while ($data=mysql_fetch_array($result)) {
$i++;

if ( $i %2 == 0){?> <tr bgcolor="#4aced0"> <?php } else {  ?> <tr bgcolor="#a6edee"> <?php } ?>
<td><?php echo $i ; ?></td>
<td bgcolor=white><?php echo $data['id_item']; ?></td>
<td><?php echo $data['item_name']; ?></td>
<td><?php echo "Rp. ".(number_format($data['price'])); ?></td>
<td><?php echo $data['remarks']; ?></td>
<td>

    <a href="food_list_edit.php?ids=<?php echo $data['id_item']; ?>"><img border="0" alt="Edit" src="edit.png" width="20" height="20"></a>
    <a href="food_list_delete.php?id=<?php echo $data['id_item']; ?>"><img border="0" alt="Delete" src="del.png" width="20" height="20"></a></td>
</tr>
<?php
}
?>
<tr>
<td>Total items: </td>
<td><?php echo $i; ?></td>
<td>Delete all: </td>
<td><a href="food_list_delete.php?id=all"><img border="0" alt="Delete" src="del.png" width="20" height="20"></a></td>
<?php if (isset($_GET['last'])) { ?>
<td>Last item added: </td>
<td> <?php echo $_GET['last']; }?> </td>
</tr>
</table>




</div>

<?php } else {
//echo "unauthorized user";
?>
<center><p>Unauthorized User!</p></center>



<?php
echo ("<META HTTP-EQUIV=Refresh CONTENT=\"3;URL=login.php\">");

} 


?>
</body>

</html>



