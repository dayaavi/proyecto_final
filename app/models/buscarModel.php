<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class buscarModel extends Model {

	static public function getdat($dato)
	{

		// $connect = Model::getInstanceDB();
		// $name = $_SESSION["usuario"];
		// $sqlName = "SELECT id_user FROM usuarios WHERE usuario=$name";
		// $stmt = $connect->prepare($sqlName);
		// $stmt->execute();

		// $id_user = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// return $id_user;

		$connect = Model::getInstanceDB();
		$sql = "SELECT * FROM usuarios JOIN recetas ON usuarios.id_user = recetas.USUARIOS_id_user WHERE name_receta LIKE concat('%', '$dato', '%') OR category LIKE concat('%', '$dato', '%')";
		$stmt = $connect->prepare($sql);
		$stmt->execute();

		$rect = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// var_dump($rect);

		return $rect;

		// $rect almacena todo el array de la consulta en la base de datos y esta variable es llamada por el controlador para ejectuar su llamada.

	}

}


