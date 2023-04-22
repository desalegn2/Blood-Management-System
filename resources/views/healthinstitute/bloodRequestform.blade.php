@extends('healthinstitute.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f0f0f0;
        }

        .main-block {
            background-color: #fff;
            border-radius: 10px;
            margin: 50px auto;
            padding: 20px;
            width: 80%;
            max-width: 700px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        h3 {
            font-size: 24px;
            font-weight: 600;
            margin-top: 30px;
        }

        label {
            font-size: 18px;
            font-weight: 600;
        }

        input[type=number] {
            font-size: 18px;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 100px;
            display: inline-block;
            box-sizing: border-box;
        }

        button[type=submit] {
            margin-top: 30px;
            font-size: 18px;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button[type=submit]:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <!-- ======================= Cards ================== -->
    <div class="main-block">
        <h1>Blood Request Form</h1>

        <div class="row">
        <h3>Enter the quantity of each blood types you need:</h3>
           
                <div class="col-md-6">
                <form action="{{url('/healthinstitute/bloodrequest')}}" method="POST">
                @csrf
                    <input type="hidden" name="hospital_id" value="{{Auth::user()->id}}" id="hospital_name" class="form-control" required>
                    <input type="hidden" name="approved_by" value="none" id="hospital_address" class="form-control" required>

                   

                    <div class="form-group">
                        <label for="A_pos">A+</label>
                        <input type="number" name="blood_types[A+]" id="A_pos" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="A_neg">A-</label>
                        <input type="number" name="blood_types[A-]" id="A_neg" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="B_pos">B+</label>
                        <input type="number" name="blood_types[B+]" id="B_pos" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="B_neg">B-</label>
                        <input type="number" name="blood_types[B-]" id="B_neg" class="form-control" min="0">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="O_pos">O+</label>
                        <input type="number" name="blood_types[O+]" id="O_pos" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="O_neg">O-</label>
                        <input type="number" name="blood_types[O-]" id="O_neg" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="AB_pos">AB+</label>
                        <input type="number" name="blood_types[AB+]" id="AB_pos" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="AB_neg">AB-</label>
                        <input type="number" name="blood_types[AB-]" id="AB_neg" class="form-control" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                
            </form>
        </div>
    </div>


    @include('sweetalert::alert')
</body>

</html>


@endsection