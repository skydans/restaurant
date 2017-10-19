<html>
<?php
session_start();

if ($_SESSION['level'] == 'user') {

date_default_timezone_set('Asia/Bangkok');

require_once "db_connect.php"; //connection
mysql_select_db("citahati", $koneksi);



//

$sql1 = "SELECT inv_no FROM res_transaction";
$result1 = mysql_query($sql1);
$cek=true;
$x=1;
$nomor=1;

while (($data1=mysql_fetch_row($result1)) && ($cek)) {
$nomor = (int)substr($data1[0],1,3); 

if ($x <> $nomor) {
	$cek=false;
	$nomor=$x-1;
	//echo $nomor; // interestingly the value is different
}
$x++;
$nomor++;
}

$nomor="N".sprintf("%03s",$nomor);
?>
<head>

<title>Welcome to El Dani Resto</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/css-menu.css" media="screen" type="text/css" />

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jQuery.print.js"></script>

<script type="text/javascript">



var inv = '<?php echo $nomor; ?>';
alert("Invoice no. " + inv);
var total = 0;

var changes = 0;

$(document).ready(function(){
total = total + parseFloat(document.getElementById('total').innerHTML);
var check = document.getElementById('check').innerHTML; //To check if data has existed before, to trigger the "done" button to be displayed

document.getElementById('buttonPrintId').style.display = 'none';

if (check >= 1) {
document.getElementById('done').style.display = 'block';
}
});

function change(y) {
//alert(total);
//document.getElementById("price").innerHTML = '';
var quantity = document.getElementById('quantity').value;
var subtotal;
var id_item = document.getElementById("id_item").value;

var ajaxRequest; //the variable that makes AJAX possible
	ajaxRequest = new XMLHttpRequest();
	
	
	ajaxRequest.onreadystatechange = function () {
	if (ajaxRequest.readyState == 4) {
		if (y == 0) {
	
		document.getElementById('price').innerHTML = ajaxRequest.responseText;
		$("#id_item option[value='']").remove();
		subtotal = ajaxRequest.responseText * quantity;
		document.getElementById('subtotal').innerHTML = subtotal;
		
		
		
		} else {
		
		$('#id_item').prepend("<option value=''></option>");
		

		$(document).ready(function() {
			$("#id_item option[value='']").attr('selected', 'selected');
			// you need to specify id of combo to set right combo, if more than one combo
		});


		
		
		price = ajaxRequest.responseText;
		subtotal = ajaxRequest.responseText * quantity;
		total = subtotal + total;
		document.getElementById('total').innerHTML = total;
		
		
		document.getElementById('done').style.display = 'block';
		
		$("#tableDisplay").append('<tr><td><div>'+ id_item +'</div></td><td><div>'+ price +'</div></td><td><div>'+ quantity +'</div></td><td><div>'+ subtotal +'</div></td></tr>');
		
		}
		
	} else {
		
	}
	}
	
	
	if (y == 0) {
	var queryString = "id_item=" + id_item;
	//alert(queryString);
	ajaxRequest.open("POST", "cashier_action.php", true);
	} else {
		if (document.getElementById('id_item').value != '') {
		document.getElementById('proc').innerHTML = '';
		
		var queryString = "inv=" + inv + "&id_item=" + id_item + "&quantity=" + quantity;
		//alert(queryString);
		ajaxRequest.open("POST", "cashier_action2.php", true);
		} else {
		document.getElementById('proc').innerHTML = 'Select item first!';
		}
	}
	
	ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);


}


function finish() {

	var ajaxRequest; //the variable that makes AJAX possible
	ajaxRequest = new XMLHttpRequest();
	
	
	ajaxRequest.onreadystatechange = function () {
	if (ajaxRequest.readyState == 4) {
	document.getElementById('table').style.display = 'none';
	document.getElementById('paid').style.display = 'none';
	document.getElementById('done').style.display = 'none';
	document.getElementById('newinv').style.display = 'block';
	
	
	document.getElementById('Result').style.display = 'block';
	document.getElementById('buttonPrintId').style.display = 'block';
	document.getElementById('total2').innerHTML = total;
	document.getElementById('paidResult').innerHTML = document.getElementById('paid').value;
	document.getElementById('changeResult').innerHTML = changes;
	
	document.getElementById('total1').style.display = 'none';
	
	
	
	
	} else {
		
		
	}
	}
	
	var paid = document.getElementById('paid').value;
	if (total <= paid) {
		document.getElementById('proc').innerHTML = '';
		
		changes = paid - total ;
	
		var queryString = "inv_no=" + inv + "&paid=" + paid;

		ajaxRequest.open("POST", "cashier_action3.php", true);
		ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajaxRequest.send(queryString);
		
		//$('#divTableDisplay').show().printElement();
		
		

		
		
	} else {
		document.getElementById('proc').innerHTML = 'The paid amount is lower than the total amount!';
	}
}

function newinv() {
//window.print();
window.location.href = 'cashier.php';
}



</script>

</head>

<body>
<p align=right style=" font-family:Tahoma; font-size:14px; ">Hello, <b><?php echo $_SESSION['id']; ?></b>
 <a href="logout.php">Logout</a></p>

