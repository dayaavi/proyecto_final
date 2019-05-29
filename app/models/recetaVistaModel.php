<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class recetaVistaModel extends Model {
    public function getRecetas($id)
    {        
        $connect = Model::getInstanceDB();      
        $sql = 'SELECT * FROM new_web_chef.recetas WHERE USUARIOS_id_user = "'.$id.'"';
        $stmt = $connect->query($sql);
        $result = $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public function getSubString($string)
		{
		    $length = 150;
		    $stringDisplay = substr(strip_tags($string), 0, $length);
		    if (strlen(strip_tags($string)) > $length)
		        $stringDisplay .= ' ...';
		    return $stringDisplay;
		}
}