<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Home Page</title>


    <style>
        .card-container {
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 150px;
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
    @include('donor.chatbotnav')

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chatbot_style.css') }}"> -->

    <div class="card-container">
        <h2 class="card-title">Bahir Dar Blood Bank Chat Bot</h2>
        <div class="card-row">
            <div class="card-column">
                <div class="card">
                    <h3 class="card-headheadinging">Wellcome</h3>
                    <p class="card-content" style="font-size: 23px; color:blueviolet">
                        <!-- "Welcome to our blood bank chatbot! I'm here to answer your questions about blood donation and help you find a donation center near you." -->
                        እንኳን በደህና መጡ ወደ ደም ባንክ ቻትቦታችን!<br>
                         ስለ ደም ልገሳ ጥያቄዎቻችሁን ለመመለስ እና በአቅራቢያዎ የሚገኝ የልገሳ ማእከል እንድታገኙ ልረዳዎ እዚህ መጥቻለሁ።
                    </p>
                </div>
            </div>
            <div class="card-column">
                <div class="card">
                    <h3 class="card-heading">About Chat Bot</h3>
                    <p class="card-content" style="font-size:medium;">
                        <!-- 
                        The chatbot can provide information on how to donate, where to donate, what to expect during the donation process, and answer any other questions that a user may have.<br>
                        Additionally, a blood bank chatbot can help to address common misconceptions about blood donation, such as concerns about the safety of the donation process or the idea that only certain blood types are needed.
                         -->
                        ቻትቦቱ እንዴት እንደሚለግሱ፣ የት እንደሚለግሱ፣ በልገሳ ሂደት ውስጥ ምን እንደሚጠብቁ እና ተጠቃሚው ለሚጠይቃቸው ሌሎች ጥያቄዎች መልስ መስጠት ይችላል።
                        በተጨማሪም፣ የደም ባንክ ቻትቦት ስለ ደም ልገሳ የተለመዱ የተሳሳቱ አመለካከቶችን ለመፍታት ይረዳል፣ ለምሳሌ ስለ ልገሳ ሂደት ደህንነት ስጋት ወይም የተወሰኑ የደም ዓይነቶች ብቻ ያስፈልጋሉ የሚል የተሳሳተ ግንዛቤ።
                    </p>
                </div>
            </div>
            <div class="card-column">
                <div class="card">
                    <h3 class="card-headheadinging">How to chat</h3>
                    <p class="card-content">
                        <!-- <ul>
                            <li>Look for the chatbot icon or button on our website. It is located in the bottom right corner of the page. </li>
                            <li>Click on the chatbot icon or button to open the chat window. </li>
                            <li>Type your message or question into the chat window. </li>
                            <li>The chatbot understand your message and provide a response. </li>
                            <li>Continue the conversation as needed, and follow any instructions or suggestions provided by the chatbot. </li>
                        </ul> -->
                        <!-- give clear instructions -->

                         <b>1,</b><!-- Look for the chatbot icon or button on our website. It is located in the bottom right corner of the page. -->
                        በድረ-ገጻችን ላይ የቻትቦት በትን ወይም ምልክት ይፈልጉ። በገጹ ታችኛው ቀኝ ጥግ ላይ ይገኛል።
                        <br>

                       <b>2,</b>   <!-- Click on the chatbot icon or button to open the chat window. -->
                        የውይይት መስኮቱን ለመክፈት የቻትቦት በትን ወይም ምልክት ጠቅ ያድርጉ
                        <br>

                         <b>3,</b> <!--Type your message or question into the chat window. -->
                        በቻት መስኮቱ ውስጥ መልእክትዎን ወይም ጥያቄዎን ይፃፉ 
                        <br>

                       <b>4,</b>   <!--The chatbot understand your message and provide a response. -->
                        ቻትቦታችን መልክትወትን ተረድቶ ምላሽ ይሰጣል።
                        <br>

                       <b>5,</b>  <!-- Continue the conversation as needed, and follow any instructions or suggestions provided by the chatbot. -->
                        እንደ አስፈላጊነቱ ውይይቱን ወይም ጥያቄወን ይቀጥሉ እና በቻትቦቱ የቀረበውን ማንኛውንም መመሪያ ወይም አስተያየት ይከተሉ።
                        <br>
                    </p>
                </div>
            </div>

            <!-- Highlight common questions and answers: Provide a list of common questions and answers that
             the chatbot can address, such as "How do I donate blood?" or "What are the requirements
              for blood donation?" This will give users an idea of what they can ask the chatbot and 
              help them to get started. -->
            <div class="card-column">
                <div class="card">
                    <h3 class="card-heading">Highlight questions and answers</h3>
                    <p class="card-content">

                  

                    <p style="float: right;">ለጋሾች ውጤታቸው መቼ ነው የሚነገረው ?</p><br><br>
                    <p>የባህር ዳር ደም ለጋሽ ደንበኞች ዉጤታቸውን ለማየት፣ የባህር ዳር ደም ባንክ ኢንፎርሜሽን ማኔጅመንት ዌብ ሲስተም ተጠቃሚ ከሆኑ መቸ ወጤቱ
                        ዉጤታቸዉ በሲስተሙ ይደርሳቸዋል፣ካልሆኑ ደግሞ ሲለግሱ ባስመዘገቡት ስልክ ቁጥር ዉጤታቸዉን መጥተዉ እንዲያዩ መልዕክት የደርሳቸዋል።ደንበኞች ሲስተሙን ቢጠቀሙ ጥሩ ይሆናል።</p>
                    </p>
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