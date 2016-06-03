<?php 
	include 'connection.php';
	include 'Contact.php';
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	

	$sqll = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'contactlist'";

  	$resultt = $conn->query($sqll);
	$i = 0;
	$colNames = [];
    while($row = $resultt->fetch_assoc()) {
    	$colNames[$i] = $row['COLUMN_NAME'];
		// echo "<p>".$row['COLUMN_NAME']."</p>";
    // echo "<p>".$row[$i]."</p>";
    	$i++;
	}
	$colList = "";
	for($i = 0; $i < count($colNames); $i++){
		$colList .= "<tr><td style='background-color:grey'><input name='checkbox[]' type='checkbox' value = ".$colNames[$i]."></td>";
		$colList .= "<td style='background-color: grey ;color:black;font-size: 20px'>".$colNames[$i]."</td></tr>";
		// echo $colNames[$i];
	}

	// $sql = "SELECT * FROM `contactlist` WHERE `user`='$user'";
	// $result = $conn->query($sql);
	// $contactlist = "";
	// while($info = $result->fetch_assoc()){
	// 	$contactlist .= "<tr><td><input name='checkbox[]' type='checkbox' value = ".$info['contactId']."></td>";					
	// 	$contactlist .= "<td>".$info['firstname']."</td><td>".$info['lastname']."</td><td>".$info['email']."</td></tr>";

	// }
		

?>

<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

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
			<form action="removeField.php" method="get">
			
			<?php
				echo $colList;
				
			?>
	
			</table>
		</div><div class="clear"></div>
				<input type="submit" name="delete" value="Delete" class="btn btn-success">
				
			</form>

		</div>
		</center>
	
	</body>



</html>