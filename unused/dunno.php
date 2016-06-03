<?php 
	session_start();
	$user = $_SESSION['user'];
	$welcome = "Welcome ".$user;
	if(!isset($user)){
		header("Location: index.php");
	}

	include 'connection.php';
	$sqll = "SELECT `field` FROM `fieldrelation` WHERE `user` = '$user'";
  	$resultt = $conn->query($sqll);
	$i = 0;
	$colNames = [];
	$fields = [];
    while($row = $resultt->fetch_assoc()) {
    	$fieldid = $row['field'];
    	$sql = "SELECT `fieldname` FROM `fields` WHERE `fieldid` = '$fieldid'";
    	$result = $conn->query($sql);
    	$fieldname = $result->fetch_assoc();
    	$fields[$i] = $fieldid;
    	$colNames[$i] = $fieldname['fieldname'];
    	// $colNames[$i] = $row['COLUMN_NAME'];
		// echo "<p>".$row['COLUMN_NAME']."</p>";
    // echo "<p>".$row[$i]."</p>";
    	$i++;
	}
	$contactlist = "<thead><tr id='labels'>";
	$fieldquery ="";
	for($i = 0; $i < count($colNames); $i++){
		$fieldquery .= $fields[$i].",";
		// echo $fields[$i];
		$contactlist .= "<th>".$colNames[$i]."</th>";
 
		// $colList .= "<tr><td style='background-color:grey'><input name='checkbox[]' type='checkbox' value = ".$colNames[$i]."></td>";
		// $colList .= "<td style='background-color: grey ;color:black;font-size: 20px'>".$colNames[$i]."</td></tr>";
		// echo $colNames[$i];
	}
	$queryStr = substr($fieldquery,0, -1);
	// echo "querystr = ".$queryStr;
	$contactlist .= "</tr></thead>";
	// echo $colList;
	// echo $contactlist;		

	$contactlist .=  '<tr class="contactlisting">';
	$sql = "SELECT ".$queryStr." FROM `contactlist` WHERE user = $user";
	$columns = [];
	if($result = $conn->query($sql)){
		$i = 0;
		while($info = $result->fetch_assoc()){
			$columns[$i] = $info['field'];
			// echo $info['field'];
			// echo "yoyoyo";
			// for($j = 0; $j < count($colNames); $j++){
			// 	$contactlist .= "<td>".$info[$colNames[$j]]."</td>";
			// }	
			$i++;
		}
			// $contactlist .= "</tr>";
	}
	$queryStr ="";
	for($i = 0; $i < count($columns); $i++){
		$queryStr .= "column_name = ".$columns[$i]." AND";
	}
	$queryStr = substr($queryStr,0, -4);
	// $sql = "SELECT * FROM `contactlist` WHERE ".$queryStr;
	// $resultt = $conn->query($sql);

	include 'connection.php';
	$check = 0;
	$sql = "SELECT * FROM `$user`";
	// $result = $conn->query($sql);
	$sqll = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$user'";
	$resultt = $conn->query($sqll);
	$i = 0;
	$colNames = [];
	$contactlist = "<thead><tr id='labels'>";
    while($row = $resultt->fetch_assoc()) {
    	$colNames[$i] = $row['COLUMN_NAME'];
    	$contactlist .= "<th>".$colNames[$i]."</th>";
    	$i++;
	}
	$contactlist .= "</tr></thead>";

	$empty = "";
	$contactlist .=  '<tr class="contactlisting">';
	if($result = $conn->query($sql)){
		while($info = $result->fetch_assoc()){
			echo "yoyoyo";
			for($j = 0; $j < count($colNames); $j++){
				$contactlist .= "<td>".$info[$colNames[$j]]."</td>";
			}	
			$contactlist .= "</tr>";
		}
	}

	// if($result->num_rows == 0){
	// 		$check =1;
	// 		$empty = "Contact list is empty";
	// 	}



	// $check = 0;
	// $sql = "SELECT `firstname`, `lastname`, `email` FROM `contactlist` WHERE `user`='$user'";
	// $result = $conn->query($sql);
	// $contactlist = "<thead><tr id='labels'>
	// 				<th> First Name </th>
	// 				<th> Last Name </th>
	// 				<th> Email </th>
	// 			</tr></thead>";
	// $empty = "";
	// // $info = $result->fetch_assoc();
	// while($info = $result->fetch_assoc()){
	// 	$contactlist .=  '<tr class="contactlisting">';
	// 	$contactlist .=  "<td>".$info['firstname']."</td>";
	// 	$contactlist .=  "<td>".$info['lastname']."</td>";
	// 	$contactlist .=  "<td>".$info['email']."</td></tr>";	
	// }
	// if($result->num_rows == 0){
	// 	$check =1;
	// 		$empty = "Contact list is empty";
	// 	}





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
 <table class="form-group">
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