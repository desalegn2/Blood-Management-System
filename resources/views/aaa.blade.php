<!DOCTYPE html>
<html>

<head>
    <title>Form Validation</title>
    <script>
        function validateName(name) {
            var letterRegex = /^[a-zA-Z]+$/;
            return letterRegex.test(name);
        }

        function validateInput() {
            // Check first name validation
            var firstName = document.getElementById("firstNameField").value;
            if (!validateName(firstName)) {
                document.getElementById("errorFirstName").style.display = "block";
            } else {
                document.getElementById("errorFirstName").style.display = "none";
            }

            // Check last name validation
            var lastName = document.getElementById("lastNameField").value;
            if (!validateName(lastName)) {
                document.getElementById("errorLastName").style.display = "block";
            } else {
                document.getElementById("errorLastName").style.display = "none";
            }

            // ... rest of the code ...
        }

        function validateForm(event) {
            event.preventDefault();

            // Check first name validation
            var firstName = document.getElementById("firstNameField").value;
            if (!validateName(firstName)) {
                alert("First name must contain only letters.");
                return false;
            }

            // Check last name validation
            var lastName = document.getElementById("lastNameField").value;
            if (!validateName(lastName)) {
                alert("Last name must contain only letters.");
                return false;
            }

            // ... rest of the code ...
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
        <input type="text" id="firstNameField" name="firstNameField" onkeyup="validateInput()">
        <div id="errorFirstName" class="error-message">First name must contain only letters.</div>
        <br>
        <label for="lastNameField">Last name:</label>
        <input type="text" id="lastNameField" name="lastNameField" onkeyup="validateInput()">
        <div id="errorLastName" class="error-message">Last name must contain only letters.</div>
        <br>
        <!-- Rest of the form elements -->
        <input type="submit" value="submit">
    </form>
</body>

</html>