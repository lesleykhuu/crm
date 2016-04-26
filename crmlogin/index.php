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

	<center><br><br><strong><p class="title">CONTACTS LIST</p></strong></center>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"> -->
	<meta name="viewport" content="width=500, initial-scale=1">

<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
	<!-- <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css"> -->
 <!-- <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css" />  -->
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
		<div class="signUpFont"> LOGIN </div>
		<form action="logincheck.php" method="post" class = "homeforms">
			<label class="inputlabel"> USERNAME: </label><br>
			<input type="text" placeholder="" name='user' class="fleft"><br>
			
			<label class="inputlabel"> PASSWORD: </label>
			<input type="password" placeholder="" name='password' class="fleft"><br>
			<br>
			<div><input type = "submit" value="LOGIN" class="button"></div>
		</form>
		<br>


		<!-- <p class = "visible1"> If you are a new user, click here to sign up here! </p> -->
		<p class = "hidden1"> SIGN UP </p>
		<div class="hidden1">
			<form action="signup.php" method="post" class = "homeforms">
				<label class="inputlabel"> USERNAME: </label>
				<input type="text" placeholder="" name='user' class="fleft"><br><br>
				
				<label class="inputlabel"> PASSWORD: </label>
				<input type="password" placeholder="" name='password' class="fleft"><br><br>
				<input type = "submit" value="SIGN UP" class="button altButton">
			</form>
		</div>
		<div class = "homeforms">
			<button class="visible1 button altButton">CREATE AN ACCOUNT</button><br>

		<div> 

		<br><br>
		</div>
	</center>

	</body>

</html>