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

$sql = "SELECT * FROM res_transaction";
$result = mysql_query($sql);

//$username = $_POST['username'];




?>


<div align="center">

<p align=right style=" font-family:Tahoma; font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>
 
 <div class="menu3">
    <a href="admin_menu.php">Home</a>
    <a href="food_list.php">Food List</a>
    <a href="transaction_list.php">Transaction</a>
    <a href="cashiers_log.php">Cashiers Log</a>
    <a href="report.php" class="current">Report</a>
</div>
<div class="menu3sub"> </div>



<br>
<h3 style="color:orange; font-family:Tahoma;">Report</h3>
<table align=center border = 0 cellpadding="3" cellspacing"2" bgcolor = "#cccccc" style=" font-family:Tahoma; font-size:12px; ">
<tr bgcolor="#949494" style = "color:#ffffff">
<td>Invoice No.</td>
<td>Invoice Date</td>
<td>Total</td>
<td>Paid</td>
<td>Change</td>

</tr>

<?php
$i = 0;
$i2 = 0;
while ($data=mysql_fetch_array($result)) {
$i++;

if ( $i %2 == 0){?> <tr bgcolor="#4aced0"> <?php } else {  ?> <tr bgcolor="#a6edee"> <?php } ?>

<td bgcolor=white><?php echo $data['inv_no']; ?></td>
<td><?php echo $data['inv_date']; ?></td>
<td><?php echo "Rp. ".(number_format($data['total'])); ?></td>
<td><?php echo "Rp. ".(number_format($data['paid'])); ?></td>
<td><?php echo "Rp. ".(number_format($data['change'])); ?></td>

<?php
}
?>
<tr>
<td>Total items: </td>
<td><?php echo $i; ?></td>
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



