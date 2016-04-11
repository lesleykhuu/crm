<?php 
	include 'connection.php';
	error_reporting(0);

	session_start();
	$user = $_SESSION['user'];
	if(isset($user)){
		header("Location: welcome.php");
	}

	$user = $_POST['user'];
	$password = $_POST['password'];
	$create = 1;
	$message = "";
	$userr = mysql_real_escape_string($user);
	$sql = "SELECT `username` FROM `users` WHERE `username`='$userr'";
	$result = $conn->query($sql);

	if(empty($_POST['user'])){
		$create = 0;
		$message .= "<p>Username Required</p>";
	}

	else if($result->num_rows > 0){
		$message .= "<p>Username taken. Please choose another username.</p>";
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
		// session_start();					
		$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$userr', '$enpass')";
		if($conn->query($sql) === TRUE){
			$sql = "SELECT `user` FROM `users` WHERE `username` = '$user'";
			$result = $conn->query($sql);
			$userid = $result->fetch_assoc();
			$userr = $userid['user'];

			// $sql = "INSERT INTO `fields`(`fieldname`) VALUES (('firstname'),('lastname'),('email'))";
			// $conn->query($sql);

			// $sql = "SELECT `fieldid` FROM `fields` WHERE `fieldname` = 'firstname'";
			// $result = $conn->query($sql);
			// $row = $result->fetch_assoc();
			// // echo $row['fieldid'];
			// $field1 = $row['fieldid'];
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

	//printf("%s (%s)\n",$login['username'],$login['password']);
	//print_r($login['username']);
	//echo "yoyo".$login['password'];
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
	<div class = "rbox">
		<br>
		<!-- <p class = 'rfont'>There was a problem</p> -->
	<?php 
		echo $message;
	?>
	<br>
	</div>
	<br>

		
			<!-- <form action="signup.php" method="post" id="forms"><br><br>
			Username: <input type="text" name="user" class="input"> <br><br>
			Password: <input type="password" name="password" class="input"><br><br>
			<input type = "submit" value="Create" class="btn btn-success">
			</form> -->
		<div class = "box">
				<br>
			<form action="signup.php" method="post" class = "homeforms">
				<label class="inputlabel"> Username: </label>
				<input type="text" placeholder="Username" name='user' class="form-control button"><br>
				
				<label class="inputlabel"> Password: </label>
				<input type="password" placeholder="Password" name='password' class="form-control button"><br>
				<input type = "submit" value="Sign up" class="btn btn-success button">
			</form>

			<br>
			<form action="index.php" class = "homeforms">
				<button type="submit" class="btn btn-success button">Home</button><br>
			</form>
			<br>
			<br>
		</div>
		
</center>
	
	</body>



</html>