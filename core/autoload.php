<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

spl_autoload_register(function ($className) {

	if (file_exists(ROOT . DS . 'core' . DS . strtolower($className) . '.class.php')) {

		require_once(ROOT . DS . 'core' . DS . strtolower($className) . '.class.php');

	} else {

		echo ' Error en la carga de clases requeridas';
		
	}
	
});
