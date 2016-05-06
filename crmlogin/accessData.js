// var data = JSON.
// var data;
// var data = function(){
// 	var arrayData;
function loadData(){
	var arrayData;
	$.ajax({
		url: 'storedValues.php',
		type: 'json',
		success: function(result){
			// this.data = console.log(result);
			// alert();
			arrayData = 1;
			// JSON.parse(result);
			// console.log(result);
		}
	});
	console.log(arrayData);
	return arrayData;

}

$('objects').load('storedValues.php');
arrayData = loadData();
// 	return (arrayData);
	
// }

console.log(arrayData);