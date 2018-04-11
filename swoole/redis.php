<?php

$redis = new Swoole\Redis;
$redis->connect('127.0.0.1', 6379, function ($redis, $result) {
    var_dump($result);
});
