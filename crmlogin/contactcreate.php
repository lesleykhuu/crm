<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	include 'connection.php';
		$message = "";
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];

		if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])){
			$sql = "SELECT email FROM contactlist WHERE email='$email'";
			$result = $conn->query($sql);
			if($result->num_rows > 0)
				$message = "This email is already used by an existing contact<br><br>";
			else{
				$sql = "INSERT INTO contactlist(user, firstname, lastname, email) VALUES ('$user','$firstname','$lastname','$email')"; 
				if($conn->query($sql) === TRUE)
					$message = "Contact Added!<br><br>";
				else
					$message = $conn->error;
			}
		}
		else
			$message = "Please fill out the entire form!<br><br>";
?>

<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">

	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="btn btn-success btn-xs">Logout</button><br>
		</form>
		
	</div>
	</head>

	<body>
		<br>
		<center>
		<div>
			<p class="title"> <strong>CREATE CONTACT</strong></p><br>
		</div>
		<div class="form-group">
			<form action="contactcreate.php" method="post">
				<label class="inputlabel"> First Name</label>
				<input type="text" placeholder="First Name" name='firstname' class="form-control input"><br><br>
				
				<label class="inputlabel"> Last Name</label>
				<input type="text" placeholder="Last Name" name='lastname' class="form-control input"><br><br>
				
				<label class="inputlabel"> Email</label>
				<input type="text" placeholder="Email" name='email' class="form-control input"><br><br>			
				
			<?php
				echo $message;
			?>
			
				<input type="submit" value="Create Contact" class="btn btn-success">
			</form>


			<br>
			<form action="login.php">
				<button type="submit" class="btn btn-success">Home</button><br>
			</form>
		</div>
		</center>
	
	</body>



</html>