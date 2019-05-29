<?php defined('BASEPATH') or exit ('No se permite acceso directo');
  require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'modificarPerfilModel.php');

class modificarPerfilController extends Controller {

    public function index() {

        require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'homeModel.php');
        $userData = new home();
   
        $d['userData'] = $userData->getUserData();

        // var_dump($d['userData']);
        $this->set($d);
        $this->render('index');
    }

    public function mod_perfil()
    {
        $usuario_sess = $_SESSION['usuario'];

        if((isset($_POST['emailM'])) && (isset($_POST['contraM'])) && (isset($_FILES['user-img-file'])))
        {
            $insertImg = insertImage($_FILES['user-img-file'], 'user-image', 2000000, 'data-user/img', $usuario_sess);

            $new_email = Security::secure_input($_POST['emailM']);
            $new_emailMencrip = Security::en_de_cryptIt($new_email,'en');
            $new_contra = Security::secure_input($_POST['contraM']);
            $contMencrip = Security::en_de_cryptIt($new_contra,'en');

            $insertar = new modificarPerfilModel;
            echo json_encode($insertar->recDatoimg($insertImg[2], $new_emailMencrip, $contMencrip, $usuario_sess));
        }
        else
        {
            $new_email = Security::secure_input($_POST['emailM']);
            $new_emailMencrip = Security::en_de_cryptIt($new_email,'en');
            $new_contra = Security::secure_input($_POST['contraM']);
            $contMencrip = Security::en_de_cryptIt($new_contra,'en');

            $insertar = new modificarPerfilModel;
            echo json_encode($insertar->recDato($new_emailMencrip, $contMencrip, $usuario_sess));
        }
    } 
}
