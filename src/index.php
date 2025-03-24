<?php

// Inicio de sesion
session_start();

// Dependencias
require_once 'config/config.php';

if(!isset($_GET['action'])) $_GET['action'] = constant('DEFAULT_ACTION');

$controller = new Controller();

$datos = array();
$datos = $controller->$_GET['action']();

// Dependencias de la vista
require_once 'View/templates/header.php';
require_once 'View/'. $controller->getView() .'.php';
require_once 'View/templates/footer.php';

?>