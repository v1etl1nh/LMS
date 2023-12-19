<?php
require_once 'config.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$controllerClass = ucfirst($controller) . 'Controller';

$controllerFile = "lms/controllers/$controllerClass.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controllerClass();
    $controllerInstance->$action();
} else {
    echo "Controller not found.";
}
?>
