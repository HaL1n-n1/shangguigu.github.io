// Define a function named validateForm
function validateForm() {
  // Get the elements for name, email, phone, and gender from the form
  var name = document.getElementById("name");
  var email = document.getElementById("email");
  var phone = document.getElementById("phone");
  var gender = document.getElementById("gender");

  // Get elements for displaying error messages
  var nameError = document.getElementById("name-error");
  var emailError = document.getElementById("email-error");
  var phoneError = document.getElementById("phone-error");
  var genderError = document.getElementById("gender-error");

  // Initialize the form validation status to true
  var isValid = true;

  // Reset border colors of elements
  name.style.borderColor = "";
  email.style.borderColor = "";
  phone.style.borderColor = "";
  gender.style.borderColor = "";

  // Reset error messages
  nameError.innerHTML = "";
  emailError.innerHTML = "";
  phoneError.innerHTML = "";
  genderError.innerHTML = "";

  // Validate name
  if (!name.value.match(/^[a-zA-Z]+$/)) {
      // If name doesn't match the regex for letters only, display error message and mark as invalid
      nameError.innerHTML = "Please enter a valid name with only letters.";
      name.style.borderColor = "red";
      isValid = false;
  }

  // Validate email
  if (!email.value.match(/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/)) {
      // If email doesn't match the regex for a valid email address, display error message and mark as invalid
      emailError.innerHTML = "Please enter a valid email address.";
      email.style.borderColor = "red";
      isValid = false;
  }

  // Validate phone number
  if (!phone.value.match(/^\d+$/)) {
      // If phone number doesn't match the regex for digits only, display error message and mark as invalid
      phoneError.innerHTML = "Please enter a valid phone number with only digits.";
      phone.style.borderColor = "red";
      isValid = false;
  }

  // Validate gender
  if (gender.value === "") {
      // If gender is not selected, display error message and mark as invalid
      genderError.innerHTML = "Please select a gender.";
      gender.style.borderColor = "red";
      isValid = false;
  }

  // If the form is valid, show a success message
  if (isValid) {
      alert("Form submitted successfully!");
  }

  // Return the form validation result
  return isValid;
}
