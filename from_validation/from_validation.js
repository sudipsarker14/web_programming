<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Validation</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h1>REGISTRATION FORM</h1>
    <form name="RegForm" onsubmit="return validateForm()">
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="Name" placeholder="Enter your full name" />
            <span id="name-error" class="error-message"></span>
        </p>
        <p>
            <label for="address">Address:</label>
            <input type="text" id="address" name="Address" placeholder="Enter your address" />
            <span id="address-error" class="error-message"></span>
        </p>
        <p>
            <label for="email">E-mail Address:</label>
            <input type="text" id="email" name="EMail" placeholder="Enter your email" />
            <span id="email-error" class="error-message"></span>
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="Password" />
            <span id="password-error" class="error-message"></span>
        </p>
        <p>
            <label for="subject">Select Your Course:</label>
            <select id="subject" name="Subject">
                <option value="">Select Course</option>
                <option value="BTECH">BTECH</option>
                <option value="BBA">BBA</option>
                <option value="BCA">BCA</option>
                <option value="B.COM">B.COM</option>
            </select>
            <span id="subject-error" class="error-message"></span>
        </p>
        <p>
            <label for="comment">College Name:</label>
            <textarea id="comment" name="Comment"></textarea>
        </p>
        <p>
            <input type="checkbox" id="agree" name="Agree" />
            <label for="agree">I agree to the above information</label>
            <span id="agree-error" class="error-message"></span>
        </p>
        <p>
            <input type="submit" value="Send" name="Submit" />
            <input type="reset" value="Reset" name="Reset" />
        </p>
    </form>
    <script src="script.js"></script>
</body>
</html>
function validateForm() {
    let name = document.getElementById("name").value;
    let address = document.getElementById("address").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let subject = document.getElementById("subject").value;
    let comment = document.getElementById("comment").value;
    let agree = document.getElementById("agree").checked;

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

    if (subject === "") {
        document.getElementById("subject-error").textContent = "Please select your course.";
        isValid = false;
    }

    if (!agree) {
        document.getElementById("agree-error").textContent = "Please agree to the above information.";
        isValid = false;
    }

    return isValid;
}