<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    input,
    select {
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 10%;
        background-color: #4CAF50;
        color: white;
        padding-left: 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;

    }

    input[type=reset] {
        width: 10%;
        padding-left: 20px;
        background-color: #4CAF50;
        color: white;

        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-top: 10px;
        padding-left: 40%;
    }
</style>

<body>



    <div>
        <h3>Blood Registerform</h3>
        <form action="addbloods" method="post">
            @csrf
            <input type="hidden" id="date" name="user_id" value="{{Auth::user()->id}}" required>
            <br>
            <label for="bloodtype">bloodtype</label>
            <br>
            <select id="blood type" name="bloodtype" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O+</option>
            </select><br>
            <label for="volume">volume</label><br>
            <input type="text" id="volume" name="volume" required>
            <br>
            <br>
            <label for="donation type">donation type</label>
            <br>
            <select id="blood type" name="donationtype" required>
                <option value="volentary">volentary</option>
            </select>
            <br>
            <input type="submit" value="Submit">
            <input type="reset" value="reset">
            <a type="reset" href="home">back</a>
        </form>
    </div>
    @include('sweetalert::alert')
</body>

</html>