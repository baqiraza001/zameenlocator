
let myChart;

const checkValues = () => {
  const interestRateInput = document.querySelector(".interest-rate");
  const loanTenureInput = document.querySelector(".loan-tenure");
  const loanAmountInput = document.querySelector(".loan-amount");
  let loanAmountValue = loanAmountInput.value;
  let interestRateValue = interestRateInput.value;
  let loanTenureValue = loanTenureInput.value;

  let regexNumber = /^[0-9]+$/;
  if (!loanAmountValue.match(regexNumber)) {
    loanAmountInput.value = "10000";
  }

  if (!loanTenureValue.match(regexNumber)) {
    loanTenureInput.value = "12";
  }

  let regexDecimalNumber = /^(\d*\.)?\d+$/;
  if (!interestRateValue.match(regexDecimalNumber)) {
    interestRateInput.value = "7.5";
  }
};

const displayChart = (totalInterestPayableValue) => {
  const loanAmountInput = document.querySelector(".loan-amount");
  let loanAmount = parseFloat(loanAmountInput.value);
  const ctx = document.getElementById("myChart").getContext("2d");
  myChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["Total Interest", "Total Loan Amount"],
      datasets: [
      {
        data: [totalInterestPayableValue, loanAmount],
        backgroundColor: ["#e63946", "#2eca6a"],
        borderWidth: 0,
      },
      ],
    },
  });
};

const updateChart = (totalInterestPayableValue) => {
  const loanAmountInput = document.querySelector(".loan-amount");
  let loanAmount = parseFloat(loanAmountInput.value);
  myChart.data.datasets[0].data[0] = totalInterestPayableValue;
  myChart.data.datasets[0].data[1] = loanAmount;
  myChart.update();
};

const refreshInputValues = () => {
  const loanAmountInput = document.querySelector(".loan-amount");
  const interestRateInput = document.querySelector(".interest-rate");
  const loanTenureInput = document.querySelector(".loan-tenure");
  let  loanAmount = parseFloat(loanAmountInput.value);
  let interestRate = parseFloat(interestRateInput.value);
  let loanTenure = parseFloat(loanTenureInput.value);
  interest = interestRate / 12 / 100;
};

const calculateEMI = () => {
  const loanAmountInput = document.querySelector(".loan-amount");
  let  loanAmount = parseFloat(loanAmountInput.value);
  const interestRateInput = document.querySelector(".interest-rate");
  let interestRate = parseFloat(interestRateInput.value);
  const loanTenureInput = document.querySelector(".loan-tenure");
  let loanTenure = parseFloat(loanTenureInput.value);
  let interest = interestRate / 12 / 100;
  checkValues();
  refreshInputValues();
  let emi =
  loanAmount *
  interest *
  (Math.pow(1 + interest, loanTenure) /
    (Math.pow(1 + interest, loanTenure) - 1));

  return emi;
};

const updateData = (emi) => {
  const loanAmountInput = document.querySelector(".loan-amount");
  const loanEMIValue = document.querySelector(".loan-emi .value");
  const totalInterestValue = document.querySelector(".total-interest .value");
  const totalAmountValue = document.querySelector(".total-amount .value");
  loanEMIValue.innerHTML = Math.round(emi);
  let  loanAmount = parseFloat(loanAmountInput.value);
  const loanTenureInput = document.querySelector(".loan-tenure");

  let loanTenure = parseFloat(loanTenureInput.value);

  let totalAmount = Math.round(loanTenure * emi);
  totalAmountValue.innerHTML = totalAmount;

  let totalInterestPayable = Math.round(totalAmount - loanAmount);
  totalInterestValue.innerHTML = totalInterestPayable;
  
  if(myChart)
    myChart.destroy();
  
  displayChart(totalInterestPayable);
};

const init = () => {
  let emi = calculateEMI();
  updateData(emi);
};

$(document).ready(function() {
init();
})
//===========
