function calculatePremium() {
  var age = parseInt(document.getElementById('age').value);
  var annualIncome = parseInt(document.getElementById('annual-income').value);
  var coveragePeriod = parseInt(document.getElementById('coverage-period').value);

  var premium = (annualIncome * coveragePeriod) / 1000;

  document.getElementById('result').innerHTML = 'Your life insurance premium is Rs. ' + premium.toFixed(2);
}
