<?php
include 'connection.php';

// $ah = new Database();

/*
$ah = new Database();

$ah->db()->prepare($query);
*/
session_start();
$user = $_SESSION['user'];

if(isset($_GET['checkbox'])){
	$checkbox = $_GET['checkbox'];
	$length = count($checkbox);
	$queryStr = "";
	$query = "";
	for($i=0; $i<$length; $i++){

		$queryStr .= "`".$checkbox[$i]."` = NULL,";
		$query .= "".$checkbox[$i].",";
	}
		
// $name = mysql_real_escape_string($name);
// 	$query = "SELECT `id`,`name` FROM `contactlist` WHERE `id` = ? AND `name` = ?";

// 	$stmt = $conn->prepare($query);
// 	$stmt->execute(array($id,$name));

// 	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
// 	{
// 		$row->id;
// 		$row["name"];
// 	}



	$queryStr = substr($queryStr, 0, -1);
	$query = substr($query, 0, -1);

	$sql = "DELETE FROM `fieldrelation` WHERE `user` = $user AND `field` IN (".$query.")";
	$conn->query($sql);

	$sql = "UPDATE `contactlist` SET $queryStr WHERE `user` = $user";
	$conn->query($sql);

	$sql = "DELETE FROM `fields` where `fieldid` NOT IN (SELECT `field` FROM `fieldrelation`)";
	// echo $sql;
	if($conn->query($sql))
		echo "Column Dropped<br><br>";
	else
		echo $conn->error;

//remove columns that arent used
	$sqll = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'contactlist'";

  	$resultt = $conn->query($sqll);
	$i = 0;
	$colNames = [];
    while($row = $resultt->fetch_assoc()) {
    	$colNames[$i] = $row['COLUMN_NAME'];

    	$i++;
	}

	$sql = "SELECT * FROM `fields`";
	$existingFields = [];
	$existingFields[0] = 'contactId';
	$existingFields[1] = 'user';
	$i = 2;
	$results = $conn->query($sql);
	while($info = $results->fetch_assoc()){
		$existingFields[$i] = $info['fieldid'];
		$i++;
	}
	$delete = [];
	$k = 0;
	for($i = 0; $i < count($colNames); $i++){
		echo $colNames[$i];
		if(in_array($colNames[$i],$existingFields)){
		}
		else{
			$delete[$k] = $colNames[$i];
			$k++;
		}
	}

	for($i = 0; $i < count($delete); $i++){
		$sql = "ALTER TABLE `contactlist` drop column `$delete[$i]`";
			$conn->query($sql);
			echo $conn->error;
	}
	
}
$_SESSION['removeField'] = "yes";
header("Location: editTable.php");
// header("Location: editTable.php?remove=yes");
?>