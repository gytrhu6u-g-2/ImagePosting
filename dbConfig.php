<?php
// DB接続ファイル
    $dbName = 'mysql:host=localhost;dbname=imageposting;charset=utf8';
    $userName = 'root';
    $password = 'root';

    try {
        $db = new PDO($dbName, $userName, $password);
        var_dump("接続成功");
    } catch (\Throwable $th) {
        var_dump($th);
        exit();
    }