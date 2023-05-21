<?php

$dbName = 'mysql:host=localhost;dbname=imagePosting;charset=utf8';
$userName = 'root';

try {
    $db = new PDO($dbName, $userName);
    var_dump('sucsess');
} catch (\Throwable $th) {
    exit();
}