@extends('encoder.sidebar')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 14px/1.4 Georgia, Serif;
        }

        #page-wrap {
            margin: 50px;
        }

        p {
            margin: 20px 0;
        }

        /* 
	Generic Styling, for Desktops/Laptops 
	*/
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #333;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 6px;
            border: 1px solid #ccc;
            text-align: left;
        }

        /* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "First Name";
            }

            td:nth-of-type(2):before {
                content: "Last Name";
            }

            td:nth-of-type(3):before {
                content: "Job Title";
            }

            td:nth-of-type(4):before {
                content: "Favorite Color";
            }

            td:nth-of-type(5):before {
                content: "Wars of Trek?";
            }

            td:nth-of-type(6):before {
                content: "Porn Name";
            }

            td:nth-of-type(7):before {
                content: "Date of Birth";
            }

            td:nth-of-type(8):before {
                content: "Dream Vacation City";
            }

            td:nth-of-type(9):before {
                content: "GPA";
            }

            td:nth-of-type(10):before {
                content: "Arbitrary Data";
            }
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
            body {
                padding: 0;
                margin: 0;
                width: 320px;
            }
        }

        /* iPads (portrait and landscape) ----------- */
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            body {
                width: 495px;
            }
        }

        /* From separet style ----------- */
    </style>


</head>

<body>

    <div id="page-wrap">

        <h1>Record Blood Detail</h1>
        <!-- <a class="btn btn-success" href="{{url('encoder/home')}}">Home</a> -->
        <table>
            <thead>
                <tr>
                    <th>Full Name </th>
                    <th> Blood Type</th>
                    <th>Volume</th>
                    <th>Date</th>
                    <th>Pack No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dis)

                <tr>
                    <td>{{$dis->fullname}}</td>
                    <td>{{$dis->bloodtype}}</td>
                    <td>{{$dis->volume}}</td>
                    <td>{{$dis->created_at}}</td>
                    <td>{{$dis->packno}}</td>
                    <td>
                        <a href="{{url('encoder/recordblood', $dis->id)}}"><i class='fa fa-edit'></i> Record</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection