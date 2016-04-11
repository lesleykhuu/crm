<?php
/*
Allows the user to input the fields they want to edit

*/
include 'connection.php';

session_start();
$user = $_SESSION['user'];
if(isset($_GET['radio'])){
	$radio = $_GET['radio'];
	//uncomment to check index
	// echo $radio[0];


	$sql = "SELECT * FROM `contactlist` WHERE `contactId`='$radio[0]' AND `user`='$user'";
	$result = $conn->query($sql);
	$info = $result->fetch_assoc();
	$email = "Editing user, ".$user;
	// echo $info['contactId'];

}
else{
	header("Location: contactedit.php");

}

require 'Contact.php';
$obj = new Contact();
$fields = $obj->getColFields($user);

$contactlist = "";
$fieldquery ="";
for($i = 0; $i < count($fields[1]); $i++){
	$contactlist .= "<label class='inputlabel'>".$fields[1][$i]."</label>
			<input type='text' placeholder='".$fields[1][$i]."' name='fields[]' class='form-control'><br><br>";
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
	</head>

	<body>
		<br>
		<center>
		<div>
			<p class="title"> <strong><?php echo $email ?> </strong></p><br>
		</div>
		<div class="box">
			<form action="actualContactEdit.php" method="post">
				<!-- <label class="inputlabel"> Edit First Name</label>
				<input type="text" placeholder="First Name" name='firstname' value=<?php echo $info['firstname'] ?> class="form-control"><br><br>
				
				<label class="inputlabel"> Edit Last Name</label>
				<input type="text" placeholder="Last Name" name='lastname' value=<?php echo $info['lastname'] ?> class="form-control"><br><br>
				
				<label class="inputlabel"> Edit Email</label>
				<input type="text" placeholder="Email" name='email' value=<?php echo $info['email'] ?> class="form-control"><br><br>			
				 -->
				 <?php echo $contactlist; ?>

				<input type="hidden" name='actualEmail' value = <?php echo $radio[0]; ?> ><br><br>			
				<input type="hidden" name='contactId' value = <?php echo $info['contactId']; ?> ><br><br>			
				<input type="hidden" name='user' value = <?php echo $user; ?> ><br><br>			

			
				<input type="submit" value="Edit Contact" class="btn btn-success button">
			</form>


			<br>
			<form action="welcome.php">
				<button type="submit" class="btn btn-success button">Home</button><br>
			</form>
		</div>
		</center>
	
	</body>



</html>