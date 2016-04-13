<?php 

/**
@brief Methods used to show Table. Used in welcome.php, contactedit.php, removecontact.php
*/

class Table{

	public function getColFields($user){
		require 'connection.php';
		$sqll = "SELECT `field` FROM `fieldrelation` WHERE `user` = '$user'";
	  	$resultt = $conn->query($sqll);
		$i = 0;
		$colNames = [];
		$fields = [];
	    while($row = $resultt->fetch_assoc()) {
	    	$fieldid = $row['field'];
	    	$sql = "SELECT `fieldname` FROM `fields` WHERE `fieldid` = '$fieldid'";
	    	$result = $conn->query($sql);
	    	$fieldname = $result->fetch_assoc();
	    	$fields[$i] = $fieldid;
	    	$colNames[$i] = $fieldname['fieldname'];
	    	$i++;
		}
		return [$fields, $colNames];
	}

	public function printTable($tableType,$user){
		require 'connection.php';
		$obj = new Table();
		$fields = $obj->getColFields($user);
		if($tableType == 'welcome'){
			$header = "<thead><tr id='labels'>";
		}
		else if($tableType == 'edit'){
			$header = "<thead><tr id='labels'><th></th>";
		}
		else if($tableType == 'remove'){
			$header = "<thead><tr id='labels'><th></th>";
		}

		$sql = "SELECT * FROM `contactlist` WHERE user = $user";
		$contactlist = $header;
		for($i = 0; $i < count($fields[1]); $i++){
			$contactlist .= "<th>".$fields[1][$i]."</th>";
		}
		$contactlist .= "</tr></thead>";
		if($result = $conn->query($sql)){
			while($info = $result->fetch_assoc()){
				if($tableType == 'welcome'){
					$contactlist .= "<tr>";
				}
				else if($tableType == 'edit'){
					$contactlist .= "<tr><td><input name='radio[]' type='radio' value = ".$info['contactId']."></td>";
				}
				else if($tableType == 'remove'){
					$contactlist .= "<tr><td><input name='checkbox[]' type='checkbox' value = ".$info['contactId']."></td>";
				}

				for($j = 0; $j < count($fields[0]); $j++){
					$contactlist .= "<td>".$info[$fields[0][$j]]."</td>";
				}
				$contactlist .= "</tr>";
			}
		}
		$isEmpty = 0;
		if($result->num_rows == 0){
			$isEmpty = 1;
		}

		return [$contactlist,$isEmpty];

	}

	public function addRemoveField($addRemove,$user){
		require 'connection.php';
		$sqll = "SELECT `field` FROM `fieldrelation` WHERE `user` = '$user'";
	  	$resultt = $conn->query($sqll);
		$i = 0;
		$colNames = [];
		$fields = [];
	    while($row = $resultt->fetch_assoc()) {
	    	$fieldid = $row['field'];
	    	$sql = "SELECT `fieldname` FROM `fields` WHERE `fieldid` = '$fieldid'";
	    	$result = $conn->query($sql);
	    	$fieldname = $result->fetch_assoc();
	    	$colNames[$i] = $fieldname['fieldname'];
	    	$fields[$i] = $fieldid;
	    	$i++;
		}
		$colList = "";
		if($addRemove == 'add'){
			for($i = 0; $i < count($colNames); $i++){
				$colList .= "<td style='background-color: grey ;color:black;font-size: 20px'>".$colNames[$i]."</td></tr>";
			}
		}
		else if($addRemove == 'remove'){
			for($i = 0; $i < count($colNames); $i++){
				$colList .= "<tr><td style='background-color:grey'><input name='checkbox[]' type='checkbox' value = ".$fields[$i]."></td>";
		 
				// $colList .= "<tr><td style='background-color:grey'><input name='checkbox[]' type='checkbox' value = ".$colNames[$i]."></td>";
				$colList .= "<td style='background-color: grey ;color:black;font-size: 20px'>".$colNames[$i]."</td></tr>";
				// echo $colNames[$i];
			}
		}
		return $colList;
	}

}




