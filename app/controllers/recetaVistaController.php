<?php defined('BASEPATH') or exit ('No se permite acceso directo'); ?>

<?php

class recetaVistaController extends Controller {

	public function index() {
		// foto perfil
		require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'homeModel.php');
		$userData = new home();
		$d['userData'] = $userData->getUserData();
		$this->set($d);

		// se recoge los valores del modelo para enviar a la vista de recetas por medio de la variable $d
		require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'recetaVistaModel.php');
		$resultados = new recetaVistaModel();
		$d["resultados"]= $resultados->getRecetas($d['userData']['id_user']);
		$this->set($d);

		$this->render('index');
	}
}

?>