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

        .online {
            width: 120px;
            height: 30px;
            line-height: 30px;
            position: absolute;
            left: 0;
            bottom: 0;
        }

        .online p {
            margin: 0;
        }

        .online span {
            font-size: 30px;
            color: red;
            font-weight: bold;
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
    <div class="online">
        <p>在线人数<span id="count"></span>人</p>
    </div>
    <ul class="mine" id="mine">
    </ul>
    <div class="messages-box">
        <input class="messages-box-content" id="content">
        <button type="submit"
                onclick="websocket.send( document.getElementById('content').value )"
                class="messages-box-send">发送
        </button>
    </div>
</div>

<script type="text/javascript">
    var mine            = document.getElementById('mine');
    var websocket       = new WebSocket("ws://127.0.0.1:9501");
    websocket.onopen    = function (event) {
        console.info('恭喜，连接成功！');
    };
    websocket.onmessage = function (event) {
        document.getElementById('count').innerText = JSON.parse(event.data).count;
        mine.insertAdjacentHTML('beforeend', '<li>' + JSON.parse(event.data).message + '</li>')
    };

    websocket.onclose = function (event) {
        document.getElementById('count').innerText = event.data;
        console.info('对不起，服务连接关闭！');
    };

    websocket.onerror = function (event, e) {
        console.error("服务连接出问题了：" + event.data);
    };
</script>
</body>
</html>
