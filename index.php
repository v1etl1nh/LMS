<?php
require_once 'config.php';
// Get the controller and action from the URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Create the controller class name
$controllerClass = ucfirst($controller) . 'Controller';

// Instantiate the controller
$controllerFile = "lms/controllers/$controllerClass.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
        $controllerInstance = new $controllerClass();
        $controllerInstance->$action();
} else {
    echo "Controller not found.".$controllerFile;
}
?>