<span align=left style=" font-family:Tahoma; font-size:14px; ">Invoice No. <b><?php echo $nomor; ?></b></span>
<br>
<span align=left style=" font-family:Tahoma; font-size:14px; ">Date: <b><?php echo date("F j, Y"); ?></b></span>
<br>

<?php 
$sql3 = "SELECT * FROM res_user";
$result3 = mysql_query($sql3);
while($data3=mysql_fetch_array($result3)) {
if ($_SESSION['id'] == $data3['username']) {
$cashier_name = $data3['cashier_name'];
}
}

?>
<span align=left style=" font-family:Tahoma; font-size:14px; ">You are being served by: <b><?php echo $cashier_name; ?></b></span>
<br>


 
<div id="printable" style="width: 800px; float: left;">
 
<table id="tableDisplay" align=left border = 0 cellpadding="3" cellspacing"2" bgcolor = "#cccccc" style=" font-family:Tahoma; font-size:12px; ">

<tr bgcolor="#949494" style = "color:#ffffff">

<td>Item </td>
<td>Price </td>
<td>Quantity </td>
<td>Subtotal </td>

</tr>
<?php
$total=0;
$i=0;
$sql2 = "SELECT * FROM res_transaction_detail";
$result2 = mysql_query($sql2);
while($data2=mysql_fetch_array($result2)) {
if ($nomor == $data2['inv_no']) {
$i++;
?>

<tr>
<td><div><?php echo $data2['id_item'];?></div></td>
<td><div><?php $temp = $data2['subtotal'] / $data2['qty']; echo $temp;?></div></td>
<td><div><?php echo $data2['qty'];?></div></td>
<td><div><?php echo $data2['subtotal'];?></div></td>
</tr>

<?php 
$total = $total + $data2['subtotal'];
}
} ?>

</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table id="Result" style="display: none;">
<tr><td>
<span style="font-size:12px;">Total: </span><span>Rp. </span><span id="total2" style="font-size:16px;" ></span>
<span style="font-size:12px;">Paid: </span><span>Rp. </span><span id="paidResult" style="font-size:16px;"></span>
<span style="font-size:12px;">Change: </span><span>Rp. </span><span id="changeResult" style="font-size:16px;"></span>
<p>Thank you for eating our food! :)</p>
<p>Please come again to Daniel's Restaurant :)</p>
</td></tr>
</table>


</div>

<!-- -->

<div style="margin-left: 620px; float:left;">

<table id="table" align=left border = 0 cellpadding="3" cellspacing"2" bgcolor = "#cccccc" style=" font-family:Tahoma; font-size:12px; ">

<tr bgcolor="#949494" style = "color:#ffffff">

<td>Item </td>
<td>Price </td>
<td>Quantity </td>
<td>Subtotal </td>

</tr>
<?php
$sql = "SELECT * FROM res_item";
$result = mysql_query($sql);

?>

<tr>
<td><select id="id_item" onchange="change(0)" >
	<option value=""></option>
	<?php while ($data=mysql_fetch_array($result)) { ?>
	<option value="<?php echo $data['id_item']; ?>" > <?php echo $data['id_item']." ".$data['item_name']; ?> </option>
	<?php } ?>
	</select>
</td>
<td>
<div id="price"></div>
</td>
<td><select id="quantity" onchange="change(0)" >
	<option value="1" >1</option>
	<option value="2" >2</option>
	<option value="3" >3</option>
	<option value="4" >4</option>
	<option value="5" >5</option>
	<option value="6" >6</option>
	<option value="7" >7</option>
	<option value="8" >8</option>
	<option value="9" >9</option>
	<option value="10" >10</option>
	
	</select>
</td>
<td>
<div id="subtotal"></div>
</td>
</tr>
<tr><td>
<input type="button" id="add" value="Add" onclick="change(1)">
</td></tr>

</table>
<br>
<br>
<table>

<tr><td id="total1">
<span style="font-size:12px;">Total: </span><span>Rp. </span><span id="total" style="font-size:16px;" ><?php echo $total; ?></span>
</td></tr>

<tr><td>
<input type="text" id="paid" value="" placeholder="Paid amount">
</td></tr>

<tr><td>
<input type="button" id="newinv" value="New Invoice" onclick="newinv()" style="display: none;">

<div id="buttonPrintId">
<button class="buttonPrint" onclick="jQuery('#printable').print()">Print</button>
</div>

</td></tr>

<tr><td>
<input type="button" id="done" value="Done" onclick="finish()" style="display: none;">
</td>
<tr>
<td>
<span id="proc" style="color: red;" ></span>
<span id="check" style="display: none;" ><?php echo $i; ?></span> <!-- Invisible element to check if previous data of the invoice existed or not (to trigger the "done" button) -->
</td>
</tr>

</tr>
</table>




</div>

</body>

<?php } else {
//echo "unauthorized user";
?>
<center><p>Unauthorized User!</p></center>
<?php
echo ("<META HTTP-EQUIV=Refresh CONTENT=\"3;URL=login.php\">");
}
?>
</html>