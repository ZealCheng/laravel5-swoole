<?php

$table = new swoole_table(1024);
$table->column('fd', swoole_table::TYPE_INT);
$table->column('reactor_id', swoole_table::TYPE_INT);
$table->create();

$server        = new swoole_websocket_server('127.0.0.1', 9501);
$server->table = $table;

$server->on('workerStart', function (swoole_websocket_server $_server, $workerId) {
    if ($workerId == 0) {
        $params = 10;
        //每隔2000ms触发一次
        $_server->tick(2000, function ($timer_id) use ($_server, &$params) {
            foreach ($_server->table as $client) {
                $_server->push($client['fd'], json_encode([
                    'message' => "$params",
                    'count'   => $_server->table->count(),
                ]));
            }
            if (!$params--) swoole_timer_clear($timer_id);
        });
    }
});

$server->on('open', function (swoole_websocket_server $_server, $request) {
    // 查询客户端列表，不存在加入客户端列表(目测get没啥用！！！)
    $client = $_server->table->get($request->fd);
    if (!$client) {
        // 获取客户端信息
        $info = $_server->getClientInfo($request->fd);
        // 存入客户端列表中
        $_server->table->set($request->fd, ['fd' => $request->fd, 'reactor_id' => $info['reactor_id'], 'data' => null]);
        if ($_server->table->count()) {
            //广播客户端新用户消息
            foreach ($_server->table as $client) {
                $_server->push($client['fd'], json_encode([
                    'message' => "欢迎客户端{$request->fd}进入RunningLee俱乐部",
                    'count'   => $_server->table->count(),
                ]));
            }
        }
        echo "当前活跃用户为：{$_server->table->count()}人\n";
    }
});

$server->on('message', function (swoole_websocket_server $ser, $fm) {
    // 广播客户端用户消息
    if ($ser->table->count()) {
        foreach ($ser->table as $client) {
            $ser->push($client['fd'],
                json_encode(['message' => "客户端{$fm->fd}说:".$fm->data, 'count' => $ser->table->count()]));
        }
    }
});

$server->on('request', function (swoole_websocket_server $ser, $request, $response) {
    if ($ser->table->count()) {
        foreach ($ser->table as $client) {
            $ser->push($client['fd'],
                json_encode(['message' => "客户端{$client['fd']}说:".$request->get['message'], 'count' => $ser->table->count()]));
        }
    }
});

$server->on('close', function ($ser, $fd) {
    //删除离开的客户端
    $ser->table->del($fd);
    //广播在线用户离开的是那个客户端
    if ($ser->table->count()) {
        foreach ($ser->table as $client) {
            $ser->push($client['fd'], json_encode(['message' => "客户端{$fd}离开了", 'count' => $ser->table->count()]));
        }
    }
    echo "客户端 {$fd} 关闭\n";
});

$server->start();
