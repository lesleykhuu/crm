<?php

/**
@brief Methods used to edit contacts. Used in actualContactEdit.php
*/
class Contact{
	
	private $userInfo = array('user' => NULL, 'contactId' => NULL,'firstname' => NULL, 'lastname' => NULL, 'email' => NULL);

	/**
	@brief Instantiates the object by contactId
	@param $id is the contactId of the contact that is being editted. If 
	*/
	public static function GetById($id){
		require 'connection.php';
		$contact = new Contact();

		if($id != NULL){
			$sql = "SELECT * FROM `contactlist` WHERE `contactId`='$id'";
			$result = $conn->query($sql);
			$info = $result->fetch_assoc();

			$contact->setValue('firstname', $info['firstname']);
			$contact->setValue('lastname', $info['lastname']);
			$contact->setValue('email', $info['email']);
			$contact->setValue('contactId', $info['contactId']);

		}

		return $contact;
		
	}

	/**
	@brief Sets the value of a column you want to edit.
	@param $set can be firstname, lastname, or email. First argument
	@param $value is the new value you want to store. Second argument
	*/
	public function setValue($set, $value){
		if($set == 'firstname'){
			$this->userInfo['firstname'] = mysql_escape_string($value);
		}
		else if($set == 'lastname'){
			$this->userInfo['lastname'] = mysql_escape_string($value);
		}
		else if($set == 'email'){
			$this->userInfo['email'] = mysql_escape_string($value);
		}
		else if($set == 'user'){
			$this->userInfo['user'] = mysql_escape_string($value);
		}
		else if($set == 'contactId'){
			$this->userInfo['contactId'] = mysql_escape_string($value);
		}
		else{
			echo "setValue error";
		}

		
	}

	/**
	@brief Gets the column from the database and returns it.
	*/
	public function getValue($value){
		if(mysql_escape_string($value) == 'firstname'){
			return $this->userInfo['firstname'];
		}
		else if(mysql_escape_string($value) == 'lastname'){
			return $this->userInfo['lastname'];
		}
		else if(mysql_escape_string($value) == 'email'){
			return $this->userInfo['email'];
		}
		else if(mysql_escape_string($value) == 'contactId'){
			return $this->userInfo['contactId'];
		}
		else if(mysql_escape_string($value) == 'user'){
			return $this->userInfo['user'];
		}
		else{
			return "Invalid parameter. getValue error";
		}
	}

	/**
	@brief Saves the values, that you set in setValue, into the database
	*/
	public function Save(){
		require 'connection.php';

		$firstname = $this->userInfo['firstname'];
		$lastname = $this->userInfo['lastname'];
		$email = $this->userInfo['email'];
		$contactId = $this->userInfo['contactId'];
		$user = $this->userInfo['user'];
		// echo $contactId;
		// echo "<br>";
		// echo "<br>".$firstname.$lastname.$contactId.$user.$email;

		if($contactId != NULL){
			$sql = "UPDATE `contactlist` SET `firstname`= '$firstname', `lastname`= '$lastname', `email`= '$email' WHERE `contactId` = '$contactId'";
			if($result = $conn->query($sql)){
				// echo "updated";
				return true;
			}
			else{
				// echo "UPDATEERROR";
				return false;
			}

		}
		else if ($user != NULL){
			$sql = "INSERT INTO `contactlist`(`user`, `firstname`, `lastname`, `email`) VALUES ('$user','$firstname','$lastname','$email')"; 
			if($result = $conn->query($sql)){

				return true;
			}
			else{
				return false;
			}
		}

	}

}


/*
// $contact1 = new Contact();
$contact1 = Contact::GetById(2);
// $contact1 = Contact::GetById(NULL);


// $properties = array_filter(get_object_vars($contact));
// echo ($properties);

// $contact = new Contact();
// $contact::GetById(2);
$firstname1 = 'firstname';
$lastname1 = 'lastname';
$email1 = 'email';
$contactId1 = 'contactId';


echo $contact1->getValue($firstname1);
echo $contact1->getValue($lastname1);
echo $contact1->getValue($email1);


$contact1->setValue($firstname1,'Lesley');
$contact1->setValue($lastname1,'Khuu');
$contact1->setValue($email1,'Yoyoyooy');


echo $contact1->getValue($firstname1);
echo $contact1->getValue($lastname1);
echo $contact1->getValue($email1);
echo $contact1->getValue($contactId1);
*/