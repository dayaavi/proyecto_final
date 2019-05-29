<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class vistaSinSessionController extends Controller {

    public function index() {
		
		// vista de la receta
		// require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'recetaVistaModel.php');
    	// $insertar = new recetaVistaModel();
    	// $d["mensaje"]= $insertar->ImprRecetas($fname, $categoria, $creado, $descrip, $usuario);
		// $this->set($d);
	    
        $this->render('index');
    }

}