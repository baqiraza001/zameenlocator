
function calculateCost() {
	var length = parseFloat(document.getElementById("length").value);
	var width = parseFloat(document.getElementById("width").value);
	var height = parseFloat(document.getElementById("height").value);
	var costPerSqft = parseFloat(document.getElementById("costPerSqft").value);

	var area = length * width;
	var volume = area * height;
	var totalCost = volume * costPerSqft;

	document.getElementById("result").innerHTML = "The total construction cost is: Rs: " + totalCost.toFixed(2);
}
