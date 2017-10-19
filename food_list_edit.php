<html>
<head>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

<script>

<?php
$nomor=$_GET['ids'];
?>
function addData() {
	
	var ajaxRequest; //the variable that makes AJAX possible
	ajaxRequest = new XMLHttpRequest();
	
	
	
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
		
		
		document.getElementById('item_name').disabled = true;
		document.getElementById('price').disabled = true;
		document.getElementById('remarks').disabled = true;
		
		alert("test");
		
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
	
	
	
		
	var id_item = '<?php echo $nomor; ?>';
	var item_name = document.getElementById("item_name").value;
	var price = document.getElementById("price").value;
	var remarks = document.getElementById("remarks").value;
	
	
	var queryString = "id_item=" + id_item +  "&item_name=" + item_name + "&price=" + price + "&remarks=" + remarks;
	ajaxRequest.open("POST", "food_list_edit_action.php", true);
	ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	
	

	
	
}

</script>

</head>

<?php
session_start();
if ($_SESSION['level'] == 'admin') {

require_once "db_connect.php";
mysql_select_db("citahati", $koneksi);



$sql="SELECT * FROM res_item WHERE id_item = '$nomor' ";
$result=mysql_query($sql);
$data=mysql_fetch_array($result);

echo $sql;

?>
<body>
<div align="center" style=" font-family:Tahoma;">

<p align=right style=" font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>

<h1> Welcome to Item Edit</h1>




<table border = 0 cellpadding="3" cellspacing"2" style=" font-family:Tahoma; font-size:12px; ">
<tr style = "color:black">
<td><p>ID: </p></td><td><p><?php echo $data['id_item']; ?> !</p></td>
</tr>
<tr>
<td><p>Name</p></td>
<td><input type="text" id="item_name" value="<?php echo $data['item_name']; ?>"></td>
</tr>
<tr>
<td><p>Price</p></td>
<td><input type="text" id="price" value="<?php echo (int)substr($data['price'],4); ?>"></td>
</tr>
<tr>
<td><p>Remarks</p></td>
<td><input type="text" id="remarks" value="<?php echo $data['remarks']; ?>"></td>
</tr>


<tr>
<td></td><td></td><td><input type="button" id="button" value="Submit" onClick = "addData()"></td>
</tr>
</table>
<div id="Result"></div>



<?php


} else {
//echo "unauthorized user";
?>
<center><p>Unauthorized User!</p></center>



<?php
echo ("<META HTTP-EQUIV=Refresh CONTENT=\"2;URL=login.php\">");

} 

?>
</div>
</body>
</html>