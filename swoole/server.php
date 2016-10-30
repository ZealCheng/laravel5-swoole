<?php
$serv = new \Swoole\Server("127.0.0.1", 9502);
$serv->on('connect', function ($serv, $fd) {
    echo " 连接成功.\n";
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, '客户端ID: '.$from_id);
});
$serv->on('close', function ($serv, $fd) {
    echo "连接关闭.\n";
});

$serv->start();