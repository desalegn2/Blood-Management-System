<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">iiiiiiiiiiiiiiifffffg</h1>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <h2>Block User

                </h2>
                <a href="home" class="btn btn-primary btn-block">{{ __('Back') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th width="100px">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form action="{{ url('admin.block', $user->id) }}" method="POST">

                                    @csrf

                                    @if($user->isBlocked == 1)
                                    <button type="submit" class="btn btn-success show_block_confirm" data-name={{ $user->isBlocked == 1 ? 'Unblock' : 'Block' }} title='Block'>{{ $user->isBlocked == 1 ? 'Unblock' : 'Block' }}</button>
                                    @else
                                    <button type="submit" class="btn btn-warning show_block_confirm" data-name={{ $user->isBlocked == 1 ? 'Unblock' : 'Block' }} title='Block'>{{ $user->isBlocked == 1 ? 'Unblock' : 'Block' }}</button>

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
</body>

</html>