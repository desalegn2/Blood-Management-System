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
    </style>
</head>

<body>

    <div class="container" id="div1">
        <h1 class="page-header text-center">Generate Report</h1>
        <form action="{{url('/bbmanager/report')}}" method="get">
            @csrf
            <div style="float: right;">
                <select name="reporttype" required>
                    <option value="">Choose Report Type</option>
                    <option value="collection">Blood Collection Report</option>
                    <option value="distribution">Blood Distribute Report</option>
                    <option value="request">Blood Request Report</option>
                </select>
                <input type="submit" value="Search">
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <h2> <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">{{ __('Back') }}</a>
                    <!-- <button onclick="myfunction()">darkmode</button> -->
            </div>
        </div>


        <div class="container mt-5">
            <div class=" mt-5">
                <div class="row mt-5 mb-5">
                    <div class="col-md-4 ml-5">
                        <img class="img-fluid" src="{{asset('assets/imgs/bblogo.jpg')}}" alt="...">
                    </div>
                    <div class="col-md-8">
                        <h3 class="card-title mt-2">Blood Distribute Report</h3>
                        <form action="{{url('/bbmanager/manydayDistributeReport')}}" method="post">
                            @csrf
                            <p>Blood Distribute Report</p>
                            <label>From</label>&nbsp;<input type="date" name="startdate"><br><br>
                            <label>To</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="enddate">&nbsp;&nbsp;
                            <input type="submit" value="Report">
                        </form>
                        <br><br>
                        <form action="{{url('/bbmanager/distribute_specificday')}}" method="post">
                            @csrf
                            <p>Blood Distribute Report of one day</p>
                            <label>From</label>&nbsp;&nbsp;&nbsp;<input type="date" name="startdate" required>
                            <input type="submit" value="Report">
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">464/4545/4545</small>
                        <p href="" style="float: right;">Bahir Dar Blood Bank</p>
                    </div>
                </div>
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