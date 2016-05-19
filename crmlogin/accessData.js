
var checker = 0;
var lastClickedField = -1;

var parseData = function(result,clickedField){
	var newTable = "<thead><tr id='labels'>";
	var newRow = "";
	var cellData = "";
	if(clickedField != lastClickedField){
		checker = 0;
	}
	lastClickedField = clickedField;

	if(checker == 0){
		checker = 1;
		// result.reverse();
	}
	else{
		checker = 0;
		result.reverse();
	}

	// 	console.log(document.getElementsByClassName('table')[0].rows[1]);
	// if(document.getElementsByClassName('table')[0].rows[1].innerHTML.indexOf("input")){
	// 	for(i = 0; i < result.length; i++){
	// 		newRow += "<td>" + document.getElementsByClassName('table')[0].rows[i+1].childNodes[0].firstChild.outerHTML + "</td>";
	// 			// console.log(document.getElementsByClassName('table')[0].rows[i+1].innerHTML);
	// 		for(j = 0; j < result[i].length; j++){
	// 			cellData = result[i][j];
	// 			if(cellData == null){
	// 				cellData ="";
	// 			}
	// 			newRow += "<td>"+cellData+"</td>";
				
	// 		}
	// 			document.getElementsByClassName('table')[0].rows[i+1].innerHTML = newRow;
	// 			newRow="";
	// 			// console.log(document.getElementsByClassName('table')[0].rows[i+1].innerHTML);
	// 	}
	// 	console.log(document.getElementsByClassName('table')[0].rows);
	// }
	// else{
		for(i = 0; i < result.length; i++){
				// console.log(document.getElementsByClassName('table')[0].rows[i+1].innerHTML);
			for(j = 0; j < result[i].length; j++){
				cellData = result[i][j];
				if(cellData == null){
					cellData ="";
				}
				newRow += "<td>"+cellData+"</td>";
				
			}
				document.getElementsByClassName('table')[0].rows[i+1].innerHTML = newRow;
				newRow="";
				// console.log(document.getElementsByClassName('table')[0].rows[i+1].innerHTML);
		}
	// }

	// if(document.getElementsByClassName('table')[0].rows[0+1].innerHTML.indexOf("value")){
	// 	console.log(document.getElementsByClassName('table')[0].rows[1].childNodes[0].firstChild.outerHTML);
	// }
		// for(i = 0; i < result.length; i++){
		// 		console.log(document.getElementsByClassName('table')[0].rows[i+1].innerHTML);
		// 	for(j = 0; j < result[i].length; j++){
		// 		cellData = result[i][j];
		// 		if(cellData == null){
		// 			cellData ="";
		// 		}
		// 		newRow += "<td>"+cellData+"</td>";
				
		// 	}
		// 		document.getElementsByClassName('table')[0].rows[i+1].innerHTML = newRow;
		// 		newRow="";
		// 		// console.log(document.getElementsByClassName('table')[0].rows[i+1].innerHTML);
		// }
	

}

function checkVal(radioVal){
	// console.log(radioVal);
}

function loadData(parseData, field){
	$.ajax({
		url: 'storedValues.php',
		type: 'GET',
		dataType: 'json',
		data: {field: field},
		success: function(data){
			parseData(data, field);
		},
		error: function(data) {
            alert('Error occured');
        }
	});
}

