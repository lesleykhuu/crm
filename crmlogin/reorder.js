var table = $(".js-table");
var tableHeaders = table.find("#labels").find("th");
var nameIndex;
for(var i = 0; i < tableHeaders.length; i++){
	if(tableHeaders.get(i).innerHTML === 'firstname'){
		nameIndex = i;
	}
}
var tableRows = table.find(".js-row");
var orderedRows = [];
orderedRows.push(tableRows.get(0));
for(var i = 1; i < tableRows.length; i++){
	// orderedRows[i] = tableRows.get(nameIndex).innerHTML;

	// for(var j = 0; j < orderedRows.length; j++){
	// 	if(j < (orderedRows.length-1)){
	// 		var rowName = tableRows.get(i).find("td").get(nameIndex).innerHTML;
	// 		var orderedRowName = orderedRows.get(j).find("td").get(nameIndex).innerHTML;
	// 		console.log(rowName, orderedRowName);
	// 	}
	// 	else{
	// 		var rowName = tableRows.get(i).find("td").get(nameIndex).innerHTML;
	// 		var orderedRowName = orderedRows.get(j).find("td").get(nameIndex).innerHTML;
	// 		console.log(rowName, orderedRowName);
	// 	}
	// }
}

// var firstnames = tableRows.find();
console.log(tableHeaders);