@extends('admin.adminlte')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>user nanagement</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="left: 0;">
    <div class="container">
        <h1 class="page-header text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, deleniti
            modi iusto quod eaque, quia odio est porro velit, natus
            libero voluptates impedit laudantium distinctio obcaecati excepturi amet. Possimus, minima.</h1>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <h2> <a href="home" class="btn btn-primary btn-block">{{ __('Back') }}</a>
                    Manage Technitian
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                </h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>Fisrtname</th>
                        <th>Email</th>
                        <th>Action</th>
                        <th>Block User</th>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->email}}</td>
                            <td>
                                <a href="#edit{{$member->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fa fa-edit'></i> Edit</a>
                                <a href="#delete{{$member->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</a>

                                @include('admin.manageTechModal')
                            </td>
                            <td>
                                <form action="{{ url('admin.block', $member->id) }}" method="POST">

                                    @csrf

                                    @if($member->isBlocked == 1)
                                    <button type="submit" class="btn btn-success show_block_confirm" data-name={{ $member->isBlocked == 1 ? 'Unblock' : 'Block' }} title='Block'>{{ $member->isBlocked == 1 ? 'Unblock' : 'Block' }}</button>
                                    @else
                                    <button type="submit" class="btn btn-warning show_block_confirm" data-name={{ $member->isBlocked == 1 ? 'Unblock' : 'Block' }} title='Block'>{{ $member->isBlocked == 1 ? 'Unblock' : 'Block' }}</button>

                                    @endif

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Add New Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'save']) !!}
                    <div class="mb-3">
                        {!! Form::label('firstname', 'Firstname') !!}
                        {!! Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'Input Firstname', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('lastname', 'Lastname') !!}
                        {!! Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Input Lastname', 'required']) !!}
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

</body>

</html>
@endsection