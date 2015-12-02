<?php
include 'connection.php';

session_start();
$user = $_SESSION['user'];

if(isset($_GET['radio'])){
	$radio = $_GET['radio'];
	echo $radio[0];


	$sql = "SELECT * FROM `contactlist` WHERE `email`='$radio[0]' AND `user`='$user'";
	$result = $conn->query($sql);
	$info = $result->fetch_assoc();
	// echo $info['firstname'];
	// echo $info['lastname'];
	// echo $info['email'];
	$email = "Editing user with email, ".$info['email'];

}
else{
	header("Location: contactedit.php");

}
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
			<p class="title"> <strong><?php echo $email ?> </strong></p><br>
		</div>
		<div class="form-group">
			<form action="actualContactEdit.php" method="post">
				<label class="inputlabel"> Edit First Name</label>
				<input type="text" placeholder="First Name" name='firstname' class="form-control input"><br><br>
				
				<label class="inputlabel"> Edit Last Name</label>
				<input type="text" placeholder="Last Name" name='lastname' class="form-control input"><br><br>
				
				<label class="inputlabel"> Edit Email</label>
				<input type="text" placeholder="Email" name='email' class="form-control input"><br><br>			
				

				<input type="hidden" placeholder="Email" name='actualEmail' value = <?php echo $radio[0]; ?> class="form-control input"><br><br>			
				
			
				<input type="submit" value="Edit Contact" class="btn btn-success">
			</form>


			<br>
			<form action="login.php">
				<button type="submit" class="btn btn-success">Home</button><br>
			</form>
		</div>
		</center>
	
	</body>



</html>