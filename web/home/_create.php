<?php

require_once '../inc/config.php';

$controller = 'AgendamentoController';
$action = '_Create';

require_once "../controller/$controller.php";

$Controller = new $controller();

$Controller->$action();
