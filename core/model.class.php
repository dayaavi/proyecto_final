<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

class Model extends Security{

	private static $instanceDB = null;

    public function __construct() {

        try {

            self::$instanceDB = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

        } catch (PDOException $e) {

            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;

        }

    }

    public static function getInstanceDB(){ 

        if(!self::$instanceDB) {
            new self();
        }
        return self::$instanceDB;

    }
    
    public static function close() {

        self::$instanceDB = null;

    }

	
}
