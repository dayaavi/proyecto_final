<?php defined('BASEPATH') or exit ('No se permite acceso directo');
// Formulario Crear Recetas
class recetaController extends Controller {

    public function index() {

        require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'homeModel.php');
        $userData = new home();
        $d['userData'] = $userData->getUserData();
        // var_dump($d['userData']);
        $this->set($d);

        $this->render('index');
    }
 
    public function form() 
    {
        $usuario = $_SESSION['usuario'];
        // $asd = Security::secure_input($_POST['ingredients']);
        

        if((isset($_POST['fname'])) && (isset($_POST['categoria'])) && (isset($_POST['creado']))  && (isset($_POST['text_form'])))
        {
            $fname = Security::secure_input($_POST['fname']);
            $categoria = Security::secure_input($_POST['categoria']);
            $creado = Security::secure_input($_POST['creado']);
            $text_form = Security::secure_input($_POST['text_form']);
            $ingredients = json_decode($_POST["ingredients"], true);
            require_once(ROOT . DS . 'app' . DS . 'models' . DS . 'recetaModel.php');
            $inserDato = new recetaModel();
            echo json_encode($inserDato->recDatoReceta($fname, $categoria, $creado, $text_form, $usuario, $ingredients));

        }else{
             header('Location: ' . BASE_DOMAIN_DIR_URL . 'webroot/404.php');
        }
    }    
} 

?>