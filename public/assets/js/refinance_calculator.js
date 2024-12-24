
function calculateRefinance() {
	var currentLoanAmount = parseFloat(document.getElementById("currentLoanAmount").value);
	var currentInterestRate = parseFloat(document.getElementById("currentInterestRate").value);
	var currentLoanTerm = parseFloat(document.getElementById("currentLoanTerm").value);

	var newInterestRate = parseFloat(document.getElementById("newInterestRate").value);
	var newLoanTerm = parseFloat(document.getElementById("newLoanTerm").value);

	var currentMonthlyPayment = calculateMonthlyPayment(currentLoanAmount, currentInterestRate, currentLoanTerm);
	var newMonthlyPayment = calculateMonthlyPayment(currentLoanAmount, newInterestRate, newLoanTerm);

	var monthlySavings = currentMonthlyPayment - newMonthlyPayment;
	var totalSavings = monthlySavings * (currentLoanTerm * 12);

	document.getElementById("currentMonthlyPayment").innerHTML = "Rs." + currentMonthlyPayment.toFixed(2);
	document.getElementById("newMonthlyPayment").innerHTML = "Rs." + newMonthlyPayment.toFixed(2);
	document.getElementById("monthlySavings").innerHTML = "Rs." + monthlySavings.toFixed(2);
	document.getElementById("totalSavings").innerHTML = "Rs." + totalSavings.toFixed(2);
}

function calculateMonthlyPayment(loanAmount, interestRate, loanTerm) {
	var monthlyInterestRate = interestRate / 100 / 12;
	var numPayments = loanTerm * 12;
	var monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -numPayments));
	return monthlyPayment;
}
