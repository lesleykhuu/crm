<?php 
	include 'connection.php';
	$user = $_POST['user'];
	$password = $_POST['password'];
	$create = 1;
	$message = "";
	$userr = mysql_escape_string($user);
	$sql = "SELECT username FROM users WHERE username='$userr'";
	$result = $conn->query($sql);

	if(empty($_POST['user'])){
		$create = 0;
		$message .= "<p>Username Required</p>";
	}

	else if($result->num_rows > 0){
		$message .= "<br><p>This username has been taken. Please choose another username.</p>";
		$create = 0;
	}

	if(empty($_POST['password'])){
		$create = 0;
		$message .= "<p>Password Required</p>";
		
	}
	else{
		
		$enpass = hash('tiger192,3', $password);
		//echo $enpass;
		//echo "pass works ".$password;
	}


	if($create == 1){
		session_start();					
		$sql = "INSERT INTO users (username, password) VALUES ('$user', '$enpass')";
		$_SESSION['user'] = $user;
		if($conn->query($sql) === TRUE){
			header("Location: login.php");
			//make it send to a new home page
		}
		else
			echo $conn->error; 
	}

?>

<!DOCTYPE HTML>
<html>

	<head><center><br><strong><p class="title">Sign up </p></strong></center>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">

	</head>

	<body>
<br>
<center>

	<?php 
		echo $message;
	?>

		
			<form action="signup.php" method="post" id="forms"><br><br>
			Username: <input type="text" name="user" class="input"> <br><br>
			Password: <input type="password" name="password" class="input"><br><br>
			<input type = "submit" value="Create" class="btn btn-success">
			</form>

			<br>
			<form action="index.html">
				<button type="submit" class="btn btn-success">Home</button><br>
			</form>

		
</center>
	
	</body>



</html>