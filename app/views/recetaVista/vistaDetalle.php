<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>
<h3 class="titulo">RECETAS EN DETALLE</h3>
<?php
    echo '<div>';
    foreach ($resultados as $receta) {
        
            echo '<div class="card">';     
            echo '<div class="image_card"><div><img src="'. $receta["img_path"] .'" style="width:100%;height:16%;"></div></div>';
            echo '<div class="head">' . '<h3 style="background-color:white; border-radius:3px;">' . 'N°' . $receta["id_recipe"] .' - ' .  'Nombre: ' .$receta["name_receta"] . '</h3></div><br>';
            echo '<div class="input_rect">' . '<b>Categoría: </b>' . $receta["category"] . '</div>';
    
            echo '<div class="input_rect">' . '<b>Creado por: </b>' . $receta["creador"] . '</div><br>';
            echo '<div class="input_rect texto">' . '<b>Descripción: </b>' . $receta["descripcion"]  = utf8_encode(recetaVistaModel::getSubString($receta["descripcion"])) . '</div><br>';
        echo '</div>';
        
    }
    echo '</div>';
?>
