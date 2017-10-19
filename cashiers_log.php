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

$sql = "SELECT res_user.username, res_user.cashier_name, res_cashier.last_login, res_cashier.remarks 
FROM res_user INNER JOIN res_cashier ON res_user.username=res_cashier.id_cashier 
ORDER BY res_cashier.id_cashier";
$result = mysql_query($sql);

?>


<div align="center">

<p align=right style=" font-family:Tahoma; font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>
 
 <div class="menu3">
    <a href="admin_menu.php" >Home</a>
    <a href="food_list.php" >Food List</a>
    <a href="transaction_list.php" >Transaction Details</a>
    <a href="cashiers_log.php" class="current">Cashiers Log</a>
    <a href="report.php" >Report</a>
</div>
<div class="menu3sub"> </div>



<br>
<h3 style="color:orange; font-family:Tahoma;">Cashiers Log</h3>
<table align=center border = 0 cellpadding="3" cellspacing"2" bgcolor = "#cccccc" style=" font-family:Tahoma; font-size:12px; ">
<tr bgcolor="#949494" style = "color:#ffffff">
<td>No.</td>
<td>ID Cashier</td>
<td>Name</td>
<td>Date and time</td>
<td>Remarks</td>

</tr>

<?php
$i = 0;
$i2 = 0;
while ($data=mysql_fetch_array($result)) {
$i++;

if ( $i %2 == 0){?> <tr bgcolor="#4aced0"> <?php } else {  ?> <tr bgcolor="#a6edee"> <?php } ?>
<td><?php echo $i ; ?></td>
<td bgcolor=white><?php echo $data['username']; ?></td>
<td><?php echo $data['cashier_name']; ?></td>
<td><?php echo $data['last_login']; ?></td>
<td><?php echo $data['remarks']; ?></td>

</tr>
<?php
}
?>
<tr>
<td>Total items: </td>
<td><?php echo $i; ?></td>
<td>Delete all: </td>
<td><a href="cashiers_log_delete.php"><img border="0" alt="Delete" src="del.png" width="20" height="20"></a></td>
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



