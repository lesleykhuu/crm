<?php

	class Contact{
		

		private $userInfo = array('firstname' => " ", 'lastname' => " ", 'email' => " ");
		private $user;
		private $currentEmail;

		public static function Get($email){
			include 'connection.php';
			session_start();
			global $user;
			$user = $_SESSION['user'];
			$welcome = "Welcome ".$user;
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

		public function setValue($set, $value){
			include 'connection.php';

			global $userInfo;
			$userInfo[$set] = $value;
			

		}

		public function getValue(){
			global $userInfo;
			return $userInfo['firstname'];
		}

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

