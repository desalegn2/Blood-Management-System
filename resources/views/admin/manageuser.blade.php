@extends('admin.sidebars')
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

<body>
    <div class="container">

        <h1 class="page-header text-center"></h1>
        <div class="row">
            <form action="{{url('/admin/search_user')}}" method="get">
                @csrf
                <div style="float: right;">
                    <select name="users" required>
                        <option value="">Choose User Type</option>
                        <option value="1">Donor</option>
                        <option value="3">Nurse</option>
                        <option value="6">Encoder</option>
                        <option value="4">Technician</option>
                        <option value="0">Manager</option>
                        <option value="5">Health Institute</option>
                    </select>
                    <input type="submit" value="Search">
                </div>
            </form>
            <div class="col-md-12 col-md-offset-1">
                <!-- <h2> <a href="home" class="btn btn-primary btn-block">{{ __('Back') }}</a> -->
                Manage User

                <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button> -->
                </h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>Fisrtname</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                        <th>Block</th>
                    </thead>
                    <tbody>
                        @if(count($members))
                        @foreach($members as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->role}}</td>
                            <td>
                                <a href="#edit{{$member->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fa fa-edit'></i> Edit</a>
                                <a href="#delete{{$member->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</a>

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
                                @include('admin.manageUserModal')
                            </td>
                        </tr>
                        @endforeach
                        @else

                        <tr>
                            No user with this name or email or role
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $members->appends(Request::all())->links() }}

            </div>
        </div>
    </div>


</body>

</html>
@endsection