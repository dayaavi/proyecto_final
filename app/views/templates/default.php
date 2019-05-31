<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Home del chef</title>
        <meta charset="utf-8" />
        <link rel="icon" href="<?php echo BASE_DIR_URL_IMG?>favicon.ico" type="/proyecto_final/webroot/img/favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo BASE_DOMAIN_DIR_URL?>">
        <link rel="stylesheet" type="text/css" media="screen" href="webroot/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="webroot/css/home.css">
        <link rel="stylesheet" type="text/css" href="webroot/css/user.css">
        <link rel="stylesheet" type="text/css" href="webroot/css/receta.css">
        <link rel="stylesheet" type="text/css" href="webroot/css/vista_receta.css">
        <script type="text/javascript" src="webroot/js/receta.js"></script>
        <script type="text/javascript" src="webroot/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="webroot/js/home.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="webroot/css/modificarPerfil.css">
        <script type="text/javascript" src="webroot/js/modificarPerfil.js"></script>
        <script type="text/javascript" src="webroot/js/buscar.js"></script>
        <script type="text/javascript" src="webroot/js/borrar.js"></script>
        </head>

    <body>
        <header> 
            <!-- header estatico -->
            <div class="fila lime-image col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="lime-text">
                    <h1 id="inicio_h1">La herramienta del Chef</h1>
                    <h3>Estoy para servirte</h3>
                    <!-- Debo indicar la clase y el metodo para buscar -->
                   <!--  <form action="clase/metodo" method="post" id="search" class="form_search"> -->
                    <div class="buscar">
                        <input type="search" id="search_lime" name="search_lime" placeholder="Buscar recetas..." required>
                        <!-- <button type="submit" id="button_lime"><i class="fa fa-search"></i></button> -->
                        <!-- <div id="result"></div>  -->                    
                    </div> 
                   <!--  </form>        -->                
                </div> 
            </div>
            <script src="webroot/js/jquery.ripples-min.js"></script>

            <!-- hasta aqui header estatico -->
            <?php 
            if (!isset($_SESSION['usuario'])) {
                require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'templates' . DS . 'header1.php');  
            }else{
                require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'templates' . DS . 'header2.php'); 
            }
            ?>
        </header>
    
        <main> 
            <!-- <div id="result"></div>  -->
            <?php echo $content_for_layout;?> 
        </main>

        
        <footer class="opacity">
            <div id="footer_col_01" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <form id="contact_forma" class="contact_form" name="contact_form" method="POST">
                    <h5 id="cont_chef">CONTACTA CON EL CHEF</h5>
                        <ul>
                            <li>
                                <input type="email" name="name_email" id="email_cont" class="email_contact" placeholder="E-mail"/>
                                <!-- <div id="caja_nom_apell"></div> -->
                            </li>                          
                            <li>
                                <textarea name="Mensaje" id="mensaje" placeholder="Escribe aquí tu Mensaje" onkeyup="validar_mensaje_vacio()"></textarea>
                                <!-- <div id="caja_mensaje"></div> -->
                            </li>
                            <li>
                                <input type="button" id="btn_env" class="envia" value="ENVIAR" onclick="validar_boton_contac()"/>
                            </li>
                            <div id="errorsCont">
                                <?php 
                                    //if(isset($mensaje)) { echo $mensaje; }
                                ?>
                            </div>
                        </ul>
                    </div>
                </form> 

            <div id="footer_col_02" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a href="https://web.whatsapp.com/"  class="icon_size" target="_blanck">
                    <img src="<?php echo BASE_DIR_URL_IMG?>icon-what.png" alt="icono_what" height="62">
                </a>
                <a href="https://es-es.facebook.com/" id="face_pie" class="icon" target="_blanck">
                    <img src="<?php echo BASE_DIR_URL_IMG?>icon-face.png" alt="icono_face" height="62">
                </a>
                <a href="https://www.instagram.com"  class="icon_size" target="_blanck">
                    <img src="<?php echo BASE_DIR_URL_IMG?>icon-insta.png" alt="icono_inst" height="62">
                </a>
                <a href="https://www.linkedin.com"  class="icon_size" target="_blanck">
                    <img src="<?php echo BASE_DIR_URL_IMG?>icon-in.png" alt="icono_in" height="62">
                </a>        
            </div>  
                        
            <div id="footer_col_03" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p id="hecho_p"><?php echo date("Y");?> © MVC hecho por Dayana Avila. Gracias a la fundación CIM</p> 
            </div>
           
        </footer>
    </body>
</html>