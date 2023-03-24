@extends('nurse.side_bar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="advertise" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="" name="title" value="" required><br>
        <label for="lname">image:</label><br>
        <input type="file" id="" name="image" value="" required><br><br>
        <label for="lname">Description:</label><br>
        <textarea id="w3review" name="discription" rows="4" cols="50" required>

        </textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
@endsection