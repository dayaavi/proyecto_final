<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class homeController extends Controller {

    public function index() {

    	require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'homeModel.php');
    	$userData = new home();
    	$d['userData'] = $userData->getUserData();
		$this->set($d);
		
        $this->render('index');
    }

}
