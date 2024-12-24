
function calculateLoan() {
  var loanAmount = parseFloat(document.getElementById("loanAmount").value);
  var interestRate = parseFloat(document.getElementById("interestRate").value);
  var loanTerm = parseFloat(document.getElementById("loanTerm").value);

  var monthlyInterestRate = interestRate / 100 / 12;
  var totalPayments = loanTerm * 12;
  var discountFactor = (Math.pow(1 + monthlyInterestRate, totalPayments) - 1) / (monthlyInterestRate * Math.pow(1 + monthlyInterestRate, totalPayments));
  var monthlyPayment = loanAmount / discountFactor;

  document.getElementById("result").innerHTML = "Monthly Payment: Rs." + monthlyPayment.toFixed(2);
}
