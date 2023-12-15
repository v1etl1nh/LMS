<?php
$controller = $_GET['controller'] ?? 'article';
$action = $_GET['action'] ?? 'index';

if ($controller === 'auth') {
    $controllerClass = 'AuthController';
} else {
    $controllerClass = 'ArticleController';
}

require_once "controllers/$controllerClass.php";
$controllerInstance = new $controllerClass();
$controllerInstance->$action();


