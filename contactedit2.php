<?php
/*
Allows the user to input the fields they want to edit

*/
include 'connection.php';
require 'Contact.php';
require 'Table.php';

session_start();
$user = $_SESSION['user'];
if(isset($_GET['radio'])){
	$radio = $_GET['radio'];
	$sql = "SELECT * FROM `contactlist` WHERE `contactId`='$radio[0]' AND `user`='$user'";
	$result = $conn->query($sql);
	$info = $result->fetch_assoc();
	// $email = "Editing user, ".$user;
	$email = "Editing user";
	// print_r($info);
}
else{
	header("Location: contactedit.php");

}

$obj = new Table();
$fields = $obj->getColFields($user);

$contactlist = "";
for($i = 0; $i < count($fields[1]); $i++){
	$contactlist .= "<label class='inputlabel'>".$fields[1][$i]."</label>
			<input type='text' placeholder='".$info[$fields[0][$i]]."' value='".$info[$fields[0][$i]]."' name='fields[]' id= ".$fields[0][$i]." class='fleft'><input onClick='makeNull(this)' name='checkbox[]' type='checkbox' class='checkbox' value =".$fields[0][$i].">clear</input><br><br>";
}
			// <input type='text' placeholder='".$fields[1][$i]."' name='fields[]' class='fleft'><br><br>";

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
	</head>

	<body>
		<br>
		<center>
		<div>
			<p class="title"> <strong><?php echo $email ?> </strong></p><br>
		</div>
		<div class="box">
			<br>
			<form action="actualContactEdit.php" method="post" class="homeforms">

				 <?php echo $contactlist; ?>

				<input type="hidden" name='actualEmail' value = <?php echo $radio[0]; ?> >			
				<input type="hidden" name='contactId' value = <?php echo $info['contactId']; ?> >			
				<input type="hidden" name='user' value = <?php echo $user; ?> >			

			
				<input type="submit" value="Edit Contact" class="button">
			</form>


			<br>
			<form action="welcome.php" class="homeforms">
				<button type="submit" class="button">Home</button>
			</form>
			<br>
		</div>
		</center>
	
	</body>

<script>
var makeNull = function(event){
	// console.log(event.checked);
	if(event.checked == true){
		console.log(document.getElementById(event.value).value);
		document.getElementById(event.value).value = "";
		// console.log(document.getElementById(event.value));
		document.getElementById(event.value).disabled = true;
	}
	else{
		// console.log(document.getElementById(event.value).placeholder);
		document.getElementById(event.value).value = document.getElementById(event.value).placeholder;
		document.getElementById(event.value).disabled = false;
		// console.log(document.getElementById(event.value));

	}
	// console.log(document.getElementById(event.value).value = "Empty");
	// document.getElementById(event.value).disabled = "disabled";
	
}
</script>


</html>