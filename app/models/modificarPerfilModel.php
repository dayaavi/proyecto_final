<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class modificarPerfilModel extends Model {

     public function recDatoimg($new_img, $new_emailMencrip, $contMencrip, $usuario_sess)
    {
        $connect = Model::getInstanceDB();

        $sql = "update usuarios set image = :image, email = :new_emailMencrip, password = :new_contra where usuario = :usuario";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':image', $new_img);
        $stmt->bindParam(':new_emailMencrip', $new_emailMencrip);
        $stmt->bindParam(':new_contra', $contMencrip);
        $stmt->bindParam(':usuario', $usuario_sess);

        if($stmt->execute())
        {
            return true;

        } else {

            return false;
        }
    }

    public function recDato($new_emailMencrip, $contMencrip, $usuario_sess)
    {
		$connect = Model::getInstanceDB();
		// $sql = "update usuarios set usuario = :new_emailMencrip, password = :new_contra where usuario = :usuario";

        $sql = "update usuarios set email = :new_emailMencrip, password = :new_contra where usuario = :usuario";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':new_emailMencrip', $new_emailMencrip);
        $stmt->bindParam(':new_contra', $contMencrip);
        $stmt->bindParam(':usuario', $usuario_sess);
        
        if($stmt->execute()){
            // $_SESSION['usuario'] = $new_emailMencrip;
            return true;

        } else {

           return false;
        }
    }

}
