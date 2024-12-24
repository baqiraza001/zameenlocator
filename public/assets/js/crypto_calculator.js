
function calculateProfitLoss() {
	var purchasePrice = parseFloat(document.getElementById('purchasePrice').value);
	var quantity = parseFloat(document.getElementById('quantity').value);
	var currentPrice = parseFloat(document.getElementById('currentPrice').value);

	var costBasis = purchasePrice * quantity;
	var currentValue = currentPrice * quantity;
	var profitLoss = currentValue - costBasis;
	var percentage = (profitLoss / costBasis) * 100;

	document.getElementById('costBasis').innerHTML = costBasis.toFixed(2);
	document.getElementById('currentValue').innerHTML = currentValue.toFixed(2);
	document.getElementById('profitLoss').innerHTML = profitLoss.toFixed(2);
	document.getElementById('percentage').innerHTML = percentage.toFixed(2);
}
