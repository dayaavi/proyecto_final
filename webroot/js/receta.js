// tabla de ingredientes del formulario crear recetas
$(document).ready(function() {
    $('#bt_add').click(function(){
        agregar();
    });
    $('#bt_del').click(function(){
        eliminar(id_fila_selected);
    });
});

// función para crear la tabla dinamica de ingredientes

var cont=2;
// var divContent = "";

function agregar() {
  event.preventDefault();
  divContent = "";
  divContent+='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id)"><td>'+cont+'</td>';
  divContent+='<td><input id="nombre_ing" name="nombre_ing'+cont+'" class="input_text" type="text" placeholder="Nombre ejemplo: agua..."></td>';
  divContent+='<td><input id="cant_usada" name="cant_usada'+cont+'" class="input_text" type="text" placeholder="Cantidad usada..."></td>';
  divContent+='<td><select id="und_med" name="und_med'+cont+'" class="input_text" placeholder="Unidad de medida..."><option value="litros">Litros</option><option value="gramos">gramos</option></select></td>';
  divContent+='<td><input id="cant_comp" name="cant_comp'+cont+'" class="input_text" type="text" placeholder="Cantidad comprada..."></td>';
  divContent+='<td><select id="und_med_comp" name="und_med_comp'+cont+'" class="input_text" id="medida_comp" placeholder="Unidad de medida..."><option value="litros">Litros</option><option value="gramos">gramos</option></select></td>';
  divContent+='<td><input id="precio" name="precio'+cont+'" class="input_text" type="number" placeholder="Precio..."></td></tr>';
  
  cont++;

  $('#tabla').append(divContent);
  reordenar();
}

function seleccionar(id_fila) {
  if($('#'+id_fila).hasClass('seleccionada')){
    $('#'+id_fila).removeClass('seleccionada');
  }
  else{
    $('#'+id_fila).addClass('seleccionada');
  }
  
  id_fila_selected=id_fila;
}

function eliminar(id_fila) {
  event.preventDefault();
  $('#'+id_fila).remove();
  reordenar();
}

function reordenar() {
  var num=0;
  $('#tabla tbody tr').each(function(){
    $(this).find('td').eq(0).text(num);
    num++;
  }); 
}


/*Validación del formulario de crear recetas*/

$(document).ready(function(){

/*insertar imagen plato*/
  function readURL(input) 
  {
    if (input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#user-img-file').change(function(){
    readURL(this);
  });

  $("#btn_guardar").click(function()
  { 
    var msg = "";
    var name = $("#fname").val();
    var categoria = $("#categoria").val(); 
    var creado = $("#creado").val(); 
    var text_form = $("#text_form").val(); 
    var ingredients = [];

    if(name === ""){
      msg += "El campo del nombre está vacío<br>";
      $('#fname').addClass('error-validation');
    }else{
      $('#fname').removeClass('error-validation');
    }
    if(creado === ""){
      msg += "El campo del creado por está vacío<br>";
      $('#creado').addClass('error-validation');
    }else{
      $('#creado').removeClass('error-validation');
    }
    if(text_form === ""){
      msg += "El campo de descripción está vacío";
      $('#text_form').addClass('error-validation');
    }else{
      $('#text_form').removeClass('error-validation');
    }

    $("#results").html(msg);

    $.each($('#tabla tr').slice(1), function() {
      var name = $(this).find("#nombre_ing").val();
      var cantUsed = $(this).find("#cant_usada").val();
      var undMed = $(this).find("#und_med").val();
      var cantComp = $(this).find("#cant_comp").val();
      var undComp = $(this).find("#und_med_comp").val();
      var price = $(this).find("#precio").val(); 
      ingredients.push(
        {
          name: name,
          cantUsed: cantUsed,
          undMed: undMed,
          cantComp: cantComp,
          undComp: undComp,
          price: price
        }
      );   
   });        

    var ingredientsJson = JSON.stringify(ingredients);
    var formData = new FormData();
    formData.append('fname', name);
    formData.append('categoria', categoria);
    formData.append('creado', creado);
    formData.append('text_form', text_form);
    formData.append('ingredients', ingredientsJson);

    // /* Envio de los valores del formulario crear recata a Controller por AJAX*/

    if(msg == ""){
     
      $.ajax({
        type: 'post',
        url: '/proyecto_final/receta/form', //ruta de la clase y función del formulario controller.
        data: formData, //recoge los valores del formulario.
        cache: false,
        contentType: false,
        processData: false,

        beforeSend: function(){
          $("#results").html("Enviando datos...");
        },

        success: function(data){
          if(data){
            $("#results").html("Receta guardada correctamente!");  
					}
        },

        error: function(){
          $("#results").html("Error en el envío de datos al server");
        }
      })
    }
  });
});

