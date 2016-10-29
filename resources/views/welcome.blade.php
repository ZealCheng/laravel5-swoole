<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        input, button, select, textarea {
            outline: none
        }

        .page {
            height: 100%;
        }

        ul.mine {
            list-style: none;
            width: 300px;
            top: 30px;
            margin: 0 auto;
        }

        ul.mine li {
            height: 25px;
            line-height: 25px;
        }

        .messages-box {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 320px;
            height: 30px;
        }

        .messages-box-content {
            width: 258px;
            height: 28px;
            margin: 0;
            padding: 0;
            border: 1px solid #dcdcdc;
        }

        .messages-box-send {
            position: absolute;
            right: 0;
            width: 60px;
            height: 30px;
            margin: 0;
            padding: 0;
            border: none;
            color: #ffffff;
        }

    </style>
</head>
<body>
<div class="page">
    <ul class="mine" id="mine">
    </ul>
    <div class="messages-box">
        <input class="messages-box-content" id="content">
        <button onclick="ws.send( document.getElementById('content').value )" class="messages-box-send">发送</button>
    </div>
</div>

<script type="text/javascript">
    var mine     = document.getElementById('mine');
    var ws       = new WebSocket("ws://127.0.0.1:9501");
    ws.onopen    = function (event) {
        mine.insertAdjacentHTML('beforeend', '<li>恭喜，连接成功！</li>')
    };
    ws.onmessage = function (event) {
        mine.insertAdjacentHTML('beforeend', '<li>' + event.data + '</li>')
    };


</script>
</body>
</html>
