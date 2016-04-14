<?php 
include 'connection.php';
	$user = $_POST['user'];
	$password = $_POST['password'];
	$enpass = hash('tiger192,3', $password);
	// echo $user." ".$enpass;
	$sql = $conn->prepare("SELECT `username`, `password` FROM `users` WHERE `username` = ?");
	$sql->bind_param('s', $user);
	$sql->execute();
	$result = $sql->get_result();
	$login = $result->fetch_assoc();

	if($user == $login['username'] && $enpass == $login['password']){
		$sql = "SELECT `user` FROM `users` WHERE `username` = '$user'";
		$result = $conn->query($sql);
		$userid = $result->fetch_assoc();
		// echo $userid['user'];

		session_start();

		$_SESSION['user'] = $userid['user'];
		header("Location: welcome.php");
		
	}
	else{
		header("Location: loginerror.html");
	}

