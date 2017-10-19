<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Restaurant - Login</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	
<script type="text/javascript">

function process() {

	var ajaxRequest; //the variable that makes AJAX possible
	ajaxRequest = new XMLHttpRequest();
	
	
	ajaxRequest.onreadystatechange = function () {
	if (ajaxRequest.readyState == 4) {
	
		var buttonActive = document.getElementById('login');
		
		if (ajaxRequest.responseText == "Login Error!") {
		document.getElementById("username").value = "";
		document.getElementById("password").value = "";
		document.getElementById("err").innerHTML = ajaxRequest.responseText; // ajaxRequest.responseText is important to capture PHP response
		
		buttonActive.value = 'Login';
		buttonActive.disabled = false;
		
		
		} else {
		
		window.location.href = ajaxRequest.responseText;
		}
		
	} else {
		
		var buttonActive = document.getElementById('login');
		buttonActive.value = 'Processing';
		buttonActive.disabled = true;
		
	}
	}
	
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	
	
	var queryString = "user=" + username + "&pass=" + password;
	//alert(queryString);
	ajaxRequest.open("POST", "login_cek.php", true);
	ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
}
	


</script>

</head>

<body>

  <div class="login-card">
    <h1>Log in</h1><br>
	<h2>Restaurant</h2><br>
    <input type="text" id="username" placeholder="Username" value="">
    <input type="password" id="password" placeholder="Password" value="">
    <input type="button" id="login" value="Login" onclick="process()">
  <!-- name="login" class="login login-submit" -->
  
  <span id="err"></span>
  
  </div>



</body>

</html>