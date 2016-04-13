<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	
	require 'Table.php';
	$obj = new Table();
	$colList = $obj->addRemoveField('add',$user);
 	

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
			
			<?php
				echo $colList;
				
			?>
	
			</table>
		</div>
		<div style="float:left" class="form-group">
			<form action="addField2.php" style="float: left; width:100%" method="post">
				<label class="inputlabel"> Add Field</label>
				<input type="text" placeholder="ex. Username" name='field' class="form-control">			
				<input type="submit" value="Add Field" class="btn btn-success btn-block">
			</form>
		</div>

		<div class="clear"></div>
		<br>

				<form action="welcome.php">
					<button type="submit" name="home" class="btn btn-success">Home
				</form>

		</div>
		</center>
	
	</body>



</html>