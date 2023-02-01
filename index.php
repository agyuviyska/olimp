<?php


// spl_autoload_register(function ($class_name) {
//         include $class_name . '.php';
// });
include 'Config.php';
include 'Core\Router.php';


try {
    $router = new Core\Router;

    $controller = $router->getController();
     
    $action = $router->getAction(); 

    $controller->{$action}();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}






