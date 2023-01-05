@extends('donor.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @foreach($advert as $adv)
    <div class="card-deck">
        <div class="card">
            <img src="{{asset('uploads/registers/'.$adv->image)}}" class="card-img-top" alt="..." style="width:800px; height:400px">
            <div class="card-body">
                <h5 class="card-title">{{$adv->title}}</h5>
                <p class="card-text">{{$adv->description}}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{ $adv->created_at}}</small>
            </div>
        </div>


    </div>
    @endforeach
</body>

</html>
@endsection