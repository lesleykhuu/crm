<?php
	session_start();
	$user = $_SESSION['user'];
	if(!isset($user)){
		header("Location: index.html");
	}
	
	require 'Table.php';
	$add = new Table();
	$add1 = $add->addRemoveField('add',$user);

	$remove = new Table();
	$remove1 = $remove->addRemoveField('remove',$user);

	if(isset($_SESSION['removeField'])) {
		$a = "<div id='addTable' class='width50 hidden1'>";
		$b = "<button class='addField buttons' value='Add Field'>Add Field</button>";
		$c = "<div id='removeTable' class='width50'>";
		$d = "<button class='removeField buttons pressedBtn' value='Remove Field'>Remove Field</button>";
		unset($_SESSION['removeField']);
	}
	else{
		$a = "<div id='addTable' class='width50'>";
		$b = "<button class='addField buttons pressedBtn' value='Add Field'>Add Field</button>";
		$c = "<div id='removeTable' class='width50 hidden1'>";
		$d = "<button class='removeField buttons' value='Remove Field'>Remove Field</button>";
	}

?>
 
<!DOCTYPE HTML>
<html>
	<head>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<script>
	$(document).ready(function(){

    	$("button.addField").click(function(){
    		document.getElementsByClassName("addField").disabled = true;
    		document.getElementsByClassName("removeField").disabled = false;
       		$(".addField").addClass("pressedBtn");
       		$(".removeField").removeClass("pressedBtn");
       		$("#removeTable").addClass("hidden1");
       		$("#removeTable").removeClass("visible1");
       		$("#addTable").addClass("visible1");

    	});
    	$("button.removeField").click(function(){
    		document.getElementsByClassName("removeField").disabled = true;
    		document.getElementsByClassName("addField").disabled = false;
       		$(".removeField").addClass("pressedBtn");
       		$(".addField").removeClass("pressedBtn");
       		$("#addTable").addClass("hidden1");
       		$("#addTable").removeClass("visible1");
       		$("#removeTable").addClass("visible1");

    	});
    	$('tr').click(function(event) {
		  	console.log(event);
		    if (event.target.type !== 'checkbox') {
		      $(':checkbox', this).trigger('click');
		    }
  		});

	});
	</script>

	<!-- <script src="editTable.js"></script> -->

	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="button">Logout</button><br>
		</form>
		
	</div>
	<div class="clear"></div>
	</head>

	<body>
		<br>
		<center>
		<div>
			<p class="title"> <strong>Edit Table</strong></p><br>
		</div>


<!-- 		<div id="addTable" class="form-group">
		<div id="addTable" class="form-group hidden1"> -->
		<?php echo $a ?>


			<!-- <nav id="nav01"> </nav> -->





<!--               -->
		<div class="width50 minTable">
			<div class='menuBtn pressedBtn'>
<!-- 				<button class='addField buttons pressedBtn' value='Add Field'>Add Field</button>
				<button class='addField buttons' value='Add Field'>Add Field</button> -->
				<?php echo $b ?>

			</div>
			<div class='menuBtn pressedBtn'>
				<button class='removeField buttons' value='Remove Field'>Remove Field</button>
			</div>
			<div class="clear"></div>
		<div class="edittable">
			<div class="maxHeight" style="">
				<table class="edittableDisplay">
				<?php
					echo $add1;
					
				?>
		
				</table>
			</div>
			<div style="width:90%" class="">
				<br>
				<form action="addField2.php" style="width:100%;" method="post">
					<label class="inputlabel"> Add Field</label>
					<input type="text" placeholder="ex. Username" name='field' class="fleft blackBorder">			
					<input type="submit" value="Add Field" class="button">
				</form>
				<br>
				<form action="welcome.php">
					<button type="submit" name="home" class="button">Home
				</form>
			</div>
			<br>
		</div>
			<!-- <div class="clear"></div> -->
			


			</div>
		</div>
<!-- 		<div id="removeTable" class="form-group hidden1">
		<div id="removeTable" class="form-group"> -->
		<?php echo $c ?>


			<!-- <nav id="nav01"> </nav> -->

		<div class="width50 minTable">
			<div class='menuBtn pressedBtn'>
				<button class='addField buttons' value='Add Field'>Add Field</button>
			</div>
			<div class='menuBtn pressedBtn'>
			<!-- 	<button class='removeField buttons' value='Remove Field'>Remove Field</button>
				<button class='removeField buttons pressedBtn' value='Remove Field'>Remove Field</button> -->
				<?php echo $d ?>

			</div>

			<div class="clear" />
			<div class="edittable">
				<div class="maxHeight">
					<table class="edittableDisplay">
						<form action="removeField2.php" method="get">
					
						<?php
							echo $remove1;
							
						?>
			
						</table>
						<br>
				</div>
					<br><br><br><br>
					<div style="width:90%" >
							<input type="submit" name="delete" value="Remove Field" class="button">
						</form>
						<br><br>
						<form action="welcome.php">
							<button type="submit" name="home" class="button">Home</button>
						</form>
						<br>
					</div>	

			</div>
			
		</div>
		</center>
	
	</body>


</html>