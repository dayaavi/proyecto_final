<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

class Request {

    public $url;

    public function __construct() {

        $this->url = $_SERVER['REQUEST_URI'];
        
    }
    
}

