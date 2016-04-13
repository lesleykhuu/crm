<?php 
	include 'connection.php';
	include 'Contact.php';
	require 'Table.php';

	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	$message = "";
	$fieldVals = $_POST['fields'];
	$obj = new Table();
	$fields = $obj->getColFields($user);
	$check =1;

	for($i=0; $i < count($fieldVals); $i++){
		if($fieldVals[$i] != ""){
			$check = 0;
		}
	}

	if($check == 0){
		$obj = Contact::GetById(NULL);
		$obj->setValue('user',$user);
		for($i = 0; $i < count($fields[0]); $i++){
			$obj->setValue($fields[0][$i], $fieldVals[$i]);
		}
		$obj->Save();
		$message = "Contact Added!<br><br>";
	}
	else{
		$message = "Form was empty!<br><br>";
	}

	$contactlist = "";
	for($i = 0; $i < count($fields[1]); $i++){
		$contactlist .= "<label class='inputlabel'>".$fields[1][$i]."</label>
				<input type='text' placeholder='".$fields[1][$i]."' name='fields[]' class='form-control'><br><br>";
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
							
				
			<?php
				echo $contactlist;
				echo $message;
			?>
			
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