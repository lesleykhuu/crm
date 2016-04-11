<?php
/*
Takes in values from contactedit2.php and changes them in the database.

*/
require 'Contact.php';
// $fieldVals = $_POST['fields'];
$contactId = $_POST['contactId'];
$user = $_POST['user'];

		$message = "";
		$fieldVals = $_POST['fields'];

		$obj = new Contact();
		$fields = $obj->getColFields($user);

		$check =1;
		for($i=0; $i < count($fieldVals); $i++){
			if("" != $fieldVals[$i]){
				$check = 0;
			}
		}
		if($check == 0){
				$obj = Contact::GetById(NULL);
				$obj->setColumns('user');
				$obj->setValue('user',$user);
				$obj->setColumns('contactId');
				$obj->setValue('contactId',$contactId);

				for($i = 0; $i < count($fields[0]); $i++){
					$obj->setColumns($fields[0][$i]);
					$obj->setValue($fields[0][$i], $fieldVals[$i]);
				}
				$obj->Save();
				// $message = "Contact Added!<br><br>";
		}
		else{
			$message = "Form was empty!<br><br>";
			header("Location: contactedit.php"	);
		}

	
if($check == 0){
	header("Location: contactedit.php");
}
