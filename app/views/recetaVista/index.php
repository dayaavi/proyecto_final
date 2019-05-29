<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>
<h3 style="color: darkslategray;" class="titulo">RECETAS</h3>
<?php

    echo '<div class="flex">';
    $index = 0;
    foreach ($resultados as $receta) {
        // echo '<a href="
        //<?php 
        // echo BASE_DIR_URL
        // 
        // recetaVista/vistaDetalle">';

        // echo '<a>';
        echo '<div class="card">';     
            echo '<div class="image_card"><div><img src="'. $receta["img_path"] .'" style="width:100%;height:16%;"></div></div>';
            echo '<div class="head">' . '<h3 style="background-color:white; border-radius:3px;">' . 'N°' . $receta["id_recipe"] .' - ' .  'Nombre: ' .$receta["name_receta"] . '</h3></div><br>';
            echo '<div class="input_rect">' . '<b>Categoría: </b>' . $receta["category"] . '</div>';
            echo '<div class="input_rect">' . '<b>Creado por: </b>' . $receta["creador"] . '</div><br>';
            echo '<div class="input_rect texto">' . '<b>Descripción: </b>' . $receta["descripcion"]  = utf8_encode(recetaVistaModel::getSubString($receta["descripcion"])) . '</div><br>';
            echo '<div class="submit_cont">' . '<input type="button" class="bot_card" id="btn_Compartir" value="Compartir">' . '<input type="button" class="bot_card" id="btn_Edita" value="Editar">' . '<input type="button" class="bot_card"id="btn_borrar" value="eliminar" onclick = "funcion_borrar(this)">' . '</div>';
            echo '<div id="result_borrar"></div>';
            echo '</div>';
        // echo '</a>';      
        $index++;  
    }
    echo '</div>';
?>

<script>
    function funcion_borrar(e){
        $(e).closest(".card").remove();

        // $.ajax({
        //     url: "demo_test.txt", 

        //     beforeSend: function(){
        //         $("#result_borrar").html("Borrando datos...");
        //     },  

        //     success: function(result){
        //         $(e).closest(".card").remove();

        //         $("#result_borrar").html(result);
        //     },

        //     error: function(){
        //         $("#result_borrar").html("Error al borrar datos");
        //     },
            
        // });
    }
</script>