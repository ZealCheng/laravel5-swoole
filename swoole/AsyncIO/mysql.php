<?php
$db     = new swoole_mysql;
$server = array(
    'host'     => '127.0.0.1',
    'user'     => 'root',
    'password' => '123456',
    'database' => 'runninglee',
);
$r      = $db->connect($server, function ($db, $result) {
    if ($result === false) {
        var_dump($db->connect_errno, $db->connect_error);
        die;
    }
    echo "connect to mysql server sucess\n";
    $sql = 'show tables';
    $db->query($sql, function (swoole_mysql $db, $r) {
        global $s;
        if ($r === false) {
            var_dump($db->error, $db->errno);
        } elseif ($r === true) {
            var_dump($db->affected_rows, $db->insert_id);
        }
        echo "count=".count($r).", time=".( microtime(true) - $s ), "\n";
        $db->close();
    });
});