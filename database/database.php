<?php
// https://www.php.net/manual/fr/book.pdo.php

try {
    $db = new PDO('mysql:dbname=ikea;host=localhost', 'root', '', [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //  FETCH_OBJ or FETCH_ASSOC or FETCH_CLASS
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\Throwable $e) {
    echo "Error Database";
    die();
}