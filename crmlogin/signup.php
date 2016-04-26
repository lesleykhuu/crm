<?php 
	include 'connection.php';
	error_reporting(0);

	session_start();
	$user = $_SESSION['user'];
	if(isset($user)){
		header("Location: welcome.php");
	}

	if(!isset($_POST['initSignUp'])){
		$user = $_POST['user'];
		$password = $_POST['password'];
		$create = 1;
		$message = "";
		$userr = mysql_real_escape_string($user);
		$sql = "SELECT `username` FROM `users` WHERE `username`='$userr'";
		$result = $conn->query($sql);

		if(empty($_POST['user'])){
			$create = 0;
			// $message .= "<div class='signUpFont signUpFormat'>Username Required</div>";
			$message .= "<div class='signUpFont signUpFormat'>USERNAME REQUIRED</div>";

		}

		else if($result->num_rows > 0){
			// $message .= "<div class='signUpFont signUpFormat'>Username taken. Please choose another username.</div>";
			$message .= "<div class='signUpFont signUpFormat'>USERNAME TAKEN. PLEASE CHOOSE ANOTHER USERNAME</div>";

			$create = 0;
		}

		if(empty($_POST['password'])){
			$create = 0;
			// $message .= "<div class='signUpFont signUpFormat'>Password Required</div>";
			$message .= "<div class='signUpFont signUpFormat'>PASSWORD REQUIRED</div>";
			
		}
		else{
			
			$enpass = hash('tiger192,3', $password);
			//echo $enpass;
			//echo "pass works ".$password;
		}


		if($create == 1){
			// session_start();					
			$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$userr', '$enpass')";
			if($conn->query($sql) === TRUE){
				$sql = "SELECT `user` FROM `users` WHERE `username` = '$user'";
				$result = $conn->query($sql);
				$userid = $result->fetch_assoc();
				$userr = $userid['user'];


				$sql = "INSERT INTO `fieldrelation`(`user`,`field`) VALUES ($userr,1),($userr,2),($userr,3)";
				$conn->query($sql);
				echo $sql;

				session_start();
				$_SESSION['user'] = $userid['user'];
				header("Location: welcome.php");
				// $sql2 = "CREATE TABLE $userr(contactId int(11) AUTO_INCREMENT, user varchar(20),firstname varchar(30),lastname varchar(30),email varchar(50), PRIMARY KEY(contactId))";
				// $conn->query($sql2);
				// echo "yo";
					
				// }
				//make it send to a new home page
			}
			else
				echo $conn->error; 
		}

		$login = $result->fetch_assoc();
	
	}
?>

<!DOCTYPE HTML>
<html>

	<head><center><br><strong><p class="title">SIGN UP </p></strong></center>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="styles.css">

	</head>

	<body>
<br>
<center>
	
		<!-- <p class = 'rfont'>There was a problem</p> -->
	<?php 
		echo $message;
	?>
	<br>


		<div class = "box">
				<br>
			<form action="signup.php" method="post" class = "homeforms">
				<label class="inputlabel"> USERNAME: </label>
				<input type="text" placeholder="" name='user' class="fleft"><br>
				
				<label class="inputlabel"> PASSWORD: </label>
				<input type="password" placeholder="" name='password' class="fleft"><br><br>
				<input type = "submit" value="SIGN UP" class="button">
			</form>

			<br>
			<form action="loginerror.php" class = "homeforms" method="post">
				<input type="hidden" name="signUp" value = "0" >
				<button type="submit" class="button altButton">LOGIN HERE</button><br>
			</form>
			<br>
			<br>
		</div>
		
</center>
	
	</body>



</html>