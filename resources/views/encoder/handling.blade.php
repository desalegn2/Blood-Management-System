@extends('encoder.sidebar')
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

    <div class="container mt-5">


        <h1>Handling, Storage & Returns </h1>
        <h4> PACKED RED BLOOD CELLS (PRBCS) RED BLOOD CELLS (RBCS)

        </h4>
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/handling-blood-samples.jpg')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Handling</h3>
                    <p class="card-text mb-4">Once dispensed, any PRBCs shall be immediately transported directly to the RN or LIP requesting the component for transfusion.</p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>

        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/blood-samples-are-stored-in-a-hospital.jpg')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Storage / Shelf Life</h3>
                    <p class="card-text mb-4">PRBCs are stored in a Blood Bank refrigerator at a temp of 1-6ºC until issue. The shelf life is 42 days from the date of collection The expiration date is located on the unit(s).</p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/return-blood.png')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Returns</h3>
                    <p class="card-text mb-4">If the transfusion cannot be initiated within a time frame that would allow for completion within 4 hours of time issued, return the component to the Blood Bank.</p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>
        <div class=" mt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ml-5">
                    <img class="img-fluid" src="{{asset('assets/imgs/exception.png')}}" alt="...">
                </div>
                <div class="col-md-8">
                    <h3 class="card-title mt-2">Exception</h3>
                    <p class="card-text mb-4">Blood can be stored in a Blood Bank validated cooler for up to 6 hours. The cooler must be returned to the Blood Bank prior to the 6 hour cooler expiration time. The cooler will then be repacked and reissued if the blood products are still needed.</p>
                    <p><b>The cooler expiration time is noted on the outside of the cooler.</b></p>

                </div>
                <div class="card-footer">
                    <small class="text-muted">464/4545/4545</small>
                    <a href="" style="float: right;">Read more</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
@endsection