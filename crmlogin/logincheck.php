<?php 
include 'connection.php';
	$user = $_POST['user'];
	$password = $_POST['password'];
	$enpass = hash('tiger192,3', $password);
	echo $user." ".$enpass;
	$sql = "SELECT username, password FROM users WHERE username='$user'";
	$result = $conn->query($sql);

	$login = $result->fetch_assoc();
	//printf("%s (%s)\n",$login['username'],$login['password']);
	
	if($user == $login['username'] && $enpass == $login['password']){
		session_start();
		$_SESSION['user'] = $user;
		header("Location: login.php");
		
	}
	else{
		header("Location: loginerror.php");
	}

?>