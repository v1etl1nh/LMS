<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
    </div>
    
  </div>
</nav>
</body>
</html>

<?php
require_once 'config.php';

// Get the controller and action from the URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'course_user';
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
