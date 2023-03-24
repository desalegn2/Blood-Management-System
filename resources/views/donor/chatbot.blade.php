<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add your custom styles here */

        /* Change the background color of the chat widget */
        #botmanWidgetRoot {
            background-color: #f8f8f8;
        }

        /* Change the font size of the chat messages */
        .botman-message-text {
            font-size: 16px;
        }

        /* Change the color of the send button */
        #botmanWidgetSendButton {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    @include('donor.chatbotnav')

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget = {
            aboutText: 'Write Something',
            introMessage: "✋ Hi! I'm chat bot to answer BBB question"
        };
    </script>


    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</body>

</html>