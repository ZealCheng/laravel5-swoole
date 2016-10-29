<?php

//$serv = new \Swoole\Server("127.0.0.1", 9502);
//$serv->on('connect', function ($serv, $fd){
//    echo " 连接成功.\n";
//});
//$serv->on('receive', function ($serv, $fd, $from_id, $data) {
//    $serv->send($fd, 'Swoole: '.$from_id);
//});
//$serv->on('close', function ($serv, $fd) {
//    echo "连接关闭.\n";
//});
//
//$serv->start();

//WebSocket 可以使用
//$server = new swoole_websocket_server("127.0.0.1", 9501);
//
//$server->on('open', function (swoole_websocket_server $server, $request) {
//    echo "客户{$request->fd}加入\n";
//});
//
//$server->on('message', function (swoole_websocket_server $ser, $fm) {
//    //echo "receive from {$fm->fd}:{$fm->data},opcode:{$fm->opcode},fin:{$fm->finish}\n";
//    $ser->push($fm->fd, $fm->data);
//});
//
//$server->on('close', function ($ser, $fd) {
//
//    $ser->push($fd, "关闭");
//});
//
//$server->start();

//异步MySQL可以使用
//$db = new swoole_mysql;
//$server = array(
//    'host' => '127.0.0.1',
//    'user' => 'root',
//    'password' => '123456',
//    'database' => 'runninglee',
//);
//$r = $db->connect($server, function ($db, $result)
//{
//    if ($result === false)
//    {
//        var_dump($db->connect_errno, $db->connect_error);
//        die;
//    }
//    echo "connect to mysql server sucess\n";
//    $sql = 'show tables';
//    $db->query($sql, function (swoole_mysql $db, $r)
//    {
//        global $s;
//        if ($r === false)
//        {
//            var_dump($db->error, $db->errno);
//        }
//        elseif ($r === true)
//        {
//            var_dump($db->affected_rows, $db->insert_id);
//        }
//        echo "count=" . count($r) . ", time=" . (microtime(true) - $s), "\n";
//        $db->close();
//    });
//});

//predis 可用
//$redis = new redis;
//$redis->connect('127.0.0.1', 6379);
//var_dump($redis);

$client = new swoole_redis;
$client->on('message', function (swoole_redis $client, $result) {
    var_dump($result);
    static $more = false;
    if (!$more and $result[0] == 'message')
    {
        echo "subscribe new channel\n";
        $client->subscribe('msg_1', 'msg_2');
        $client->unsubscribe('msg_0');
        $more = true;
    }
});
$client->connect('127.0.0.1', 6379, function (swoole_redis $client, $result) {
    echo "connect\n";
    $client->subscribe('msg_0');
});
