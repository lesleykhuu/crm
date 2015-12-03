<?php
/*
Takes in values from contactedit2.php and changes them in the database.

*/
	include 'Contact.php';
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	// $actualEmail = $_POST['actualEmail'];
	$contactId = $_POST['contactId'];
	// echo $actualEmail;
	// echo $firstname;
	// echo $email;
	$check = 0;

	if(!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['email'])){
		$obj = new Contact();
		// $obj::GetByEmail($actualEmail);
		$obj::GetById($contactId);
		if(!empty($_POST['firstname'])){
			$obj->setValue('firstname',$firstname);
		}
		if(!empty($_POST['lastname'])){
			$obj->setValue('lastname',$lastname);
		}


		if(!empty($_POST['email'])){
			// include 'connection.php';
			// $sql = "SELECT `email` FROM `contactlist` WHERE `email`='$email' AND `user`='$user'";
			// $result = $conn->query($sql);
			// if($result->num_rows > 0){
			// 	$check = 1;
			// 	header("Location: editerror.html");

			// }

			$obj->setValue('email',$email);
		}

		$obj->Save();
	}
	
	
if($check == 0){
	header("Location: contactedit.php");
}
