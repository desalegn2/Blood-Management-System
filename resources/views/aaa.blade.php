<!DOCTYPE html>
<html>

<head>
    <title>Form Validation</title>
    <script>
        function validateName(name) {
            var letterRegex = /^[a-zA-Z]+$/;
            return letterRegex.test(name);
        }

        function validatePassword(password) {
            var passwordRegex = /^(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[a-z\d@$!%*?&]{6,}$/;
            return passwordRegex.test(password);
        }

        function validateInput(inputField, errorMessageId) {
            var inputValue = inputField.value;
            var errorMessage = document.getElementById(errorMessageId);

            if (inputValue.trim() === "") {
                errorMessage.textContent = "This field is required.";
                errorMessage.style.display = "block";
            } else {
                errorMessage.style.display = "none";
            }

            if (inputField.id === "firstNameField" || inputField.id === "lastNameField") {
                if (!validateName(inputValue)) {
                    errorMessage.textContent = "This field must contain only letters.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }

            if (inputField.id === "ageField") {
                if (isNaN(inputValue) || inputValue < 17 || inputValue > 65) {
                    errorMessage.textContent = "Age must be between 17 and 65.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }

            if (inputField.id === "heightField") {
                if (isNaN(inputValue) || inputValue < 1.50 || inputValue > 2.50) {
                    errorMessage.textContent = "Height must be between 1.50 and 2.50.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }

            if (inputField.id === "phoneField") {
                if (!/^([79]\d{8})$/.test(inputValue)) {
                    errorMessage.textContent = "Phone number must start with 7 or 9 and have 8 digits.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }

            if (inputField.id === "weightField") {
                if (isNaN(inputValue) || inputValue < 48) {
                    errorMessage.textContent = "Weight must be at least 48.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }

            if (inputField.id === "passwordField") {
                if (inputValue !== "" && !validatePassword(inputValue)) {
                    errorMessage.textContent = "Password must be at least 6 characters long and contain at least one lowercase letter, one number, and one special character.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }


            if (inputField.id === "confirmPasswordField") {
                var password = document.getElementById("passwordField").value;
                if (inputValue !== password) {
                    errorMessage.textContent = "Passwords do not match.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }

            if (inputField.id === "fileField") {
                var fileSize = inputField.files[0].size / (1024 * 1024); // File size in MB
                var fileExtension = inputField.value.split(".").pop().toLowerCase();
                var allowedExtensions = ["jpeg", "jpg", "png", "gif", "bmp", "svg"];

                if (fileSize > 10) {
                    errorMessage.textContent = "File size must be less than 10 MB.";
                    errorMessage.style.display = "block";
                } else if (!allowedExtensions.includes(fileExtension)) {
                    errorMessage.textContent = "File format not supported. Allowed formats are JPEG, JPG, PNG, GIF, BMP, or SVG.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }
        }

        function validateForm(event) {
            event.preventDefault();

            // Check first name validation
            var firstName = document.getElementById("firstNameField");
            if (!validateName(firstName.value)) {
                alert("First name must contain only letters.");
                return false;
            }

            // Check last name validation
            var lastName = document.getElementById("lastNameField");
            if (!validateName(lastName.value)) {
                alert("Last name must contain only letters.");
                return false;
            }

            // Check input validations
            var inputs = document.getElementsByClassName("input-field");
            var errorMessages = document.getElementsByClassName("error-message");

            for (var i = 0; i < inputs.length; i++) {
                var inputField = inputs[i];
                var errorMessage = errorMessages[i];

                if (inputField.value.trim() === "") {
                    errorMessage.textContent = "This field is required.";
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
            }

            return true;
        }
    </script>
    <style>
        .error-message {
            display: none;
            color: red;
        }
    </style>
</head>

<body>
    <form onsubmit="return validateForm(event)">
        <label for="firstNameField">First name:</label>
        <input type="text" id="firstNameField" name="firstNameField" class="input-field" onkeyup="validateInput(this, 'errorFirstName')">
        <div id="errorFirstName" class="error-message"></div>
        <br>
        <label for="lastNameField">Last name:</label>
        <input type="text" id="lastNameField" name="lastNameField" class="input-field" onkeyup="validateInput(this, 'errorLastName')">
        <div id="errorLastName" class="error-message"></div>
        <br>
        <label for="ageField">Age:</label>
        <input type="number" id="ageField" name="ageField" min="17" max="65" class="input-field" onkeyup="validateInput(this, 'errorAge')">
        <div id="errorAge" class="error-message"></div>
        <br>
        <label for="heightField">Height:</label>
        <input type="number" id="heightField" name="heightField" min="1.50" max="2.50" step="0.01" class="input-field" onkeyup="validateInput(this, 'errorHeight')">
        <div id="errorHeight" class="error-message"></div>
        <br>
        <label for="phoneField">Phone:</label>
        <input type="tel" id="phoneField" name="phoneField" pattern="[79]\d{8}" class="input-field" onkeyup="validateInput(this, 'errorPhone')">
        <div id="errorPhone" class="error-message"></div>
        <br>
        <label for="weightField">Weight:</label>
        <input type="number" id="weightField" name="weightField" min="48" class="input-field" onkeyup="validateInput(this, 'errorWeight')">
        <div id="errorWeight" class="error-message"></div>
        <br>
        <label for="passwordField">Password:</label>
        <input type="password" id="passwordField" name="passwordField" class="input-field" onkeyup="validateInput(this, 'errorPassword')">
        <div id="errorPassword" class="error-message"></div>
        <br>
        <label for="confirmPasswordField">Confirm Password:</label>
        <input type="password" id="confirmPasswordField" name="confirmPasswordField" class="input-field" onkeyup="validateInput(this, 'errorConfirmPassword')">
        <div id="errorConfirmPassword" class="error-message"></div>
        <br>
        <label for="fileField">File:</label>
        <input type="file" id="fileField" name="fileField" class="input-field" onchange="validateInput(this, 'errorFile')">
        <div id="errorFile" class="error-message"></div>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>