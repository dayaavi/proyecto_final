<?php defined('BASEPATH') or exit ('No se permite acceso directo');

class userController extends Controller {

    public function index() {

        $this->render('index');
    }

    public function registro() {

        if(isset($_POST['usuarioR']) && isset($_POST['contraR']) && isset($_POST['emailR'])){

            $usuarioR = Security::secure_input($_POST['usuarioR']);
            // $usuarioRencrip = Security::en_de_cryptIt($usuarioR,'en');
            $emailR = Security::secure_input($_POST['emailR']);
            $emailRencrip = Security::en_de_cryptIt($emailR,'en');
            $contraR = Security::secure_input($_POST['contraR']);
            $contRencrip = Security::en_de_cryptIt($contraR,'en');
          
            require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'userModel.php');

            $insertar = new userModel();
            $d['mensaje'] = $insertar->recDato($usuarioR,$contRencrip,$emailRencrip);
            //con set establezco el valor de la variable d y con render envio y muestro el mensaje en index.
            $this->set($d);
            $this->render('index');
            }else{
                header('Location: ' . BASE_DOMAIN_DIR_URL . 'webroot/404.php');
            }
    }

    public function login() {

        if(isset($_POST['usuarioL']) && isset($_POST['contraL'])){

            $usuarioL = Security::secure_input($_POST['usuarioL']);
            // $usuarioLencrip = Security::en_de_cryptIt($usuarioL,'en');
            $contraL = Security::secure_input($_POST['contraL']);
            $contLencrip = Security::en_de_cryptIt($contraL,'en');

            require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'userModel.php');

            $insertar = new userModel();
            $d['mensaje'] = $insertar->verifDato($usuarioL,$contLencrip);

            $this->set($d);
            $this->render('index');
        }else{
            header('Location: ' . BASE_DOMAIN_DIR_URL . 'webroot/404.php');
        }
    }

    public function cerrar() {

        unset($_SESSION["usuario"]);
        session_destroy();
        header('Location: ' . BASE_DOMAIN_DIR_URL . 'home/index');
    }


}