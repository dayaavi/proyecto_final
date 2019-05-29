<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

class Router {

    static public function parse($url, $request) {

        $url = trim($url);

        if ($url == BASE_DIR_URL) {

            $request->controller = INDEX_CONTROLLER;
            $request->action = INDEX_ACTION;
            $request->params = [];

        } else {

            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
            
        }

    }
    
}
