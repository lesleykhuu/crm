<?php
include 'connection.php';

session_start();
$user = $_SESSION['user'];

if(isset($_GET['checkbox'])){
	$checkbox = $_GET['checkbox'];
	$length = count($checkbox);
	$queryStr = "";
	$query = "";
	// print_r($checkbox);
	for($i=0; $i<$length; $i++){

		$queryStr .= "`".$checkbox[$i]."` = NULL,";
		$query .= "".$checkbox[$i].",";
	}	

	// DELETE FROM table WHERE user = $user AND id IN (SELECT id FROM somewhere_else)

	// echo $queryStr."\n";
	$queryStr = substr($queryStr, 0, -1);
	$query = substr($query, 0, -1);
	// if($length < 0){
	// 	$queryStr .= "AND user = ".$user;
	// }
	
	$sql = "DELETE FROM `fieldrelation` WHERE user = $user AND `field` IN (".$query.")";

	// $sql = "DELETE FROM `fieldrelation` WHERE ".$queryStr;
	// echo $sql;
	$conn->query($sql);

	$sql = "UPDATE `contactlist` SET $queryStr WHERE user = $user";
	// echo $sql;
	$conn->query($sql);
	// echo $conn->error;

	$sql = "DELETE FROM `fields` where `fieldid` NOT IN (SELECT `field` FROM `fieldrelation`)";
	
	if($conn->query($sql))
		echo "Column Dropped<br><br>";
	else
		echo $conn->error;


	// $sql = "ALTER TABLE `contactlist` DROP COLUMNwhere `fieldid` NOT IN (SELECT `field` FROM `fieldrelation`)";
	// $conn->query($sql);
}
header("Location: removeField.php");
