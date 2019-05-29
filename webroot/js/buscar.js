$(document).ready(function(){

	$("#search_lime").on("keypress", function(e)
	{
		if(e.which == 13) 
		{
			//var dato = JSON.stringify($("#search_lime").val());
			var dato = $("#search_lime").val();


			$.ajax({
				type: "post",
				dataType: "json",
				url: "/proyecto_final/buscar/buscarReceta",

				data: "dato="+dato,

				success: function(data){

					var divContent = "";
					divContent+='<div class="flex">';
					divContent+='<h3>Resultados de tú Busqueda </h3>';
					for(var i = 0; i<data.length; i++)
					{
						divContent+='<div class="card">';
							divContent+='<div class="image_card"><div><img src="'+data[i]["img_path"]+'"style="width:100%;height:16%;"></div></div>';
							divContent+='<div class="head"><h3 style="background-color:white; border-radius:3px;">'+"N°"+data[i]["id_recipe"]+ " - " + " Nombre: " +data[i]["name_receta"]+'</h3></div><br>';
							

							divContent+='<p>'+"Departamento: "+data[i]["departamento"]+'</p>';
							divContent+='<p>'+"Incorporación: <br>"+data[i]["fecha_entrada"]+'</p>';
						divContent+='</div>';
					}
					divContent+='<div>';

					if(data.length>0){
							$("#result").html(divContent)="";
							// $(".fila_col2").css("display","none");
					}

				
				},

				error: function(e){

				}
			});
    	}
	});
});


 // echo '<a href="<?php echo BASE_DIR_URL?>recetaVista/vistaDetalle">';
 //        echo '<div class="card">';     
 //            echo '<div class="image_card"><div><img src="'. $receta["img_path"] .'" style="width:100%;height:16%;"></div></div>';
 //            echo '<div class="head">' . '<h3 style="background-color:white; border-radius:3px;">' . 'N°' . $receta["id_recipe"] .' - ' .  'Nombre: ' .$receta["name_receta"] . '</h3></div><br>';
 //            echo '<div class="input_rect">' . '<b>Categoría: </b>' . $receta["category"] . '</div>';
    
 //            echo '<div class="input_rect">' . '<b>Creado por: </b>' . $receta["creador"] . '</div><br>';
 //            echo '<div class="input_rect texto">' . '<b>Descripción: </b>' . $receta["descripcion"]  = utf8_encode(recetaVistaModel::getSubString($receta["descripcion"])) . '</div><br>';
 //            echo '<div class="submit_cont">' . '<input type="button" class="bot_card" id="btn_Compartir" value="Compartir">' . '<input type="button" class="bot_card" id="btn_Edita" value="Editar">' . '<input type="button" class="bot_card"id="btn_borrar" value="eliminar">' . '</div>';
 //            echo '</div>';
 //        echo '</a>';
