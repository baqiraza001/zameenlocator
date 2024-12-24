
function calculateLoan() {
      // Retrieve input values
      var carPrice = parseFloat(document.getElementById('carPrice').value);
      var downPayment = parseFloat(document.getElementById('downPayment').value);
      var loanTerm = parseFloat(document.getElementById('loanTerm').value);
      var interestRate = parseFloat(document.getElementById('interestRate').value);

      // Calculate loan amount
      var loanAmount = carPrice - downPayment;

      // Calculate monthly interest rate
      var monthlyInterestRate = (interestRate / 100) / 12;

      // Calculate number of monthly payments
      var totalPayments = loanTerm * 12;

      // Calculate monthly payment
      var monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -totalPayments));

      // Display the result
      document.getElementById('monthlyPayment').innerHTML = monthlyPayment.toFixed(2);
    }
    