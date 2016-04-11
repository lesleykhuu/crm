<!DOCTYPE HTML>
<html>
	<head>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<?php 
			error_reporting(0);

			session_start();
			$user = $_SESSION['user'];
			if(isset($user)){
				header("Location: welcome.php");
			}
		?>

	<center><br><br><strong><p class="title">Home page</p></strong></center>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"> -->
	<meta name="viewport" content="width=500, initial-scale=1">

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css"> -->
	<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
 <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css" /> 
	<!-- <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.cyan-indigo.min.css" /> -->


	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="styles.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>
	function myFunction() {
	    document.getElementById("visible1").style.display = "block";
	   // document.getElementById("hidden").style.display = "none";
	}
	$(document).ready(function(){
		$( ".visible1" ).click(function() {
	  		$( ".visible1" ).hide();
	  		//$( ".hidden1").show();
	  		$( ".hidden1" ).show("slow");

	  		// alert("asdf0");
		});
	});
	
	</script>



	</head>

	<body>
	<center>
		<br><br>
		<div class="box"> 
			<br>
		<p> Login </p>
		<form action="logincheck.php" method="post" class = "homeforms">
			<label class="inputlabel"> Username: </label><br>
			<input type="text" placeholder="" name='user' class="fleft"><br><br>
			
			<label class="inputlabel"> Password: </label>
			<input type="password" placeholder="" name='password' class="fleft"><br>
			<br>
			<div><input type = "submit" value="Login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored button"></div>
		</form>
		<br><br><br>


		<p class = "visible1"> If you are a new user, click here to sign up here! </p>
		<p class = "hidden1"> Sign up </p>
		<div class="hidden1">
			<form action="signup.php" method="post" class = "homeforms">
				<label class="inputlabel"> Username: </label>
				<input type="text" placeholder="" name='user' class="fleft"><br><br>
				
				<label class="inputlabel"> Password: </label>
				<input type="password" placeholder="" name='password' class="fleft"><br><br>
				<input type = "submit" value="Sign up" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored button">
			</form>
		</div>
		<div class = "homeforms">
			<button class="visible1 mdl-button mdl-js-button mdl-button--raised mdl-button--colored button">Create an account</button><br>
<!-- 			<button name="android:colorButtonNormal">#2196f3</button>
				    <button name="android:colorPrimaryDark">@color/primary_dark</button> -->
		
<!-- 		<Button
  android:theme="@style/SpecialButton"
  android:id="@+id/special"
  android:layout_width="wrap_content"
  android:layout_height="wrap_content"
  android:text="@string/special" />

 -->
		<div> 

		<br><br>
		</div>
	</center>

	</body>
<!-- <item name="android:colorButtonNormal">#2196f3</item>

<button class="mdl-button mdl-js-button mdl-button--colored">
  <i class="material-icons">star</i>
</button>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
  Button
</button>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
  Button
</button>
 -->

</html>