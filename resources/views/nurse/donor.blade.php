<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="page-wrap">

        <h1>Responsive Table</h1>
        <a class="btn btn-success" href="{{url('nurse/home')}}">Home</a>
        <p>Go to <a href="">Non-Responsive Table</a></p>

        <p>This is the exact same table, only has @media queries applied to is so that when the screen is too narrow, it reformats (via only CSS) to make each row a bit like it's own table. This makes for much more repetition and vertical space needed, but it fits within the horizontal space, so only natural vertical scrolling is needed to explore the data.</p>

        <table>
            <thead>
                <tr>
                    <th>photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>blood Type</th>
                    <th>Action</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $view)
                <tr>
                    <td><img src="{{asset('uploads/registers/'.$view->photo)}}" width="80" height="80"></td>
                    <td>{{$view->name}}</td>
                    <td>{{$view->hospital_id}}</td>
                    <td>{{$view->lastname}}</td>
                    <td>{{$view->email}}</td>
                    <td>{{$view->phone}}</td>
                    <td>{{$view->bloodtype}}</td>
                    <td>
                        <a class="btn btn-success" href="">Approve</a>
                        <a class="btn btn-danger" href="">Disapprove</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="">View</a>
                        <a href="" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>