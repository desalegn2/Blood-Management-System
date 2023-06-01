@extends('donor.nav2')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        textarea {
            width: 100%;
            padding: 6px;
            border: 1px solid rgb(70, 68, 68);
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: rgb(37, 116, 161);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Hello, world!</h1>


    <div class="container mt-5">
        @foreach($data as $adv)
        <div class=" mt-5">
            <div class="row mt-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('uploads/registers/'.$adv->image)}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">{{$adv->title}}</h3>
                    <p class="card-text mb-4">{{$adv->description}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $adv->created_at}}</small>
                    <a href="" style="float: right; text-decoration:none;">Bahir Dar Blood Bank</a>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <div class="container">
        <form action="{{url('/donor/givefeedbak')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
            <div class="row">
                <div class="col-25">
                    <label for="feed_back">Feed Back</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="feedback" placeholder="Write feed back,comment ..." style="height:100px"></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
@endsection