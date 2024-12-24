
function calculateCommission() {
	var salePrice = parseFloat(document.getElementById("sale-price").value);
	var commissionRate = parseFloat(document.getElementById("commission-rate").value);
	
	if (!isNaN(salePrice) && !isNaN(commissionRate)) {
		var commission = (salePrice * commissionRate) / 100;
		document.getElementById("result").innerHTML = "Commission: Rs." + commission.toFixed(2);
	} else {
		document.getElementById("result").innerHTML = "Please enter valid values for sale price and commission rate.";
	}
}
