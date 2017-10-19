<html>
<head>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<?php
session_start();
if ($_SESSION['level'] == 'admin') {
?>

<script>
function addData() {
	
	var ajaxRequest; //the variable that makes AJAX possible
	ajaxRequest = new XMLHttpRequest();
	
	
	//alert("test");
	
	ajaxRequest.onreadystatechange = function () {
	if (ajaxRequest.readyState == 4) {
		var ajaxDisplay = document.getElementById('Result');
		
		//
		var buttonDisplay = document.getElementById('button');
		//
		
		if (ajaxDisplay.style.display == 'none') {
			ajaxDisplay.style.display = 'block';
		}
		
		//
		//if (buttonDisplay.style.display == 'block') {
			buttonDisplay.style.display = 'none';
		//}
		//
		
		ajaxDisplay.innerHTML = ajaxRequest.responseText;
	} else {
		var ajaxDisplay = document.getElementById('Result');
		
		//
		var buttonDisplay = document.getElementById('button');
		//
		
		if (ajaxDisplay.style.display == 'none') {
			ajaxDisplay.style.display = 'block';
		}
		
		//
		//if (buttonDisplay.style.display == 'block') {
			buttonDisplay.style.display = 'none';
		//}
		//
		
		ajaxDisplay.innerHTML = "<img src=26.gif>";
		
	}
	}
	
	
	
	var id_item = document.getElementById("id_item").value;
	var item_name = document.getElementById("item_name").value;
	var price = document.getElementById("price").value;
	var remarks = document.getElementById("remarks").value;
	
	
	var queryString = "?id_item=" + id_item + "&item_name=" + item_name + "&price=" + price + "&remarks=" + remarks;
	ajaxRequest.open("GET", "food_list_add_action.php" + queryString, true);
	ajaxRequest.send(null);
}

</script>

</head>


<body>

<p align=right style=" font-family:Tahoma; font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>

 <div align="center">

<center><h1 style=" color:green; font-family:Tahoma; font-size:16px; " >Welcome to add Item ID</h1></center>
<br>
<?php
require_once "db_connect.php";

$sql1 = "SELECT id_item FROM res_item";
$result = mysql_query($sql1);
$cek=true;
$x=1;
$nomor=1;

while (($data=mysql_fetch_row($result)) && ($cek)) {
$nomor = (int)substr($data[0],1,3); //(int)$data[0];
//echo $data[0];



if ($x <> $nomor) {
	$cek=false;
	$nomor=$x-1;
	//echo $nomor; // interestingly the value is different
}
$x++;
$nomor++;
}


$nomor="C".sprintf("%03s",$nomor);


?>


<table border = 0 cellpadding="3" cellspacing"2" style=" font-family:Tahoma; font-size:12px; ">
<tr  style = "color:black">
<td><p>Item ID</p></td>
<td><select id="id_item">
	<option value="<?php echo $nomor; ?>"> <?php echo $nomor; ?> </option>
	
	<option value="0">Last number</option>
	</select>
</td>
</tr>
<tr>
<td><p>Name</p></td>
<td><input type="text" id="item_name" value=""></td>
</tr>
<tr>
<td><p>Price</p></td>
<td><input type="text" id="price" value=""></td>
</tr>
<tr>
<td><p>Remarks</p></td>
<td><input type="text" id="remarks" value=""></td>
</tr>
<tr>
<td></td><td></td><td><input type="button" id="button" value="Submit" onClick = "addData()"></td>
</tr>
</table>
<div id="Result"></div>


<?php
mysql_close($koneksi); //close connection to database



?>
</div>

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
</body>
</html>