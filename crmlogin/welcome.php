<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.php");
	}

	require 'Table.php';
	$obj = new Table();
	$contactlist = $obj->printTable('welcome',$user);
	$check = $contactlist[1];

	$welcome = "Welcome ".$user;
	
?>
<!DOCTYPE HTML>
<html>
	<head>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">


	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="btn btn-xs">Logout</button><br>
		</form>
		
	</div>
	
		<center><br><strong><p class="title"><?php echo $welcome ?></p></strong></center></head>

	<body>
		<br>
		<center>
		
		<div>
			<p class="title"> Contact List</p>
		</div>

		<div class="row">
		<div class="col-md-5" align="right">
			<form action="contactcreate.php" method = "post">
				<input type="hidden" name="initCreate" value = "0" >			
				<input type="submit" value="Create Contact" class="btn">
			</form>
		</div>
		<div class="col-md-2">
			
			<form action="contactedit.php">
				<input type="submit" value="Edit Contact" class="btn">
			</form>
		</div>
		<div class="col-md-5" align="left">
			<form action="removecontact.php">
				<input type="submit" value="Remove Contact" class="btn">
			</form>
		
		</div>
		<!-- <form action="addField.php"> -->
		<form action="editTable.php">
				<input type="submit" value="Edit Table" class="btn">
			</form>
		</div>
<br>
<br>
		<div>
			<table style="width: 40%" class="table table-striped">


			
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
		</div>
		</center>
	
	</body>
	<center>

</html>