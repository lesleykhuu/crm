<?php 
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.php");
	}

	require 'Table.php';
	$obj = new Table();
	$contactlist = $obj->printTable('remove',$user);
	$check = $contactlist[1];

		
?>

<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="styles.css">

	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="button">Logout</button><br>
		</form>
		
	</div>
	<br>
		<center><br><strong><p class="title">Remove Contact<p></strong></center>
	

	</head>

	<body>
		<br>
		<center>
<br>
<br>

		<div style="width:40%">
			<table style="width: 100%" class="table">
				

				<form action="removecontact2.php" method="get">
			
			<?php
			if($check == 0){
				echo $contactlist[0];
			}
			?>
	
			</table>
			<div id="emptycontact">

			<?php
			if($check == 1){
				echo "Contact list is empty";
			}
			?>
			
			</div>
			<br>
				<input type="submit" name="delete" value="Delete" class="button width50">
				
				</form>
			<br><br>
				<form action="welcome.php">
					<button type="submit" class="button width50">Home</button><br>
				</form>

		</div>
		</center>
	
	</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>

  $('tr').click(function(event) {
  	console.log(event);
    if (event.target.type !== 'checkbox') {
      $(':checkbox', this).trigger('click');
    }
  });


	// $('tr').click(function(e) {

	// 	// alert(e.toUpperCase);
 //    	$('tr').find('input').prop('checked', true);
	// });


</script>
<script src="accessData.js"></script>

</html>
