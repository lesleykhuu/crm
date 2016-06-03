<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}


	require 'Contact.php';
	include 'connection.php';
	require 'Table.php';

	$obj = new Table();
	$fields = $obj->getColFields($user);
	$contactlist = "";
	for($i = 0; $i < count($fields[1]); $i++){
		$contactlist .= "<label class='inputlabel'>".$fields[1][$i]."</label>
				<input type='text' name='fields[]' class='form-control'><br><br>";
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
			<p class="title"> <strong>Create Contact</strong></p><br>
		</div>
		
		<div class="box">
			<form action="contactcreate.php" method="post">
				
				<?php echo $contactlist ?>

				<input type="submit" value="Create Contact" class="btn btn-success btn-block">
			</form>


			<br>
			<form action="welcome.php">
				<button type="submit" class="btn btn-success btn-block">Home</button><br>
			</form>
		</div>
		</center>
	
	</body>



</html>