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
            <th>Reciever</th>
            <th>Blood Type</th>
            <th>Volume</th>
            <th>Donate By</th>
        </thead>
        <tbody>
            @if(count($data))
            @foreach($data as $member)
            <tr>
                <td>{{$member->recievedby}}</td>
                <td>{{$member->bloodgroup}}</td>
                <td>{{$member->volume}}</td>
                <td>{{$member->donateby}}</td>

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