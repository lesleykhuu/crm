<?php

/**
Methods used to edit contacts. Used in actualContactEdit.php
*/
	class Contact{
		

		private $userInfo = array('firstname' => " ", 'lastname' => " ", 'email' => " ");
		private $user; 
		private $currentEmail;

/**
Instantiates the object by email
*/
		public static function GetByEmail($email){ 
			include 'connection.php';
			session_start();
			global $user;
			$user = $_SESSION['user'];
			if(!isset($user)){
				header("Location: index.html");
			}

			global $userInfo;
			global $currentEmail;
			$sql = "SELECT * FROM `contactlist` WHERE `email`='$email' AND `user`='$user'";
			$result = $conn->query($sql);
			$info = $result->fetch_assoc();

			$userInfo['firstname'] = $info['firstname'];
			$userInfo['lastname'] = $info['lastname'];
			$userInfo['email'] = $info['email'];
			$currentEmail = $info['email'];
			// echo $userInfo['email'];
			// echo $currentEmail;
			//echo $userInfo['firstname'];
			
		}

/**
Instantiates the object by contactId
*/
		public static function GetById($id){
			include 'connection.php';
			session_start();
			global $user;
			$user = $_SESSION['user'];
			if(!isset($user)){
				header("Location: index.html");
			}

			global $userInfo;
			global $currentEmail;
			$sql = "SELECT * FROM `contactlist` WHERE `contactId`='$id' AND `user`='$user'";
			$result = $conn->query($sql);
			$info = $result->fetch_assoc();

			$userInfo['firstname'] = $info['firstname'];
			$userInfo['lastname'] = $info['lastname'];
			$userInfo['email'] = $info['email'];
			$currentEmail = $info['email'];
			// echo $userInfo['email'];
			// echo $currentEmail;
			//echo $userInfo['firstname'];
			
		}
/**
Sets the value of a column you want to edit.
$set can be firstname, lastname, or email
$value is the new value you want to store
*/
		public function setValue($set, $value){
			include 'connection.php';

			global $userInfo;
			$userInfo[$set] = $value;
			

		}
/**
Gets the column from the database and returns it.
*/
		public function getValue($value){
			global $userInfo;
			if($value == 'firstname'){
				return $userInfo['firstname'];
			}
			else if($value == 'lastname'){
				return $userInfo['lastname'];
			}
			else if($value == 'email'){
				return $userInfo['firstname'];
			}
			else if($value == 'email'){
				return $userInfo['email'];
			}
			else if($value == 'contactId'){
				return $userInfo['contactId'];
			}
			else{
				return "Invalid parameter";
			}
		}

/**
Saves the values, that you set in setValue, into the database
*/
		public function Save(){
			include 'connection.php';

			global $userInfo;
			global $user;
			global $currentEmail;
			$firstname = $userInfo['firstname'];
			$lastname = $userInfo['lastname'];
			$email = $userInfo['email'];

			$x = $userInfo['email'];
			// echo $currentEmail;
			// echo $email;
			// echo $user;
			$sql = "UPDATE `contactlist` SET `firstname`= '$firstname', `lastname`= '$lastname', `email`= '$email' WHERE `email` ='$currentEmail' AND `user` = '$user'";
			$result = $conn->query($sql);


			//check if it updated
			// $sql = "SELECT * FROM `contactlist` WHERE `email`='$email' AND `user`='$user'";
			// $result = $conn->query($sql);
			// $info = $result->fetch_assoc();

			// $userInfo['firstname'] = $info['firstname'];
			// $userInfo['lastname'] = $info['lastname'];
			// $userInfo['email'] = $info['email'];

			// echo $userInfo['firstname'];
			// echo $userInfo['lastname'];
			// echo $userInfo['email'];
		}

	}

