<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class recetaVistaModel extends Model {
    public function getRecetas($id)
    {        
        $connect = Model::getInstanceDB();      
        $sqlR = 'SELECT * FROM new_web_chef.recetas WHERE USUARIOS_id_user = "'.$id.'"';
        $stmtR = $connect->query($sqlR);
        $result = $stmtR->execute();
        $rows = $stmtR->fetchAll();
        return $rows;
    }

    public function getProductosByRecetaId($recetaId)
    {
        $connect = Model::getInstanceDB();      
        $sql = 'SELECT * FROM productos WHERE productos.RECETAS_id_recipe = "'.$recetaId.'"';
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