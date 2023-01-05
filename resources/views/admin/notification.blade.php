<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{url('admin/send')}}" method="POST">
        @csrf
        <div>
            <label>Greeting</label>
            <input type="text" name="greeting">
        </div>
        <div>
            <label>Body</label>
            <input type="text" name="body">
        </div>
        <div>
            <label>Action Text</label>
            <input type="text" name="acttext">
        </div>
        <div>
            <label>Url</label>
            <input type="text" name="url">
        </div>
        <div>
            <label>lastline</label>
            <input type="text" name="lastline">
        </div>
        <div>

            <input type="submit" name="send">
        </div>
    </form>
</body>

</html>