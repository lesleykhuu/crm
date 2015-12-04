<?php
/*
Takes in values from contactedit2.php and changes them in the database.

*/
require 'Contact.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contactId = $_POST['contactId'];

$check = 0;

if(!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['email'])){
	// $obj = new Contact();
	// $obj::GetByEmail($actualEmail);
	$obj = Contact::GetById($contactId);
	// echo $contactId;
	if(!empty($_POST['firstname'])){
		$obj->setValue('firstname',$firstname);
	}
	if(!empty($_POST['lastname'])){
		$obj->setValue('lastname',$lastname);
	}
	if(!empty($_POST['email'])){
		$obj->setValue('email',$email);
	}

	$obj->Save();
}

	
if($check == 0){
	header("Location: contactedit.php");
}
