<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.php");
	}

	require 'Table.php';
	$obj = new Table();
	$contactlist = $obj->printTable('remove',$user);
	$check = $contactlist[1];

		
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
	<br>
		<center><br><strong><p class="title">Remove Contact<p></strong></center>
	

	</head>

	<body>
		<br>
		<center>
<br>
<br>

		<div>
			<table style="width: 40%" class="table table-bordered">
				

				<form action="removecontact2.php" method="get">
			
			<?php
			if($check == 0){
				echo $contactlist[0];
			}
			?>
	
			</table>
			<div id="emptycontact">

			<?php
			if($check == 1){
				echo "Contact list is empty";
			}
			?>
			
			</div>
				<input type="submit" name="delete" value="Delete" class="btn btn-success">
				
				</form>
			<br><br>
				<form action="welcome.php">
				<button type="submit" class="btn btn-success">Home</button><br>
				</form>

		</div>
		</center>
	
	</body>



</html>