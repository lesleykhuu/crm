<?php
include 'connection.php';

session_start();
$user = $_SESSION['user'];

if(isset($_GET['checkbox'])){
	$checkbox = $_GET['checkbox'];
	$length = count($checkbox);
	$queryStr = "";
	print_r($checkbox);
	for($i=0; $i<$length; $i++){

		$queryStr .= "`field` = ".$checkbox[$i]." "."OR ";
		
	}	
	// echo $queryStr."\n";
	$queryStr = substr($queryStr, 0, -4);
	$sql = "DELETE FROM `fieldrelation` WHERE ".$queryStr;
	echo $sql;
	// $conn->query($sql);
	$conn->query($sql);

	$sql = "DELETE FROM `fields` where `fieldid` NOT IN (SELECT `field` FROM `fieldrelation`)";
	
	if($conn->query($sql))
		echo "Column Dropped<br><br>";
	else
		echo $conn->error;

	// $sql = "ALTER TABLE `contactlist` DROP COLUMNwhere `fieldid` NOT IN (SELECT `field` FROM `fieldrelation`)";
	// $conn->query($sql);
}
header("Location: removeField.php");
