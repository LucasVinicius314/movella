<?php

require_once '../inc/config.php';

$controller = 'Controller';
$action = isset($_GET['action']) ? $_GET['action'] : 'All';

require_once "../controller/$controller.php";

$Controller = new $controller();

$Controller->$action();
