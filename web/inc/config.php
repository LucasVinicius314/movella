<?php

$database = 'movella';
$uid = 'root';
$password = '';

header("Content-Type: text/html; charset=utf8");

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('SERVER', "mysql:host=localhost;dbname=$database;charset=utf8");
define('UID', $uid);
define('PASSWORD', $password);
