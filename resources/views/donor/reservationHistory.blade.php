@extends('donor.navbar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <style>
        /* ======================= Cards ====================== */
        .cardBox {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 30px;
        }

        .cardBox .card {
            position: relative;
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .cardBox .card .numbers {
            position: relative;
            font-weight: 500;
            font-size: 2.5rem;
            color: var(--blue);
        }

        .cardBox .card .cardName {
            color: var(--black2);
            font-size: 1.1rem;
            margin-top: 5px;
        }

        .cardBox .card .iconBx {
            font-size: 3.5rem;
            color: var(--black2);
        }

        .cardBox .card:hover {
            background: var(--blue);
        }

        .cardBox .card:hover .numbers,
        .cardBox .card:hover .cardName,
        .cardBox .card:hover .iconBx {
            color: var(--white);
        }
    </style>

</head>

<body>

    <div class="main-block" style="padding: 15rem;">
        <div>
            <h1>Reservation Stastus</h1>
            <h3>Your Reservation are {{$stat}}</h3>

            <h2>Requirements:</h2>
            <ul>
                <li>Fasting or refraining from certain foods or drinks prior to the donation</li>
                <li>Bringing a form of identification or a blood donor card</li>
                <li>Refraining from certain activities, such as heavy exercise or alcohol consumption, prior to the donation</li>
                <li>Providing health history information, including recent travel, vaccinations, or illnesses</li>
                <li>Waiting a certain period of time between blood donations</li>
            </ul>

            <h2>የዝግጅት መመሪያዎች:</h2>
            <ul>
                <li>ከመለገስወ በፊት ብዙ ውሃ ወይም ፈሳሽ ይጠጡ</li>
                <li>Eat a healthy meal or snack prior to the donation</li>
                <li>Dress comfortably and wear clothing with sleeves that can be rolled up</li>
                <li>Bring a book or other entertainment to occupy the time during the donation process</li>
                <li>Plan to rest and avoid strenuous activity for several hours after the donation</li>
            </ul>


        </div>
    </div>
</body>

</html>
@endsection