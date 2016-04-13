<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}

	require 'Table.php';
	$obj = new Table();
	$colList = $obj->addRemoveField('remove',$user);

?>

<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<script>
	$(document).ready(function(){
	    $("#removeField").addClass("changeColor");
	});
	</script>

	<script> 
	// $( document ).ready(function() {
	// 	document.getElementById("nav01").innerHTML =
	// 		"<ul id='menu'>" +
	// 		"<li><a href='index.html'>Home</a></li>" +
	// 		"<li><a href='customers.html'>Data</a></li>" +
	// 		"<li><a href='about.html'>About</a></li>" +
	// 		"</ul>";
	// });
	</script>
	<script src="editTable.js"></script>

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
		<div class="form-group">

			<nav id="nav01"> </nav>

			<div class="clear" style="float:left; border-style:solid; width:50%; background-color:#FFF4CB">
			<table style="width: 40%" class="table table-bordered">
			<form action="removeField2.php" method="get">
			
			<?php
				echo $colList;
				
			?>
	
			</table>
		</div><div class="clear"></div>
		<br>
				<input type="submit" name="delete" value="Delete" class="btn btn-success">
				
			</form>
			<br><br>
			<form action="welcome.php">
				<button type="submit" name="home" class="btn btn-success">Home
			</form>
		</div>
		</center>
	
	</body>



</html>