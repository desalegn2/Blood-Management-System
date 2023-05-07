@extends('donor.navbar')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        .card-container {
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 70px;
        }

        .card-title {
            margin-bottom: 20px;
            text-align: center;
        }

        .card-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-column {
            flex: 1;
            max-width: 300px;
            margin: 10px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }




        .card-heading {
            margin-top: 0;
        }

        .card-content {
            margin-bottom: 0;
        }

        @media (max-width: 767px) {
            .card-row {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>


    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chatbot_style.css') }}">
    <h1>ChatBot</h1>
    <div class="card-container">
        <h2 class="card-title">Card Title</h2>
        <div class="card-row">
            <div class="card-column">
                <div class="card">
                    <h3 class="card-heading">How to chat</h3>
                    <p class="card-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam velit dolorem eveniet exercitationem ipsum odit neque quam, illo ut! Necessitatibus, culpa id! Assumenda ut et unde quia in eveniet sequi.</p>
       
                    <ul>
                        <li>
                            <p class="card-content">open chat botlink and click button</p>
                        </li>
                        <li>
                            <p class="card-content">open chat botlink and click button</p>
                        </li>
                        <li>
                            <p class="card-content">open chat botlink and click button</p>
                        </li>
                        <li>
                            <p class="card-content">open chat botlink and click button</p>
                        </li>
                        <li>
                            <p class="card-content">type your question</p>
                        </li>
                        <li>
                            <p class="card-content">click inter</p>
                        </li>
                        <li>
                            <p>if your quesrion is not answered ask again and clear your question</p>
                        </li>
                    </ul>
                  
                </div>
            </div>
            <div class="card-column">
                <div class="card">
                    <h3 class="card-heading">Card 2</h3>
                    <p class="card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci labore quidem exercitationem. Cupiditate deleniti voluptatibus architecto similique? Vero, iusto mollitia. Unde accusamus odio quod quam error impedit voluptatem aperiam vitae!</p>
                </div>
            </div>
            <div class="card-column">
                <div class="card">
                    <h3 class="card-heading">Card 3</h3>
                    <p class="card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, placeat reprehenderit ex inventore voluptates tempore adipisci, quisquam suscipit nesciunt, enim maxime eius aliquam cum mollitia totam quae id? Explicabo, delectus?</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        var botmanWidget = {
            title: "ያልገባዎትን ይጠይቁ",
            aboutText: "Write Something",
            introMessage: "✋ Welcome! How can I assist you today?",
            mainColor: "#10A19D",
            bubbleBackground: "#03C988",
            bubbleButtonText: "Click me to chat!",
            //bubbleAvatarUrl: "{{asset('assets/imgs/photo2.jpg')}}",
            chatId: "my-chat",
            userId: "my-user-id",
            inputIds: ["name", "email"]
        };
    </script>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</body>

</html>

@endsection