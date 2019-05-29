<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class Controller extends Security{

    var $vars = [];
    var $layout = TEMPLATE_VIEW;
    
    public function set($d) {

        $this->vars = array_merge($this->vars, $d);

    }

    public function render($filename) {

        extract($this->vars);

        ob_start();

        require(ROOT . DS . 'app' . DS . 'views' . DS . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();
        require(ROOT . DS . 'app' . DS . 'views/templates/' . $this->layout . '.php');        
        
    }

}
