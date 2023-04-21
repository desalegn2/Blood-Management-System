@extends('bloodBankManager.sidebar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>add information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
     .container {
			margin-top: 35px;
			background-color: #f8f8f8;
			padding: 20px;
			border-radius: 10px;
		}
		h1 {
			font-size: 36px;
			font-weight: bold;
			margin-bottom: 30px;
			color: #333;
			text-align: center;
		}
		.form-control {
			border-radius: 0;
			border-color: #ddd;
			box-shadow: none;
			font-size: 16px;
			padding: 15px;
			background-color: #fff;
			color: #555;
			margin-bottom: 20px;
		}
		.form-control:focus {
			border-color: #007bff;
			box-shadow: none;
		}
		.form-control-file {
			border-radius: 0;
			border-color: #ddd;
			box-shadow: none;
			font-size: 16px;
			padding: 15px;
			background-color: #fff;
			color: #555;
			margin-bottom: 20px;
			position: relative;
			overflow: hidden;
		}
		.form-control-file input[type="file"] {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		.form-control-select {
			border-radius: 0;
			border-color: #ddd;
			box-shadow: none;
			font-size: 16px;
			padding: 15px;
			background-color: #fff;
			color: #555;
			margin-bottom: 20px;
		}
		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
			border-radius: 0;
			padding: 15px 30px;
			font-size: 18px;
			font-weight: bold;
			transition: all 0.2s;
		}
		.btn-primary:hover {
			background-color: #0069d9;
			border-color: #0062cc;
			transition: all 0.2s;
		}
		@media (max-width: 768px) {
			.container {
				margin-top: 60px;
			}
			h1 {
				font-size: 28px;
				margin-bottom: 20px;
			}
		}
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Blood Bank Information </h1>
        <form>
            <div class="form-group">
                <label for="input1">Title:</label>
                <input type="text" class="form-control" id="input1" placeholder="Enter Title ">
            </div>

            <div class="form-group">
                <label for="textarea">Description:</label>
                <textarea class="form-control" id="textarea" rows="5" placeholder="Enter description"></textarea>
            </div>
            <div class="form-group">
                <label for="select">Select:</label>
                <select class="form-control-select" id="select">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image File:</label>
                <input type="file" class="form-control-file" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>

@endsection