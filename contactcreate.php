<?php 
	include 'connection.php';
	include 'Contact.php';
	require 'Table.php';
	include_once 'header.html';

	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	$message = "";
	$init = $_POST['initCreate'];
	$obj = new Table();
	$fields = $obj->getColFields($user);
	if($init == 1){
		$fieldVals = $_POST['fields'];
		$check =1;

		for($i=0; $i < count($fieldVals); $i++){
			if($fieldVals[$i] != ""){
				$check = 0;
			}
		}

		if($check == 0){
			$obj = Contact::GetById(NULL);
			$obj->setValue('user',$user);
			for($i = 0; $i < count($fields[0]); $i++){
				$obj->setValue($fields[0][$i], $fieldVals[$i]);
			}
			$obj->Save();
			$message = "Contact Added!<br><br>";
		}
		else{
			$message = "Form was empty!<br><br>";
		}
		
	}

	$contactlist = "";
	for($i = 0; $i < count($fields[1]); $i++){
		$contactlist .= "<label class='inputlabel'>".$fields[1][$i]."</label>
				<input type='text' placeholder='".$fields[1][$i]."' class='fleft ".$fields[1][$i]."' name='fields[]'><br><br>";
	}

?>
<!DOCTYPE HTML>
<html>
	<head>

		<script> </script>

	</head>

	<body>
		<br>
		<center>

		<div>
			<p class="title"> <strong>Create Contact</strong></p><br>
		</div>
		<div class="box">
			<br>
			<form action="contactcreate.php" method="post" class="homeforms">
							
				
			<?php
				echo $contactlist;
				echo $message;
			
			?>
				<input type="hidden" name="initCreate" value = "1" >			
				<input type="submit" value="Create Contact" class="button">
			</form>


			<form action="welcome.php" class="homeforms">
				<button type="submit" class="button">Home</button><br>
			</form>
		</div>
		</center>
	
	</body>



</html>