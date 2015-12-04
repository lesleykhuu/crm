<?php
include 'connection.php';

session_start();
$user = $_SESSION['user'];

if(isset($_GET['checkbox'])){
	$checkbox = $_GET['checkbox'];
	$length = count($checkbox);
	for($i=0; $i<$length; $i++){
		$sql = "DELETE FROM `contactlist` WHERE `contactId`='$checkbox[$i]' AND `user`='$user'";
		$conn->query($sql);
		//if($conn->query($sql) === TRUE)
			//echo "Contact Added!<br><br>";
		//else
			//echo $conn->error;
	}	
}
header("Location: removecontact.php");
