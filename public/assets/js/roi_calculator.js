
function calculateROI() {
	var investment = parseFloat(document.getElementById("investment").value);
	var returnAmount = parseFloat(document.getElementById("return").value);

	var roi = (returnAmount - investment) / investment * 100;
	var resultElement = document.getElementById("result");

	if (isNaN(roi)) {
		resultElement.textContent = "Please enter valid numbers.";
	} else {
		resultElement.textContent = "ROI: " + roi.toFixed(2) + "%";
	}
}
