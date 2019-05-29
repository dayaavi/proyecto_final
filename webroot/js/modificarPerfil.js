$(document).ready(function(){

    function readURL(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#user-img-file').change(function(){
        readURL(this);
    });


	$("#modif_btn").click(function(){

		msg = "";
        var usuario = $('#emailM').val();
        var contra = $('#contraM').val();
        var imgFile = $('input[type=file]')[0].files[0];
        var formData = new FormData();

        if(imgFile == null){
            formData.append('emailM', usuario);
            formData.append('contraM', contra);
        }else{
            formData.append('user-img-file', imgFile);
            formData.append('emailM', usuario);
            formData.append('contraM', contra);
        }

		if($("#emailM").val() == ""){
			msg += "El campo usuario está vacío <br>";
			$("#emailM").addClass("error-validation");
		} else {
			$("#emailM").removeClass("error-validation");
		}
		if($("#contraM").val() == ""){
			msg += "El campo contraseña está vacío <br>";
			$("#contraM").addClass("error-validation");
		} else {
			$("#contraM").removeClass("error-validation");
		}

  		$("#errorsM").html(msg);

  		if(msg == ""){

  			$.ajax({

				type: 'post',
				url: '/proyecto_final/modificarPerfil/mod_perfil',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,

  				beforeSend: function(){
  					$("#errorsM").html("Enviando datos...");
  				},

  				success: function(data){
					if(data)
					{
					$("#errorsM").html("Actualizado!");  
					}
					else
					{
					$("#errorsM").html("Error");
					}	
  				},

  				error: function(){
  					$("#errorsM").html("Error en el envío de datos al server");
  				}

  			});
  		}
	});

});