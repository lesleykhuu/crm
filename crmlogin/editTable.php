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

?>
 
<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<script>
	$(document).ready(function(){
	//     $("#removeField").addClass("changeColor");
		// $("#addField").click(function() {
	 //        var input = this;
	 //        input.disabled = true;
	 //        setTimeout(function() {
	 //           input.disabled = false;
	 //        }, 3000);

  //   	}); 
    	// function clickAdd(){
    	// 	document.getElementById("addField").disabled = true;
    	// 	document.getElementById("removeField").disabled = false;
    	// 	$("#addField").addClass("addBtn");

    	// }
    	// function clickRemove(){
    	// 	document.getElementById("removeField").disabled = true;
    	// 	document.getElementById("addField").disabled = false;
    	// }

    	$("button#addField").click(function(){
    		document.getElementById("addField").disabled = true;
    		document.getElementById("removeField").disabled = false;
       		$("#addField").addClass("addBtn");
       		$("#removeField").removeClass("removeBtn");
       		$("#removeTable").addClass("hidden1");
       		$("#removeTable").removeClass("visible1");
       		$("#addTable").addClass("visible1");

       		// $("#addTable").addClass("visible1");
       		// $("#removeTable").addClass("hidden1");

    	});
    	$("button#removeField").click(function(){
    		document.getElementById("removeField").disabled = true;
    		document.getElementById("addField").disabled = false;
       		$("#removeField").addClass("removeBtn");
       		$("#addField").removeClass("addBtn");
       		$("#addTable").addClass("hidden1");
       		$("#addTable").removeClass("visible1");
       		$("#removeTable").addClass("visible1");

       		// $("#removeTable").addClass("visible1");
       		// $("#")
       		// $("#addTable").addClass("hidden1");

    	});
  // 		$remove  
		// $(function(){
		//   $("input.myclass").attr("disabled", true);
		// });
		// $('input[type="button.removeField"]').click(function() {
	 //        var input = this;
	 //        input.disabled = true;
	 //        // setTimeout(function() {
	 //        //    input.disabled = false;
	 //        // }, 3000);

  //   	});    

	});
	</script>

	<script src="editTable.js"></script>

	<div class="logout">
		<form action="logout.php">
			<button type="submit" class="btn btn-success btn-xs">Logout</button><br>
		</form>
		
	</div>
	</head>

	<body>
		<br>
		<center>
		<div>
			<p class="title"> <strong>Edit Table</strong></p><br>
		</div>


		<div id="addTable" class="form-group">

			<!-- <nav id="nav01"> </nav> -->

			<div class='menuBtn addBtn'>
				<button id='addField' class='buttons' value='Add Field' onclick="clickAdd()">Add Field</button>
			</div>
			<div class='menuBtn removeBtn'>
				<button id='removeField' class='buttons' value='Remove Field' onclick="clickRemove()">Remove Field</button>
			</div>



<!--               -->

			<div class="clear" style="float:left; border-style:solid; width:50%; background-color:#FFF4CB">
			<table style="width: 40%" class="table table-bordered">
			
			<?php
				echo $add1;
				
			?>
	
			</table>
		</div>
		<div style="float:left" class="form-group">
			<form action="addField2.php" style="float: left; width:100%" method="post">
				<label class="inputlabel"> Add Field</label>
				<input type="text" placeholder="ex. Username" name='field' class="form-control">			
				<input type="submit" value="Add Field" class="btn btn-success btn-block">
			</form>
		</div>

		<div class="clear"></div>
		<br>

				<form action="welcome.php">
					<button type="submit" name="home" class="btn btn-success">Home
				</form>

		</div>


		<div id="removeTable" class="form-group hidden1">

			<!-- <nav id="nav01"> </nav> -->

			<div class='menuBtn addBtn'>
				<button id='addField' class='buttons' value='Add Field' onclick="clickAdd()">Add Field</button>
			</div>
			<div class='menuBtn removeBtn'>
				<button id='removeField' class='buttons' value='Remove Field' onclick="clickRemove()">Remove Field</button>
			</div>


			<div class="clear" style="float:left; border-style:solid; width:50%; background-color:#FFF4CB">
			<table style="width: 40%" class="table table-bordered">
			<form action="removeField2.php" method="get">
			
			<?php
				echo $remove1;
				
			?>
	
			</table>
		</div><div class="clear"></div>
		<br>
				<input type="submit" name="delete" value="Delete" class="btn btn-success">
				
			</form>
			<br><br>
			<form action="welcome.php">
				<button type="submit" name="home" class="btn btn-success">Home
			</form>
		</div>





		</center>
	
	</body>



</html>