function validateForm() {
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;

  // Basic required field validation
  if (name === "" || email === "" || password === "" || confirmPassword === "") {
    alert("Please fill in all required fields.");
    return false;
  }

  // Email validation using regular expression
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert("Invalid email address.");
    return false;
  }

  // Password matching validation
  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  return true;
}