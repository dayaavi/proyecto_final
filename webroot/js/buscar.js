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
					divContent+='<div><h3  style="color: darkslategray">Resultados de tú Busqueda </h3></div>';
					divContent+='<div class="flex">';
					
					for(var i = 0; i<data.length; i++)
					{
						divContent+='<div class="card">';
							divContent+='<div class="image_card"><div><img src="'+data[i]["img_path"]+'"style="width:100%;height:16%;"></div></div>';
							divContent+='<div class="head"><h3 style="background-color:white; border-radius:3px;">'+"N°"+data[i]["id_recipe"]+ " - " + " Nombre: " +data[i]["name_receta"]+'</h3></div><br>';
							divContent+='<div class="input_rect">'+"<b>Categoría: </b>"+data[i]["category"]+'</div>';
							divContent+='<div class="input_rect">'+"<b>Creado por: </b>"+data[i]["creador"]+'</div><br>';
							divContent+='<div class="input_rect texto">'+"<b>Descripción: </b>"+data[i]["descripcion"]+'</div>';
						divContent+='</div>';
					}
					divContent+='<div>';

					if(data.length>0){
							$("main").html(divContent)="";
							// $(".fila_col2").css("display","none");
					}else{
						$("main").html("<div><h3 class='resultBusq' style='color: darkslategray'><b>Busqueda sin Resultados</b><h3><br></div>");				
					}			
				},

				error: function(e){

				}
			});
    	}
	});
});
  
     
 //            echo '<div class="input_rect">' . '<b>Creado por: </b>' . $receta["creador"] . '</div><br>';
 //            echo '<div class="input_rect texto">' . '<b>Descripción: </b>' . $receta["descripcion"]  = utf8_encode(recetaVistaModel::getSubString($receta["descripcion"])) . '</div><br>';
 //            echo '<div class="submit_cont">' . '<input type="button" class="bot_card" id="btn_Compartir" value="Compartir">' . '<input type="button" class="bot_card" id="btn_Edita" value="Editar">' . '<input type="button" class="bot_card"id="btn_borrar" value="eliminar">' . '</div>';
 //            echo '</div>';
 //        echo '</a>';
