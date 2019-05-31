<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class recetaModel extends Model {
	// static $table_receta = "recetas";
	// static $table_user = "usuarios";
	
	// insertar productos
	public function recDatoReceta($fname, $categoria, $creado, $descrip, $usuario, $ingredients) //recibe los valores necesarios para el post
	{
		$connect = Model::getInstanceDB();
		
		// Consulta del a id del usuario
		$sql = 'SELECT id_user, usuario from usuarios where usuario = "'.$usuario.'" ';//selecciono el id y el usuario, donde el usuario coincida con el recibido por parámetro
		$result = $connect->query($sql); //conecto a la base de datos
		$user_id = $result->fetch(PDO::FETCH_ASSOC); //mientras $resultado reciba valores
		$id = $user_id["id_user"];
		
		// Inserto los valores a la tabala recetas identificando el id del usuario
		$sql_insert = "INSERT INTO recetas (id_recipe, name_receta, category, img_path, creador, descripcion, date_creation, USUARIOS_id_user) 
		VALUES (null, '$fname', '$categoria', default, '$creado', '$descrip', default, '$id')";
		$stmt = $connect->prepare($sql_insert);
		$stmt->execute();

		$last_id = $connect->lastInsertId();
		// Inserto los valores en la tabla productos
		foreach ($ingredients as $value)
		{
			$nameIng = $value["name"];
			$cantUsed = $value["cantUsed"];
			$undMed = $value["undMed"];
			$cantComp = $value["cantComp"];
			$undComp = $value["undComp"];
			$price = $value["price"];
			$sql_insert_ingredients = "INSERT INTO productos (id_productos, name_producto, cant_usada, und_medida, cantidad_comprada, und_med_comp, precio , RECETAS_id_recipe) 
			VALUES (null, '$nameIng', '$cantUsed', '$undMed', '$cantComp', '$undComp', '$price', '$last_id')";
			$stmtPro = $connect->prepare($sql_insert_ingredients);
			$stmtPro->execute();
		}
	}
}	