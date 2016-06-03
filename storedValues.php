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
// echo is_numeric($_GET['field']);
// echo is_numeric(16);

$orderBy="";

if(isset($_GET['field'])){
	if(is_numeric($_GET['field'])){
		$fieldName = $_GET['field'];
		$orderBy = " ORDER by `".$fieldName."`";
		// echo $orderBy;
	}
}

$sql = "SELECT * FROM `contactlist` WHERE `user`=$user".$orderBy;
// echo $sql;
$result = $conn->query($sql);
$index = 0;
$tmpIndex =0;


$num_elements = count($fields[0]);
for ($i = 0; $i < $num_elements; $i++) {
    $array[$fields[0][$i]] = array();
}

$x = array();
$assoc = array();
// echo "<pre>";
while($info = $result->fetch_assoc()){
	for($i = 0; $i < count($fields[0]); $i++){
// print_r($array[$fields[0][$i]]);
		// $tmpVals = "$tmpVals".$i."[".$tmpIndex."]";
		// echo $tmpVals;
		// echo $fields[0][$i]." ";
		// $tmpArray[$info[$fields[0][$i]]] = $info[$fields[0][$i]];
		// print_r($tmpArray[$info[$fields[0][$i]]]);

		// $array[$fields[0][$i]] = $info[$fields[0][$i]];
		$assoc[$fields[0][$i]] = [$info[$fields[0][$i]]];
		// print_r($assoc);
		$tmpArray[$i] = [$fields[0][$i] => $info[$fields[0][$i]]];
		$tmpArray2[$i] = $info[$fields[0][$i]];
		// array_push($tmpArray, $info[$fields[0][$i]]);
		// array_push($tmpArray, $assoc);
		array_push($array[$fields[0][$i]], $info[$fields[0][$i]]);
	}
	// print_r($assoc);
	array_push($x, $assoc);
		$storedVals[$index] = $tmpArray2;
		$index++;
	$tmpArray = array();
}

echo json_encode($storedVals);

// echo "<pre>";
// echo json_encode($storedVals);
// print_r($array);



/*
// print_r($x);
// // asort($x);
// print_r($x);
// // echo json_encode($array);
// print_r($storedVals);
// array_multisort($storedVals[2],$storedVals[1]);
// print_r($storedVals);

// for($i = 0; $i < $num_elements-1; $i++){
// 	$newArray = array_combine($array[$fields[0][$i]], $array[$fields[0][$i+1]]);
// }




// // echo "<pre>";
// // print_r($array);
// if(isset($_GET['field'])){
// 	$fieldName = $_GET['field'];
// 	// asort($array[$fieldName]);
// 	// echo json_encode($newArray);
// 	// echo json_encode($array);
// 	usort($x, function($a, $b) {
//     	return $a[$fieldName] - $b[$fieldName];
// 	});
// 	// echo json_encode($x);
// }
// // print_r($storedVals);
// // echo "<pre>";
*/

