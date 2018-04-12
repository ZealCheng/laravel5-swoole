<?php

$http = new swoole_http_server('127.0.0.1', 8090);

$http->on('WorkerStart', function ($serv, $worker_id) {
    //在SWOOLE中启动Laravel框架
    require __DIR__.'/../../bootstrap/autoload.php';
});

$http->on('start', function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:8090\n";
});

$http->on('request', function ($req, $res) {
    //启动Laravel应用
    $app = require_once __DIR__.'/../../bootstrap/app.php';
    //$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    //$response = $kernel->handle(
    //    $request = Illuminate\Http\Request::capture()
    //);

    $res->header('Content-Type', 'text/plain');
    $res->end('Hello world');
});

$http->start();
