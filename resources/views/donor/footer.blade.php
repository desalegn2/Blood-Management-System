<!DOCTYPE html>
<html>

<head>
    <title>Donor Enrollment Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style for the form container */
        .form-container {

            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Style for the form grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        /* Style for the form label */
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        /* Style for the form input */
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        /* Style for the submit button */
        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .submit-button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="form-container">
            <h1>Donor Enrollment Form</h1>
            <form>
                <div class="form-grid">
                    <div>
                        <label for="last_name">First Name:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">Last Name:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>

                    <div>
                        <label for="last_name">Phone:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">Email:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">gender:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">Age:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">Weight:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">Height:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">Occupation:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">Photo:</label>
                        <input type="file" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">Pack No:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div style="color: red;">
                    <hr>
                </div>
                <div class="form-grid">

                    <div>
                        <label for="first_name">Blood Type:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">Volume:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">Country:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">State:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">City:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">Zone:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="first_name">Woreda:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div>
                        <label for="last_name">Kebelie:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="last_name">House Number:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="last_name">Type Of Donation:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div>
                        <label for="last_name">Remark:</label>
                        <textarea id="w3review" name="remark" rows="5" cols="30"></textarea>
                    </div>
                </div>

                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>