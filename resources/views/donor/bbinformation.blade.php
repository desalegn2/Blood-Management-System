@extends('donor.navbar')
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

    </style>
</head>

<body>
    <h1>Bahir Dar Blood Bank!</h1>


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
                    <button class="mb-4" href="" style="float: right;">share </button>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                        <img class="YOUR_FB_CSS_STYLING_CLASS" src="{{asset('assets/imgs/fb2.png')}}" width="30px" height="30px" alt="Share on Facebook">
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $adv->created_at}}</small>
                    <p style="float: right;">Bahir Dar Blood Bank</p>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    <div class="container mt-5">

        <div class=" mt-5">
            <div class="row mt-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('uploads/registers/'.$adv->image)}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Blood Compatibility</h3>
                    <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos accusantium amet quaerat illo saepe eos pariatur earum natus cumque, eaque tenetur, ratione voluptas consequatur iusto molestiae doloribus excepturi alias vero?</p>
                    <img class="d-block w-100" src="{{asset('assets/imgs/blood-donor-compatibilityv3.jpg')}}" alt="First slide">
                </div>
                <div class="card-footer">
                    <small class="text-muted"></small>
                    <p style="float: right;">Bahir Dar Blood Bank</p>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
@endsection