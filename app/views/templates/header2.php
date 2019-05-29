
            <div class="menu-sticky col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="logo_col_01" class="back_color col-lg-3 col-md-4 col-sm-3 col-xs-6">
                    <img id="logo" src="<?php echo BASE_DIR_URL_IMG?>logo_grisOscuro.png" alt="logo_blanco" height="60">
                </div>
                <div id="nav_col_02 navbar" class="back_color col-lg-6 col-md-4 col-sm-9 col-xs-6">
                    <nav> 
                        <ul id="ul_li_a">
                            <li class="li_a" id="serv_act"><a href="<?php echo BASE_DIR_URL?>user/cerrar">Salir</a></li>
                            <li class="li_a"><a href="#contact_forma">Contacto</a></li>
                            <li class="li_a"><a href="<?php echo BASE_DIR_URL?>recetaVista/index">Recetas</a></li>
                            <li class="li_a"><a href="<?php echo BASE_DIR_URL?>receta/index">Crear receta</a></li>
                            <li class="li_a active"><a href="<?php echo BASE_DIR_URL?>home/index">Inicio</a></li>
                        </ul>
                    </nav>
                </div>

                <div id="nav_col_03" class="back_color col-lg-3 col-md-4 col-sm-9 col-xs-6">
                    <div class="user_inf"> 
                    <li class="welcome"><a href="<?php echo BASE_DIR_URL?>modificarPerfil/index">Bienvenido <?php echo $_SESSION['usuario']?></a></li>
                    <!-- en user esta todo el array de la bd q sta en controller $userData['image']  y image es el campo que deseo mostrar de la BD-->
                    <li class="welcome"><img id="img_perf" src="<?php echo $userData['image'];?>" alt="user" height="62" style="border-radius: 10px"></li>
                    </div>
                </div>
            </div>


        