@extends('technitian.side_bar')
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
</head>

<body>

    <div class="container">


        <h1 class="page-header text-center"></h1>
        <div class="row">
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset-1">
                <h1> Shelf Life</h1>

                <p>PACKED RED BLOOD CELLS (PRBCS) are stored in a Blood Bank refrigerator at a temp of 1-6ºC until issue. The shelf life is 42 days from the date of collection The expiration date is located on the unit(s).</p>

                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>Blood Group</th>
                        <th>Volume</th>
                        <th>Pack Number</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>

                    </thead>
                    <tbody>
                        @if(count($blood))
                        @foreach ($blood as $bloods)
                        <tr>
                            <td>{{$bloods->bloodgroup}}</td>
                            <td>{{$bloods->volume}}</td>
                            <td>{{$bloods->packno}}</td>
                            <td scope="row">{{ $bloods->created_at->diffInDays(\Carbon\Carbon::now()) }} Days ago</td>
                            <td>
                                @if($bloods->created_at->diffInDays(\Carbon\Carbon::now()) >5)
                                Expired
                                @else
                                {{$bloods->created_at->diffInDays(\Carbon\Carbon::now()) - 5}} Days left
                                @endif
                            </td>
                            <td>
                                <a href="#discard{{$bloods->id}}" data-bs-toggle="modal" class="btn btn-info"><i class='fa fa-delete'></i> Discard</a>
                                @include('technitian.discardModal')
                            </td>
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
        </div>
    </div>
    <!-- Add Blood Modal -->
    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Register Blood</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    {!! Form::open(['url' => 'technitian/addbloods']) !!}
                    <div class="mb-3">
                        {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('packno', 'Pack Number') !!}
                        {!! Form::text('packno', '', ['class' => 'form-control', 'placeholder' => 'Input pack number', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('bloodtype', 'Blood Type') !!}
                        {!! Form::select('bloodtype', array(''=>'choose Blood Type', 'A-' => 'A-', 'A+' => 'A+','B-' => 'B-', 'B+' => 'B+',
                        'AB-' => 'AB-', 'AB+' => 'AB+','O-' => 'O-','O+'=>'O+')) !!}

                    </div>
                    <div class="mb-3">
                        {!! Form::label('volume', 'Volume') !!}
                        {!! Form::text('volume', '', ['class' => 'form-control', 'placeholder' => 'Input volume', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('donationtype', 'Donation Type') !!}
                        {!! Form::text('donationtype', '', ['class' => 'form-control', 'placeholder' => 'Input donation type', 'required']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
</body>

</html>
@endsection