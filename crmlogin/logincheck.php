<?php 
include 'connection.php';
	$user = $_POST['user'];
	$password = $_POST['password'];
	$enpass = hash('tiger192,3', $password);
	echo $user." ".$enpass;
	$sql = $conn->prepare("SELECT `username`, `password` FROM `users` WHERE `username` = ?");
	$sql->bind_param('s', $user);
	$sql->execute();
	$result = $sql->get_result();

	//$result = $conn->query($sql);
	//$login = $result->mysqli_fetch_assoc();

	$login = $result->fetch_assoc();

	//printf("%s (%s)\n",$login['username'],$login['password']);
	//print_r($login['username']);
	//echo "yoyo".$login['password'];

	if($user == $login['username'] && $enpass == $login['password']){
		session_start();
		$_SESSION['user'] = $user;
		header("Location: login.php");
		
	}
	else{
		header("Location: loginerror.html");
	}

