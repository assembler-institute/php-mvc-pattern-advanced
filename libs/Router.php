<?php
require_once(CONTROLLERS . '/FailureController.php');

class Router
{
    function __construct()
    {
        if (EXECUTION_FLOW)
            echo "<p>Router Loaded</p>";
        //Position [0] it's for controllers
        //Position [1] it's for methods

        //We can GET the URL because we specified this in the htaccess
        //$url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : null;
        // first line is like an IF and next the ? it's the true condition and next : it's the else condition
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //When there is no controller in the URL
        if (empty($url[0]) || $url[0] == "main") {
            $fileController = CONTROLLERS . '/' . 'MainController.php';
            require_once($fileController);
            $controller = new MainController();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        $class = ucfirst($url[0]);
        $fileController = CONTROLLERS . '/' . $class . 'Controller.php';
        $classController = $class . 'Controller';

        if (file_exists($fileController)) {
            require_once($fileController);

            //Inicialize the controller
            $controller = new $classController; //Its the same than writte Main
            $controller->loadModel($class);

            //Number of array elements
            $nParam = sizeof($url);
            if ($nParam == 1) {
                $controller->defaultMethod();
            }
            if ($nParam == 2) {
                //Llamamos a la función que está en la URL del controlador
                if ($controller->{$url[1] . $class}() === false) {
                    $controller = new FailureController();
                }
                //If url have more than 2 params, it means that have value like and id
            } else if ($nParam > 2) {
                $params = [];
                for ($i = 2; $i < $nParam; $i++) {
                    array_push($params, $url[$i]);
                }
                if ($controller->{$url[1] . $class}($params) === false) {
                    echo "dsadasdas";
                    $controller = new FailureController();
                }
            }
        } else {
            $controller = new FailureController();
        }
    }
}
