<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

class Dispatcher {

    private $request;

    public function dispatch() {

        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();

        if(method_exists($controller, $this->request->action)) {

            $response = call_user_func_array([$controller, $this->request->action], $this->request->params);

        } else {

            header('Location: ' . BASE_DOMAIN_DIR_URL . 'webroot/404.php');

        }

    }

    public function loadController() {

        $name = $this->request->controller . 'Controller';
        $file = ROOT . DS . 'app' . DS . 'controllers' . DS . $name . '.php';

        if(file_exists($file)) {
            
            require_once($file);
            $controller = new $name();
            return $controller;
            
        } else {

            header('Location: ' . BASE_DOMAIN_DIR_URL . 'webroot/404.php');

        }
        
    }

}
