<?php
require_once 'config.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'option';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Create the controller class name
$controllerClass = ucfirst($controller) . 'Controller';

// Instantiate the controller
$controllerFile = "lms/controllers/$controllerClass.php";
//echo $controllerFile;
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controllerClass();
    $controllerInstance->$action();
} else {
    echo "Controller not found.";
}
?>
