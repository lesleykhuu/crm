<?php
/*
Takes in values from contactedit2.php and changes them in the database.

*/
require 'Contact.php';
require 'Table.php';
$contactId = $_POST['contactId'];
$user = $_POST['user'];
$fieldVals = $_POST['fields'];
$message = "";

$obj = new Table();
$fields = $obj->getColFields($user);
// print_r($fieldVals);
$check =1;
for($i=0; $i < count($fieldVals); $i++){
	if("" != $fieldVals[$i]){
		$check = 0;
		break;
	}
}

if($check == 0){
	$obj = Contact::GetById(NULL);
	$obj->setValue('user',$user);
	$obj->setValue('contactId',$contactId);
	// print_r($fields);
	for($i = 0; $i < count($fields[0]); $i++){
		$obj->setValue($fields[0][$i], $fieldVals[$i]);
		echo $fields[0][$i]."<br>";
	}
	// $obj->Save();
}
else{
	$message = "Form was empty!<br><br>";
	// header("Location: contactedit.php"	);
}

	
if($check == 0){
	// header("Location: contactedit.php");
}
