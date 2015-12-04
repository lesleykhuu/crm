<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	include 'connection.php';
	$sql = "SELECT * FROM `contactlist` WHERE `user`='$user'";
	$result = $conn->query($sql);
	$contactlist = "";
	while($info = $result->fetch_assoc()){
		$contactlist .= "<tr><td><input name='checkbox[]' type='checkbox' value = ".$info['contactId']."></td>";					
		$contactlist .= "<td>".$info['firstname']."</td><td>".$info['lastname']."</td><td>".$info['email']."</td></tr>";

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
				<tr>
					<td></td>
					<td> First Name </td>
					<td> Last Name </td>
					<td> Email </td>
				</tr>

				<form action="removecontact2.php" method="get">
			
			<?php
				echo $contactlist;
				
			?>
	
			</table>
				<input type="submit" name="delete" value="Delete" class="btn btn-success">
				
				</form>
			<br><br>
				<form action="login.php">
				<button type="submit" class="btn btn-success">Home</button><br>
				</form>

		</div>
		</center>
	
	</body>



</html>