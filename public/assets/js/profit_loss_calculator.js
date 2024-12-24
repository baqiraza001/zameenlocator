
function calculateProfitLoss() {
	var purchasePrice = parseFloat($("#purchasePrice").val());
	var repairCost = parseFloat($("#repairCost").val());
	var sellingPrice = parseFloat($("#sellingPrice").val());
	var rentalIncome = parseFloat($("#rentalIncome").val());
	var expenses = parseFloat($("#expenses").val());

	var totalCost = purchasePrice + repairCost;
	var profitLoss = sellingPrice - totalCost;
	var monthlyProfitLoss = rentalIncome - expenses;

	$("#result").html(
		"Profit/Loss: Rs." +
		profitLoss.toFixed(2) +
		"<br>Monthly Profit/Loss: Rs." +
		monthlyProfitLoss.toFixed(2)
		);
}

