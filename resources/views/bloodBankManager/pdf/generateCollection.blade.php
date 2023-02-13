<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }

        tr:hover {
            background-color: #D6EEEE;
        }
    </style>
</head>

<body>

    <h2>Hoverable Table</h2>
    <p>Move the mouse over the table rows to see the effect.</p>

    <table class="table table-bordered table-responsive table-striped">
        <thead>
            <th>photo</th>
            <th>Fulltname</th>
            <th>Email</th>
            <th>Donation Date</th>
            <th>Blood Type</th>
            <th>Gender</th>
            <th>phone</th>
            <th>Occupation</th>

        </thead>
        <tbody>
            @if(count($data))
            @foreach($data as $member)
            <tr>
                <td><img src="{{public_path('uploads/registers/'.$member->photo)}}" width="80" height="80"></td>
                <td>{{$member->fullname}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->created_at}}</td>
                <td>{{$member->bloodtype}}</td>
                <td>{{$member->gender}}</td>
                <td>{{$member->phone}}</td>
                <td>{{$member->occupation}}</td>

            </tr>
            @endforeach
            @else
            <tr>
                <td>Data Not Found</td>
            </tr>
            @endif
        </tbody>
    </table>

</body>

</html>