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
    <h1>Profole Page</h1>
    <a href="#profile" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-edit'></i>edit profile</a>
    @include('healthinstitute.pfofoleModal')
    <form method="post" action="profile" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"></input><br>
        <input type="hidden" name="hospitalname" value="{{ Auth::user()->name }}"></input><br>
        First Name: <input type="text" name="firstname" value=""></input><br>
        Last Name: <input type="text" name="lastname" value=""></input><br>
        <input type="hidden" name="email" value="{{ Auth::user()->email }}"></input><br>
        Phone Number: <input type="tel" name="phone" value=""></input><br>
        your image: <input type="file" name="photo" value=""></input>
        <input type="submit"></input>
    </form>

</body>

</html>