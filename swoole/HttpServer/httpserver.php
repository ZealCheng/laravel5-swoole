<?php

$http = new swoole_http_server('127.0.0.1', 8090);

$http->on('WorkerStart', function ($serv, $worker_id) {
    //在SWOOLE中启动Laravel框架
    require __DIR__.'/../../bootstrap/autoload.php';
    $app = require_once __DIR__.'/../../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    //手动启动应用，屏蔽输出
    $kernel->terminate($request, $response);
});

$http->on('start', function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:8090\n";
});

$http->on('request', function ($request, $response) {
    $response->header('Content-Type', 'text/plain');
    $response->end("Hello World\n");
});

$http->start();
