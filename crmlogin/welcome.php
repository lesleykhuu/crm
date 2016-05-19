<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.php");
	}

	require 'Table.php';
	require 'connection.php';
	$obj = new Table();
	$contactlist = $obj->printTable('welcome',$user);
	$check = $contactlist[1];
	$sql = "SELECT `username` FROM `users` where user=$user";
	$result = $conn->query($sql);
	$username = $result->fetch_assoc();

	// $welcome = "Welcome ".$user;
	$welcome = "Welcome ".$username['username'];

?>
<!DOCTYPE HTML>
<html>
	<head>	

	<link rel="stylesheet" type="text/css" href="styles.css">


	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="button">Logout</button><br>
		</form>
		
	</div>
	<div class="clear"></div>
	
		<center><br><strong><p class="title"><?php echo $welcome ?></p></strong></center></head>

	<body>
		<br>
		<center>
	
		<div>
			<p class="title"> Contact List</p>
		</div>

		<div class="homepage">
		<div class="homepageButtonsLayout">
			<form action="contactcreate.php" method = "post">
				<input type="hidden" name="initCreate" value = "0" >			
				<input type="submit" value="Create Contact" class="button width80">
			</form>
		</div>
		<div class="homepageButtonsLayout">
			
			<form action="contactedit.php">
				<input type="submit" value="Edit Contact" class= "button width80">
			</form>
		</div>
		<div class="homepageButtonsLayout">
			<form action="removecontact.php">
				<input type="submit" value="Remove Contact" class="button width80">
			</form>
		
		</div>
		<!-- <form action="addField.php"> -->
		<div class="homepageButtonsLayout">
			<form action="editTable.php">
				<input type="submit" value="Edit Table" class="button width80">
			</form>
		</div>
	</div>
<br>
<br>
<br>
<br>
<br>
		<div>
<!-- 			<table style="width: 40%" class="table table-striped js-table">
 -->
			<table style="width: 40%" class="table js-table">

			
			<?php
			if($check == 0){
				echo $contactlist[0];				
			}

			?>

	
			</table>
			<div id="emptycontact">

			<?php
			if($check == 1){
				echo "Contact list is empty";
			}

			?>
			
			</div>
		</div>
		</center>

		<div class="objects"></div>

	</body>


</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- <script src="reorder.js"></script> -->
<script src="accessData.js"></script>
<!-- 

<table class="bordered">
    <thead>
        <tr>
            <th><label>Labels</label></th>
            <th><label>Labels</label></th>
            <th><label>Labels</label></th>
            <th><label>Labels</label></th>
            <th><label>Labels</label></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><label>Value</label></td>
            <td><label>Value</label></td>
            <td><label>Value</label></td>
            <td><label>Value</label></td>
            <td><label>Value</label></td>                            
        </tr>
    </tbody>                    
</table> -->