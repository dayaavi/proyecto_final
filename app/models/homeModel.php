<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class home extends Model {

	public function getUserData(){

		$connect = Model::getInstanceDB();
		$sql = "select * from usuarios WHERE usuario = :usuario";
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':usuario', $_SESSION["usuario"]); // Me almacena el valor del campo usuario de la BD $_SESSION["usuario"] y establezco ese valor en :usuario
		$stmt->execute();
		// En $userData guardo toda la lista  y arreglo en asociativo
		$userData = $stmt->fetch(PDO::FETCH_ASSOC);
		//var_dump($userData);
		return $userData;
	}

}
