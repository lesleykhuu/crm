<?php 
	session_start();
	$user = $_SESSION['user'];
	$welcome = "Welcome ".$user;
	if(!isset($user)){
		header("Location: index.html");
	}

	include 'connection.php';
	$sql = "SELECT `firstname`, `lastname`, `email` FROM `contactlist` WHERE `user`='$user'";
	$result = $conn->query($sql);
	$contactlist = "";
	$empty = "";
	while($info = $result->fetch_assoc()){
		$contactlist .=  '<tr class="contactlisting">';
		$contactlist .=  "<td>".$info['firstname']."</td>";
		$contactlist .=  "<td>".$info['lastname']."</td>";
		$contactlist .=  "<td>".$info['email']."</td></tr>";	
	}
	if($result->num_rows == 0){
			$empty = "Contact list is empty";
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
	
		<center><br><strong><p class="title"><?php echo $welcome ?></p></strong></center></head>

	<body>
		<br>
		<center>
		
		<div>
			<p class="title"> Contact List</p>
		</div>

		<div class="row">
		<div class="col-md-5" align="right">
			<form action="initcontactcreate.php">
				<input type="submit" value="Create Contact" class="btn btn-success">
			</form>
		</div>
		<div class="col-md-2">
			
			<form action="contactedit.php">
				<input type="submit" value="Edit Contact" class="btn btn-success">
			</form>
		</div>
		<div class="col-md-5" align="left">
			<form action="removecontact.php">
				<input type="submit" value="Remove Contact" class="btn btn-success">
			</form>
		
		</div>
		</div>
<br>
<br>
		<div>
			<table style="width: 40%" class="table table-bordered">

				<tr id="labels">
					<td> First Name </td>
					<td> Last Name </td>
					<td> Email </td>
				</tr>
			
			<?php
				echo $contactlist;				
			?>

	
			</table>
			<div id="emptycontact">

			<?php
				echo $empty;
			?>
			
			</div>
		</div>
		</center>
	
	</body>



</html>