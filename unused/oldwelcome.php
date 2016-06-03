<?php 
	session_start();
	$user = $_SESSION['user'];
	$welcome = "Welcome ".$user;
	if(!isset($user)){
		header("Location: index.php");
	}

	include 'connection.php';
	$check = 0;
	$sql = "SELECT `firstname`, `lastname`, `email` FROM `contactlist` WHERE `user`='$user'";
	$result = $conn->query($sql);
	$contactlist = "<thead><tr id='labels'>
					<th> First Name </th>
					<th> Last Name </th>
					<th> Email </th>
				</tr></thead>";
	$empty = "";
	while($info = $result->fetch_assoc()){
		$contactlist .=  '<tr class="contactlisting">';
		$contactlist .=  "<td>".$info['firstname']."</td>";
		$contactlist .=  "<td>".$info['lastname']."</td>";
		$contactlist .=  "<td>".$info['email']."</td></tr>";	
	}
	if($result->num_rows == 0){
		$check =1;
			$empty = "Contact list is empty";
		}
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
			<form action="initcontactcreate.php">
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
		<form action="removeField.php">
				<input type="submit" value="Edit Table" class="btn">
			</form>
		</div>
<br>
<br>
		<div>
			<table style="width: 40%" class="table table-striped">

				<!-- <tr id="labels">
					<td> First Name </td>
					<td> Last Name </td>
					<td> Email </td>
				</tr> -->
			
			<?php
			if($check == 0){
				echo $contactlist;				
			}
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
 <table>
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Item Name</th>
              <th data-field="price">Item Price</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
          </tr>
        </tbody>
      </table>


</html>