<?php
include 'connection.php';

session_start();
$user = $_SESSION['user'];
if(!isset($user)){
		header("Location: index.html");
	}

$field = $_POST['field'];
if($field != ""){
	$sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE `COLUMN_NAME` = '$field' AND `TABLE_NAME` = 'contactlist'";
}
else{
	header("Location: editTable.php");
}

if($result = $conn->query($sql)){
	// echo $result->num_rows;
	if($result->num_rows){
		header("Location: editTable.php");

	}
	else{
		$sql = "INSERT INTO `fields`(`fieldname`) VALUES ('$field')";
		$conn->query($sql);

		$sql = "SELECT `fieldid` FROM `fields` WHERE `fieldname` = '$field'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$field1 = $row['fieldid'];

		$sql = "INSERT INTO `fieldrelation`(`user`,`field`) VALUES ('$user','$field1')";
		$conn->query($sql);

		$sql = "ALTER TABLE `contactlist` ADD `$field1` VARCHAR(50)";
		$conn->query($sql);

		// echo $conn->error;
		// echo "gg";
		header("Location: editTable.php");

	}
}
else{
	// echo "did not find ".$field.$user;
	echo $conn->error;


}