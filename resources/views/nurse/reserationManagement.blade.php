@extends('nurse.sidebar')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>

    <title>Reservation</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            left: 0;

            margin-right: 50px;
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
    </style>

</head>

<body>

    <div id="page-wrap">
        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm float-end">Back</a>

        <h1>Donors Who send reservation</h1>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>

                    <th>Phone</th>


                    <th>Center</th>
                    <th>Reservationdate</th>
                    <th>Action</th>
                    <th>Operation</th>
                    <!-- <td>Ac</td> -->
                </tr>
            </thead>
            <tbody>
                @if(count($accepts))
                @foreach ($accepts as $accept)
                <tr>
                    <td>{{$accept->name}}</td>

                    <td>{{$accept->phone}}</td>

                    <td>{{$accept->center}}</td>
                    <td>{{$accept->reservationdate}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('/nurse/accept', $accept->id)}}">Accept</a>
                        <a class="btn btn-danger" href="{{url('nurse/notaccept', $accept->id)}}">NotAccept</a>
                    </td>
                    <td>
                        <a href="#delete{{$accept->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</a>
                        <a href="#resend{{$accept->id}}" data-bs-toggle="modal" class="btn btn-info"><i class='fa fa-edit'></i> Change Date</a>
                        @include('nurse.resendReservation')
                    </td>
                    <!-- <td>
                        <form action="{{ url('nurse.reservationstatus', $accept->id) }}" method="POST">

                            @csrf
                            @if($accept->status == 'in progress')
                            <button type="submit" class="btn btn-success show_block_confirm" data-name={{ $accept->status == 'in progress' ? 'Approve' : 'DisApprove' }} title='Approve'>{{ $accept->status == 1 ? 'DisApprove' : 'Approve' }}</button>
                            @else
                            <button type="submit" class="btn btn-warning show_block_confirm" data-name={{ $accept->status == 'in progress' ? 'Approve' : 'DisApprove' }} title='DisApprove'>{{ $accept->Statuse == 1 ? 'Approve' : 'DisApprove' }}</button>
                            @endif
                        </form>
                    </td> -->
                </tr>
                @endforeach
                @else
                <tr>
                    <td>There is No Donor Who send Reservation</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    @include('sweetalert::alert')
</body>

</html>
@endsection