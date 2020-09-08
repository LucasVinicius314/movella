<?php

require_once '../inc/config.php';

$controller = 'UsuarioController';
$action = isset($_GET['action']) ? $_GET['action'] : 'signin';

require_once "../controller/$controller.php";

$Controller = new $controller();

$Controller->$action();
