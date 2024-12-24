
function calculateInteriorDesignCost() {
	
	event.preventDefault();

  // Retrieve input values
  var roomSize = parseFloat(document.getElementById('roomSize').value);
  var designFee = parseFloat(document.getElementById('designFee').value);
  var materialCost = parseFloat(document.getElementById('materialCost').value);
  var laborCost = parseFloat(document.getElementById('laborCost').value);

  //Calculate total cost
  var totalCost = designFee + materialCost + laborCost * roomSize;

  // Display the result
  document.getElementById('totalCost').innerHTML = 'Rs.' + totalCost.toFixed(2);
  
}

