@extends('admin.adminlte')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
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
            width: 80%;
            border-collapse: collapse;
            margin-left: 230px;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #ccc;
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

        <h1>Request from hospital</h1>
        <table>
            <thead>
                <tr>
                    <th>Hospital Name</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>Blood Group</th>
                    <th>Volume</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Mark as Read</th>
                    <th>Action</th>
                    <th>Operation</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($views as $view)
                <tr>
                    <td>{{$view->hospitalname}}</td>
                    <td>{{$view->date}}</td>
                    <td>{{$view->phone}}</td>
                    <td>{{$view->email}}</td>
                    <td>{{$view->bloodgroup}}</td>
                    <td>{{$view->volume}}</td>
                    <td>{{$view->reason}}</td>
                    <td>{{$view->status}}</td>
                    <td> <a href="{{url('admin/read', $view->id)}}" class="btn btn-success"> read</a></td>
                    <td>
                        <a href="{{url('admin/approved', $view->id)}}" class="btn btn-success"> Available</a>
                        <a href="{{url('admin/canceled', $view->id)}}" class="btn btn-warning">Not Available</a>
                    </td>
                    <td>
                        <a href="#edit{{$view->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fa fa-edit'></i> Response</a>
                        <a href="#delete{{$view->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</a>
                        @include('admin.hirequestModal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="sendtoTechnician" mathod="post">
                        {{@csrf_field()}}

                        <div class="mb-3">

                            <p><strong>Volume:</strong> <span id="view-volume"></span></p>
                            Volume<input type="text" id="view-volume" value="view-volume" name="volume" />
                        </div>
                        <div class="mb-3">

                            <p><strong>Hospital:</strong> <span id="view-hospitalname"></span></p>
                        </div>
                        <div class="mb-3">

                            <p><strong>Blood Type:</strong> <span id="view-bloodgroup"></span></p>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Date:</label>
                            <input type="date" name="date" class="form-control" id="recipient-name">
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-secondary" value="Reset">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            $('body').on('click', '#show-user', function() {
                var userURL = $(this).data('url');
                $.get(userURL, function(data) {
                    $('#userShowModal').modal('show');
                    $('#view-volume').text(data.volume);
                    $('#view-hospitalname').text(data.hospitalname);
                    $('#view-bloodgroup').text(data.bloodgroup);
                })
            });

        });
    </script>
    @include('sweetalert::alert')
</body>

</html>
@endsection