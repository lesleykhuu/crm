<?php

/**
@brief Methods used to edit contacts. Used in actualContactEdit.php
*/
	class Contact{
		

		private $userInfo = array('contactId' => " ",'firstname' => " ", 'lastname' => " ", 'email' => " ");

/**
@brief Instantiates the object by contactId
@param $id is the contactId of the contact that is being editted
*/
		public static function GetById($id){
			include 'connection.php';

			$sql = "SELECT * FROM `contactlist` WHERE `contactId`='$id'";
			$contact = new Contact();
			$result = $conn->query($sql);
			$info = $result->fetch_assoc();

			$contact->userInfo['firstname'] = $info['firstname'];
			$contact->userInfo['lastname'] = $info['lastname'];
			$contact->userInfo['email'] = $info['email'];
			$contact->userInfo['contactId'] = $info['contactId'];

			return $contact;


			
		}

/**
@brief Sets the value of a column you want to edit.
@param $set can be firstname, lastname, or email. First argument
@param $value is the new value you want to store. Second argument
*/
		public function setValue($set, $value){
			if($set == 'firstname'){
				$this->userInfo['firstname'] = $value;
			}
			else if($set == 'lastname'){
				$this->userInfo['lastname'] = $value;
			}
			else if($set == 'email'){
				$this->userInfo['email'] = $value;
			}

			
		}
/**
@brief Gets the column from the database and returns it.
*/
		public function getValue($value){
			if($value == 'firstname'){
				return $this->userInfo['firstname'];
			}
			else if($value == 'lastname'){
				return $this->userInfo['lastname'];
			}
			else if($value == 'email'){
				return $this->userInfo['email'];
			}
			else if($value == 'contactId'){
				return $this->userInfo['contactId'];
			}
			else{
				return "Invalid parameter";
			}
		}

/**
@brief Saves the values, that you set in setValue, into the database
*/
		public function Save(){
			include 'connection.php';

			$firstname = $this->userInfo['firstname'];
			$lastname = $this->userInfo['lastname'];
			$email = $this->userInfo['email'];
			$contactId = $this->userInfo['contactId'];
			
			$sql = "UPDATE `contactlist` SET `firstname`= '$firstname', `lastname`= '$lastname', `email`= '$email' WHERE `contactId` = '$contactId'";
			if($result = $conn->query($sql)){
				return true;
			}
			else{
				return false;
			}


		}

	}

// $contact1 = new Contact();
$contact1 = Contact::GetById(2);


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
$contact1->setValue($email1,'LesleyKhuu');


echo $contact1->getValue($firstname1);
echo $contact1->getValue($lastname1);
echo $contact1->getValue($email1);
echo $contact1->getValue($contactId1);
