<html>
<head>

<title>Admin Page - Restaurant</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/css-menu.css" media="screen" type="text/css" />
</head>

<body>

<?php
session_start();
if ($_SESSION['level'] == 'admin') {

require_once "db_connect.php"; //connection

date_default_timezone_set('Asia/Bangkok');

//$username = $_POST['username'];




?>


<div align="center">

<p align=right style=" font-family:Tahoma; font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>
 
 <div class="menu3">
    <a href="admin_menu.php" class="current">Home</a>
    <a href="food_list.php">Food List</a>
    <a href="transaction_list.php" >Transaction Details</a>
    <a href="cashiers_log.php">Cashiers Log</a>
    <a href="report.php" >Report</a>
</div>
<div class="menu3sub"> </div>



<br>

<table align=center border = 0 cellpadding="3" cellspacing"2" bgcolor = "#cccccc" style=" font-family:Tahoma; font-size:12px; ">
<tr bgcolor="#949494" style = "color:#ffffff">
<td>Date</td>
<td>No. of invoice</td>
<td>Last cashier login</td>



</tr>

<?php
$i = 0;
$no_invoice = 0;
$last_cashier = 'unknown';


$sql = "SELECT * FROM res_transaction";
$result = mysql_query($sql);

while ($data=mysql_fetch_array($result)) {
$no_invoice++;
}
//
$sql1 = "SELECT * FROM res_cashier";
$result1 = mysql_query($sql1);

while ($data1=mysql_fetch_array($result1)) {
$last_cashier = $data1['id_cashier'];
}

$i++;
?>
<tr bgcolor="#4aced0">
<td><?php echo date("F j, Y"); ?></td>
<td><?php echo $no_invoice; ?></td>
<td><?php echo $last_cashier; ?></td>


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



