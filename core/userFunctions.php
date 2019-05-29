<?php defined('BASEPATH') or exit ('No se permite acceso directo'); 

function removeMagicQuotes() {

	if (get_magic_quotes_gpc()) {

		$_GET = stripSlashesDeep($_GET );
		$_POST = stripSlashesDeep($_POST);
		$_COOKIE = stripSlashesDeep($_COOKIE);

	}

}

/** Check register globals and remove them **/
function unregisterGlobals() {

	if (ini_get('register_globals')) {

		$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
		
		foreach ($array as $value) {
			foreach ($GLOBALS[$value] as $key => $var) {
				if ($var === $GLOBALS[$key]) {
					unset($GLOBALS[$key]);
				}
			}
		}
	}

}

/*Inserta las imagenes a la base de datos*/

function insertImage($file, $imageName, $maxImageSize, $UrlFileServer, $idUsuario) {

	$fileTmpPath = $file['tmp_name'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = $imageName . '.' . $fileExtension;
    $allowedfileExtensions = array('jpg', 'jpeg', 'gif', 'png');
    $imageDbURL = $UrlFileServer . '/' . $idUsuario . '/' . $newFileName;

    if($fileSize > $maxImageSize) {

        return array('El tamaño de la imagen excede de 2MB. No se ha insertado la imagen...', false);

    } else if(!in_array($fileExtension, $allowedfileExtensions)) {

        return array('La extensión de la imagen tiene que ser de este tipo: (jpg, jpeg, gif, png). No se ha insertado la imagen...', false);

    } else {

        $dirPath = realpath(dirname(getcwd()));
        $dirPath = $dirPath . '/' . $UrlFileServer . '/' . $idUsuario;
        if(!is_dir($dirPath)) mkdir($dirPath, 0755, true);
        $destPath = $dirPath . '/' . $newFileName;
        $files = glob($dirPath . '/*'); 
        foreach($files as $file){
            if(is_file($file))
            unlink($file); 
        }

        if(move_uploaded_file($fileTmpPath, $destPath)) {

            return array('Imagen insertada correctamente...', true, $imageDbURL);

        } else {

            return array('Ha ocurrido un problema con la carga de la imagen. Inténtalo más tarde...', false);
        }
    }
}

/** Execute functions **/
removeMagicQuotes();
unregisterGlobals();