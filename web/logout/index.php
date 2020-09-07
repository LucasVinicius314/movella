<?php

require_once '../inc/config.php';

$controller = 'UsuarioController';
$action = 'logout';

require_once "../controller/$controller.php";

$Controller = new $controller();

$Controller->$action();
