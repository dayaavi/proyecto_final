<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>
<h3 style="color: darkslategray;" class="titulo">RECETAS</h3>
<?php

    echo '<div class="flex">';
    $count = 0;
    foreach ($resultados as $receta) {           
        
        echo '<div class="card">';     
            echo '<div class="image_card"><div><img src="'. $receta["img_path"] .'" style="width:90%;"></div></div>';
            echo '<div class="head">' . '<h3 style="background-color:white; border-radius:3px; width:90%; text-align: center;margin: auto;">' . 'N°' . $receta["id_recipe"] .' - ' .  'Nombre: ' .$receta["name_receta"] . '</h3></div>';
            echo '<div class="input_rect">' . '<b>Categoría: </b>' . $receta["category"] . '</div>';
            echo '<div class="input_rect">' . '<b>Creado por: </b>' . $receta["creador"] . '</div>';
            echo '<p class="input_rect"><b>Ingredientes: </b></p>'; 
            foreach ($receta["ingredientes"] as $ingrediente) { 
                echo '<div class="input_rect">' . ' - ' . $ingrediente["name_producto"] . " " . "<b>Cant: </b>" . $ingrediente["cant_usada"] .' ' .$ingrediente["und_med_comp"] . '</div>';
            }
            
            echo '<div class="input_rect texto">' . '<b>Descripción: </b>' . $receta["descripcion"] . '</div>';
            echo '<div class="input_rect submit_cont">' . '<input type="button" class="bot_card" id="btn_Compartir" value="Compartir">' . '<input type="button" class="bot_card" id="btn_vista" value="Vista" onclick = "funcion_vista(this)">' . '<input type="button" class="bot_card" id="btn_borrar" value="eliminar" onclick = "funcion_borrar(this)">' . '</div>';
                    
            
            // echo '<div id="result_borrar"></div>';
            echo '</div>';     
        $count++;  
    }
    echo '</div>';
    echo '<div id="result_borrar"></div>';
?>
<!-- Con el this en la funcion onclick en el boton eliminar me traigo todo el input, 
al llamar a la funcion indico que al elemento mas cercano de la clase card de la tarjeta lo remueva, es decir lo elimine. -->
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