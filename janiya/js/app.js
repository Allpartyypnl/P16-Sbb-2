// Validate mobile number format
function validateMobile() {
  var mobileInput = document.getElementById("Mobile");
  var mobileError = document.getElementById("mobileError");

  var mobileRegex = /^\d{10}$/; // Assuming a 10-digit mobile number format

  if (!mobileRegex.test(mobileInput.value)) {
    mobileError.textContent = "Please enter a valid 10-digit mobile number.";
    return false;
  } else {
    mobileError.textContent = "";
    return true;
  }
}

// Hook up the validation function to the input's change event
var mobileInput = document.getElementById("Mobile");
mobileInput.addEventListener("input", validateMobile);

// Function to show or hide additional input boxes based on selected type
function showAdditionalInputs() {
  var typeInput = document.getElementById("type");
  var refundSection = document.getElementById("refundSection");
  var paySection = document.getElementById("paySection");

  // Hide all additional sections
  refundSection.style.display = "none";
  paySection.style.display = "none";

  // Show the selected section
  if (typeInput.value === "refund") {
    refundSection.style.display = "block";
  } else if (typeInput.value === "pay") {
    paySection.style.display = "block";
  }
}

// Hook up the showAdditionalInputs function to the type input's change event
var typeInput = document.getElementById("type");
typeInput.addEventListener("change", showAdditionalInputs);



