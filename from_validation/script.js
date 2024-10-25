function validateForm() {
    let name = document.getElementById("name").value;
    let address = document.getElementById("address").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let isValid = true;

    if (name === "" || !name.match(/^[a-zA-Z ]+$/)) {
        document.getElementById("name-error").textContent = "Please enter a valid name.";
        isValid = false;
    }

    if (address === "") {
        document.getElementById("address-error").textContent = "Please enter your address.";
        isValid = false;
    }

    if (email === "" || !email.includes("@")) {
        document.getElementById("email-error").textContent = "Please enter a valid email address.";
        isValid = false;
    }

    if (password === "" || password.length < 6) {
        document.getElementById("password-error").textContent = "Please enter a password with at least 6 characters.";
        isValid = false;
    }

    return isValid;
}