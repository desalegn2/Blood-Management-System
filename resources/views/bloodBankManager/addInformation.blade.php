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
			font-size: 15px;
			padding: 10px;
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
		@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif
		<button style="margin-bottom: 10px;" type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class='fa fa-plus'></i>Add Centor</button>
		<form action="{{url('/bbmanager/addinfo')}}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Enter Title ">
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
			</div>
			<div class="form-group">
				<label for="select">Select:</label>
				<select class="form-control-select" id="select" name="type">
					<option value="opinformationtion1">information</option>
					<option value="news">news</option>
					<option value="service">service</option>
				</select>
			</div>
			<div class="form-group">
				<label for="image">Image File:</label>
				<input type="file" class="form-control-file" id="image" name="image">
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addnewModalLabel">Add Centor</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					{!! Form::open(['url' => 'bbmanager/addCentor']) !!}
					<div class="mb-3">
						{!! Form::label('centorName', 'Center Name') !!}
						{{ Form::text('centorName', null, ['class' => 'form-control', 'placeholder' => 'Enter center']) }}
					</div>
					<div class="mb-3">
						{!! Form::label('address', 'Address') !!}
						{{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter address']) }}
					</div>
					<div class="mb-3">
						{!! Form::hidden('maximum_donation', 50) !!}
						{{ Form::hidden('maximum_donation', 50) }}
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>

@endsection