<?php defined('BASEPATH') or exit ('No se permite acceso directo');

require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'borrarModel.php');

// class borrarController extends Controller 
// {
// 	public function borrarReceta() 
// 	{
		
		//PRIMERO RECOGEMOS ESTO DEL AJAX - $dato ESTA LAMACENADO LO RECIBIDO POR AJAX; QUE ES LO INTRODUCIDO POR EL USUARIO.
		//$dato = $_POST["dato"];
        // var_dump($dato); 
        
		// //EN LA VARIABLE $REC_DATA ALMACENAMOS LA CONSULTA Y LA ENVIAMOS DE VUELTA CON EL JSON ENCODE .
		// $rect_data=borrarModel::getdatDelete($dato);
		// echo json_encode($rect_data);
		// var_dump($rect_data);
//     }
// }