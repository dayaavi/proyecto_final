<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class recetaModel extends Model {

	private $id;
	private $fname;
	private $categoria;
	private $img;
	private $creado;
	private $descrip;
	static $table_receta = "recetas";
	static $table_user = "usuarios";

	
	// insertar productos
	public function recDatoReceta($fname, $categoria, $creado, $descrip, $usuario) //recibe los valores necesarios para el post
	{
		$connect = Model::getInstanceDB();
		$sql = 'SELECT id_user, usuario from usuarios where usuario = "'.$usuario.'" ';//selecciono el id y el usuario, donde el usuario coincida con el recibido por parámetro
		$result = $connect->query($sql); //conecto a la base de datos
		$user_id = $result->fetch(PDO::FETCH_ASSOC); //mientras $resultado reciba valores

		$id = $user_id["id_user"];
		
		// Inserto los valores a la base de datos
		$sql_insert = "INSERT INTO recetas (id_recipe, name_receta, category, img_path, creador, descripcion, date_creation, USUARIOS_id_user) 
		VALUES (null, '$fname', '$categoria', default, '$creado', '$descrip', default, '$id')";
		$stmt = $connect->prepare($sql_insert);//conecto a la base de datos e inserto

		if(!$stmt->execute()) {
			return 'Fallo en la inserción de los datos en la DB';
		} else {
			return 'Datos insertado correctamente';
		}
	}
}	

