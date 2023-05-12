@extends('donor.nav2')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .list {
            font-size: large;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid black;
            /* Add a 2px black border to the top of the container */
            padding-top: 20px;
            /* Add some padding to the top of the container to separate the border from the content */

        }

        h1 {
            flex-basis: 30%;
            font-size: 24px;
            margin-right: 20px;
        }

        p {
            flex-basis: 60%;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }

            h1 {
                margin-bottom: 10px;
            }
        }
    </style>

</head>

<body>


    <div class="main-block" style="padding: 15rem;">
        <div class="container">
            <h1>Reservation Stastus</h1>
            <p>Your Reservation are {{$stat}}</p>
        </div>
        <div class="container">
            <h1>መስፈርቶች:</h1>
            <ul>
                <li class="list">
                    <!-- Fasting or refraining from certain foods or drinks prior to the donation -->
                    ደም ከመስጠትወ በፊት መጾም ወይም ከአንዳንድ ምግቦች ወይም መጠጦች መከልከል
                </li>
                <li class="list">
                    <!-- Bringing a form of identification or a blood donor card -->
                    ወደ ሞሉት ሴንተር መምጣት
                </li>
                <li class="list">
                    <!-- Refraining from certain activities, such as heavy exercise or alcohol consumption, prior to the donation -->
                    ደም ከመለግስወ በፊት እንደ ከባድ የአካል ብቃት እንቅስቃሴ ወይም አልኮል መጠጣት ካሉ አንዳንድ ተግባራት መቆጠብ
                </li>
                <li class="list">
                    <!-- Providing health history information, including recent travel, vaccinations, or illnesses -->
                    የቅርብ ጊዜ ጉዞን፣ ክትባቶችን ወይም በሽታዎችን ጨምሮ የጤና ታሪክ መረጃን መስጠት
                </li>
                <li class="list">
                    <!-- Waiting a certain period of time between blood donations -->
                    በደም ልገሳ መካከል የተወሰነ ጊዜ ይጠብቃሉ
                </li>
            </ul>
        </div>
        <div class="container">
            
            <h1>የዝግጅት መመሪያዎች:</h1>
            <ul>
                <li class="list">
                <!-- Drink plenty of water or fluids before donating -->
                    ከመለገስወ በፊት ብዙ ውሃ ወይም ፈሳሽ ይጠጡ</li>
                <li class="list">
                    <!-- Eat a healthy meal or snack prior to the donation -->
                    ደም ከመለግስወ በፊት ጤናማ ምግብ ወይም መክሰስ ይብሉ
                </li>
                <li class="list">
                    <!-- Dress comfortably and wear clothing with sleeves that can be rolled up -->
                    ምቾት ያለው ልብስ ይልበሱ እና ሊጠቀለል የሚችል እጅጌ ያለው ልብስ ይለብሱ
                </li>
                <li class="list">
                    <!-- Bring a book or other entertainment to occupy the time during the donation process -->
                    በደም ልገሳ ሂደት ጊዜውን ለማሳለፍ መጽሐፍ ወይም ሌላ መዝናኛ ይዘው ይምጡ
                </li>
                <li class="list">
                    <!-- Plan to rest and avoid strenuous activity for several hours after the donation -->
                    ከለገሱ በኋላ እረፍት ያድርጉ, ከለገሱ በኋላ ለብዙ ሰዓታት ከባድ እንቅስቃሴዎችን ያስወግዱ
                </li>
            </ul>
        </div>
      
    </div>
</body>

</html>
@endsection