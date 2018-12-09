<?php
class Application {

    public function __construct()
    {
        require_once CORE_PATH.'/config.php';
    }

    public function run() {
        $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'index';
        $controller = strtolower($controller);
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
        $action = strtolower($action);
        $actionName = $action.'Action';
        $controllerClass = $controller.'Controller';

        if (class_exists($controllerClass)) {
            $instanceController = new $controllerClass();

            if (method_exists($instanceController, $actionName)) {
                $instanceController->$actionName();
            } else {
                $instanceController->indexAction();
            }
        } else {
            $controllerClass = 'errorController';
            $instanceController = new $controllerClass();
            $instanceController->indexAction();
        }
    }
}