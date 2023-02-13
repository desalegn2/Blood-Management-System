@extends('technitian.sidebar')
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



    <!--[if !IE]><!-->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 14px/1.4 Georgia, Serif;
            width: 100%;
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
    <!--<![endif]-->

</head>

<body>

    <div id="page-wrap">

        <h1> Shelf Life</h1>

        <p>PACKED RED BLOOD CELLS (PRBCS) are stored in a Blood Bank refrigerator at a temp of 1-6ºC until issue. The shelf life is 42 days from the date of collection The expiration date is located on the unit(s).</p>

        <a class="btn btn-success" href="{{url('technitian/home')}}">Home</a>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Blood Group</th>
                    <th>Volume</th>
                    <th>Pack Number</th>
                    <th>duration</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($blood as $bloods)
                <tr>
                    <td>{{$bloods->bloodgroup}}</td>
                    <td>{{$bloods->volume}}</td>
                    <td>{{$bloods->packno}}</td>
                    <td scope="row">{{ $bloods->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                    <td>
                        <a href="#setexpaired{{$bloods->id}}" data-bs-toggle="modal" class="btn btn-info"><i class='fa fa-edit'></i> fillDiscard</a>
                        <a href="{{url('technitian/discard2', $bloods->id)}}" class="btn btn-info"><i class='fa fa-edit'></i> Discard</a>
                        @include('technitian.expiredmodal')
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