<?php
session_start();
$user = $_SESSION['user'];
if(!isset($user)){
	header("Location: index.php");
}

require('connection.php');
require('Table.php');

$obj = new Table();
$fields = $obj->getColFields($user);


$storedVals = array();
$tmpArray = array();

$sql = "SELECT * FROM `contactlist` WHERE `user`=$user";
$result = $conn->query($sql);
$index = 0;
$tmpIndex =0;


$num_elements = count($fields[0]);
for ($i = 0; $i < $num_elements; $i++) {
    $array[$fields[0][$i]] = array();
}


while($info = $result->fetch_assoc()){
	for($i = 0; $i < count($fields[0]); $i++){
// print_r($array[$fields[0][$i]]);
		// $tmpVals = "$tmpVals".$i."[".$tmpIndex."]";
		// echo $tmpVals;
		// echo $fields[0][$i]." ";
		// $tmpArray[$info[$fields[0][$i]]] = $info[$fields[0][$i]];
		// print_r($tmpArray[$info[$fields[0][$i]]]);

		// $array[$fields[0][$i]] = $info[$fields[0][$i]];
		array_push($array[$fields[0][$i]], $info[$fields[0][$i]]);
	}
		$storedVals[$index] = $tmpArray;
		$index++;
}


// echo "<pre>";
// print_r($array);
echo json_encode($array);
// print_r($storedVals);
// echo "<pre>";