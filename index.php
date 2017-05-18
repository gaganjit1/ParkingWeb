<!DOCTYPE html>
<html>
<head>
	<title>SPark</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src ="https://www.gstatic.com/firebasejs/3.1.0/firebase.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="Images/favicon.png">
</head>
<body><div id="main">

	
	
	<?php include_once ("menu.php"); ?>
	
	
<div id="container">

	<h3 class="white">SPark Login</h3>
	<font color="red" class="error"></font><br>
	
	<font color="Black">Email</font><br>
	<input type="email" name="email" id="email" placeholder="Email"><br></input>
	<font color="Black">Password</font><br>
	<input type="password" name="password" id="password" placeholder="Password"><br></input>
	<br>
	<button class="btn btn-action" id="login" >Log In</button>
	
	<button class="btn btn-secondary" id="Register" style="margin-left:10px;">Register</button>

	<?php
	function checkUser(){
		
	}
	if(isset($_POST['reg_button'])){
		header('refresh:0;url=/138-Register.php');
	}
	
	?>


	
</div>


<script>

  const txtEmail = document.getElementById('email');
  const txtPassword = document.getElementById('password');
  const btnLogin = document.getElementById('login');
  
  btnLogin.addEventListener('click', e=> {
	  const email = txtEmail.value;
	  const pass = txtPassword.value;
	  const auth = firebase.auth();
	  
	  const promise = auth.signInWithEmailAndPassword(email, pass);
	  promise.catch(e => {
		console.log(e.message)
	  	  		
		var anchor=document.getElementsByClassName("error");
		for(var i = 0; i < anchor.length; i++){
			anchor[i].innerHTML=e.message;
		};
	  });


  });
  
</script>

<script>
	//Check Firebase State
	firebase.auth().onAuthStateChanged(firebaseUser => {
		if (firebaseUser){
			document.location = "dashboard.php";
		}
	});
</script>

<script>
$(document).ready(function(){
    $('#email').keypress(function(e){
      if(e.keyCode==13)
      $('#login').click();
    });
	
	
	$('#password').keypress(function(e){
      if(e.keyCode==13)
      $('#login').click();
    });
});
</script>


</div><?php include_once("footer.php"); ?></body>
</html>