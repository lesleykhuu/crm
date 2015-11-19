<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
		<?php 
			session_start();
			$user = $_SESSION['user'];
	
		?>

	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="btn btn-success btn-xs">Logout</button><br>
		</form>
		
	</div>
	<br>
		<center><br><strong><p class="title">Remove Contact<p></strong></center>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
	function myFunction(){
		var x = document.forms[0];
		var checked = [];
		var i;
		for (i = 0; i < x.length; i++){
			
			if(x.elements[i].checked == true){
			checked.push(x.elements[i]);
			}
	
		}



	}	
	


	</script>

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
			<?php
				include 'connection.php';
				$sql = "SELECT firstname, lastname, email FROM contactlist WHERE user='$user'";
				$result = $conn->query($sql);
				?><form action="removecontact2.php" method="get"><?php
				while($info = $result->fetch_assoc()){
					echo "<tr>";					
					?><td><input name="checkbox[]" type="checkbox" value = <?php echo $info['email']; ?>></td><?php

					echo "<td>".$info['firstname']."</td>";
					echo "<td>".$info['lastname']."</td>";
					echo "<td>".$info['email']."</td></tr>";
					

				}
				
			?>
	
			</table>
					<input type="submit" name="delete" value="Delete" class="btn btn-success">
				
				</form>

		</div>
		</center>
	
	</body>



</html>