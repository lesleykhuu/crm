<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	require 'Contact.php';
	include 'connection.php';


	$obj = new Contact();
	$fields = $obj->getColFields($user);

	$sql = "SELECT * FROM `contactlist` WHERE `user`='$user'";
	$result = $conn->query($sql);
	$contactlist = "<thead><tr id='labels'><th></th>";
	$fieldquery ="";
	for($i = 0; $i < count($fields[1]); $i++){
		$info = $result->fetch_assoc();
		$fieldquery .= $fields[0][$i].",";

		$contactlist .= "<th>".$fields[1][$i]."</th>";


	}

	$queryStr = substr($fieldquery,0, -1);
	$contactlist .= "</tr></thead>";
	

	$contactlist .=  '<tr class="contactlisting">';
	// $sql = "SELECT * FROM `contactlist` WHERE user = $user";
	if($result = $conn->query($sql)){
		$i = 0;
		while($info = $result->fetch_assoc()){
			$contactlist .= "<tr><td><input name='checkbox[]' type='checkbox' value = ".$info['contactId']."></td>";
			for($j = 0; $j < count($fields[0]); $j++){
				$contactlist .= "<td>".$info[$fields[0][$j]]."</td>";
			}
			$i++;
			$contactlist .= "</tr>";
		}
	}
	$check = 0;
	$empty = "";
	if($result->num_rows == 0){
		$check =1;
			$empty = "Contact list is empty";
			$contactlist = "";
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
				echo $contactlist;
			?>
	
			</table>
			<div id="emptycontact">

			<?php
				echo $empty;
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