<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class userModel extends Model {
	//guardar los datos de registro
	//recogemos los datos del formulario para poder insertarlos en la BD
	public function recDato($usuarioR,$contRencrip,$emailR){
		// $date = default;
		$connect = Model::getInstanceDB();

		$sql = "select * from usuarios where email = :emailR";

		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':emailR', $emailR);

		$stmt->execute();
		$rows = $stmt->rowCount();
		if ($rows == 1) {

		// echo json_encode("Email ocupado");
			return 'Email ocupado';

		} else {

		$sql = 'insert into usuarios values (null, :usuarioR, :emailR, :contRencrip, default, default)';
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':usuarioR', $usuarioR);
		$stmt->bindParam(':emailR', $emailR);
		$stmt->bindParam(':contRencrip', $contRencrip);

		// var_dump($emailR);

		//si se ejecuta correctamente el INSERT, retorno al controlador el mensaje de OK
		if(!$stmt->execute()) {
			return 'Registro incorrecto';
		} 
		else {
			return 'Registro correcto';
		}
	}
}
	//leer los datos en la BD
	// confirmamos y verificamos introducido en el form Login con los registrados en la BD
	public function verifDato($usuarioL,$contLencrip){
		// var_dump($usuarioL);
		// var_dump($contLencrip);
		$connect = Model::getInstanceDB();
		$sql = "select * from usuarios WHERE usuario = :usuarioL AND password = :contLencrip;";
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':usuarioL', $usuarioL);
		$stmt->bindParam(':contLencrip', $contLencrip);
		// var_dump($stmt);
		// var_dump($usuarioL);
		// var_dump($contLencrip);

		$stmt->execute();
		$rows = $stmt->rowCount();
		// die; //sirve para que no se ejecute el codigo siguiente y se pueda hacer el vardump
			
		if ($rows == 1) {

			$_SESSION["usuario"] = $usuarioL;

			header('Location: ' . BASE_DOMAIN_DIR_URL . 'home/index');
		}
		else{
            return "Login incorrectos";
        }	
	}
}







