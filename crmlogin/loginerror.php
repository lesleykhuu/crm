<?php
$message ="";
// echo $_POST['signUp'];
if(isset($_POST['signUp'])){
	$message = "";
	// unset($_POST['signUp']);
}
else{
	$message = "USERNAME OR PASSWORD WAS INCORRECT";
}

?>

<!DOCTYPE HTML>
<html>
	<head>

	<link rel="stylesheet" type="text/css" href="styles.css">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>


	<br><center><strong><p class= "title">LOGIN</p></strong></center>
	</head>

	<body>
	<center>
		<br>
		<!-- <p>Username or password was incorrect. Please try again.</p> -->
		<div class="signUpFont"><?php echo $message; ?></div>
			<br>
		<div class="box">
			<br>
			<form action="logincheck.php" method="post" class = "homeforms">
				<label class="inputlabel"> USERNAME: </label>
				<input type="text" placeholder="" name='user' class="fleft"><br>
				
				<label class="inputlabel"> PASSWORD: </label>
				<input type="password" placeholder="" name='password' class="fleft"><br><br>
				
				
				<div><input type = "submit" value="LOGIN" class="button"></div>
			</form>
			<br>
			<form action="signup.php" class = "homeforms" method="post">
				<input type="hidden" name="initSignUp" value = "0" >
				<button type="submit" class="button altButton">CREATE AN ACCOUNT</button><br>
			</form>
			<br><br>
		</div>

	</center>

	</body>



</html>