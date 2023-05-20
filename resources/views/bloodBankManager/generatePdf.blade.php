@extends('bloodBankManager.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .dark {
            background-color: black;
            color: white;
        }
        .container{
            margin-top: 100px;
        }
        #selection{
            padding: 7px;
        }
    </style>
</head>

<body>

    <div class="container" id="div1">
        <h1 class="page-header text-center">Generate Report</h1>
        <form action="{{url('/bbmanager/report')}}" method="get">
            @csrf
            <div style="float: right;">
                <select name="reporttype" id="selection" required>
                    <option value="">Choose Report Type</option>
                    <option value="collection">Blood Collection Report</option>
                    <option value="distribution">Blood Distribute Report</option>
                    <option value="request">Blood Request Report</option>
                </select>
                <input type="submit" value="OK"  class="btn btn-primary btn-block">
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <h2> <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">{{ __('Back') }}</a>
                    <!-- <button onclick="myfunction()">darkmode</button> -->
            </div>
        </div>
    </div>

    <script>
        function myfunction() {
            // var element = document.body;
            // element.classList.toggle("dark");
            document.getElementById("div1").style.backgroundColor = "black";

        }
    </script>
</body>

</html>
@endsection