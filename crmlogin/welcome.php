<?php 
	session_start();
	$user = $_SESSION['user'];
	$welcome = "Welcome ".$user;
	if(!isset($user)){
		header("Location: index.php");
	}

	require 'Contact.php';
	include 'connection.php';
	$obj = new Contact();
	$fields = $obj->getColFields($user);


	$contactlist = "<thead><tr id='labels'>";
	for($i = 0; $i < count($fields[1]); $i++){
		$contactlist .= "<th>".$fields[1][$i]."</th>";
	}
	$contactlist .= "</tr></thead>";
	
	$sql = "SELECT * FROM `contactlist` WHERE user = $user";
	$columns = [];
	if($result = $conn->query($sql)){
		while($info = $result->fetch_assoc()){
			$contactlist .- "<tr>";
			for($j = 0; $j < count($fields[0]); $j++){
				$contactlist .= "<td>".$info[$fields[0][$j]]."</td>";
			}
			$contactlist .= "</tr>";
		}
	}
	$check = 0;
	$empty = "";
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
		<form action="addField.php">
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
	<center>
<!--  <table class="form-group">
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
      </table> -->


</html>