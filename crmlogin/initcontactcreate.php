<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">

		<?php 
			session_start();
			$user = $_SESSION['user'];
			if(!isset($user)){
				header("Location: index.php");
			}
		?>

	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="btn btn-success btn-xs">LOGOUT</button><br>
		</form>
		
	</div>
	</head>

	<body>
		<br>
		<center>
		<div>
			<p class="title"> <strong>Create Contact</strong></p><br>
		</div>
		
		<div class="form-group">
			<form action="contactcreate.php" method="post">
				<label class="inputlabel"> First Name</label>
				<input type="text" placeholder="First Name" name='firstname' class="form-control input"><br><br>
				
				<label class="inputlabel"> Last Name</label>
				<input type="text" placeholder="Last Name" name='lastname' class="form-control input"><br><br>
				
				<label class="inputlabel"> Email</label>
				<input type="text" placeholder="Email" name='email' class="form-control input"><br><br>

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