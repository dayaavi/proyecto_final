jQuery(document).ready(function(){
    
    "use stric"

    $('.lime-image').ripples({
        dropRadius: 10,
        perturbance: 0.01,
    });

});

/*VISTA: LOGIN - REGISTRO*/
$(document).ready(function()
{
	$("#registro span").click(function(){
		$("#errorsR").html("");
		$("#errorsL").html("");
		$("input[type=text]").val("");
		$("input[type=password]").val("");
		$("#usuarioL").removeClass("error-validation");
		$("#contraL").removeClass("error-validation");
		$("#login").css("display","block");
		$("#registro").css("display","none");
		
	});	
	$("#login span").click(function(){
		$("#errorsR").html("");
		$("#errorsL").html("");
		$("input[type=text]").val("");
		$("input[type=password]").val("");
		$("#usuarioR").removeClass("error-validation");
		$("#contraR").removeClass("error-validation");
		$("#login").css("display","none");
		$("#registro").css("display","block");
	});

    /*VALIDACION REGISTRO*/
	$("#registar").click(function(){

		msg = "";
		var nombre = $("#usuarioR");
		var email = $("#emailR");
		var contraR = $("#contraR");
		var contraRep = $("#contraRep");

		if(nombre.val() == null || nombre.val().length == 0 || /^\s+$/.test(nombre.val()) || nombre.val().length < 3){
			msg += "Campo nombre vacío o invalido, mínimo tres letras<br>";
			$(nombre).addClass("error-validation");
		} else {
			$(nombre).removeClass("error-validation");
		}

		var emailRegex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		var ValidEmail = emailRegex.test(email.val());
		if(email.val() == "" || !ValidEmail){
			msg += "El campo e-mail está vacío o no es valido<br>";
			$(email).addClass("error-validation");
		} else {
			$(email).removeClass("error-validation");
		}
		
		if(contraR.val() == "" || contraR.val().length < 3){
			msg += "El campo contraseña está vacío, mínimo tres letras<br>";
			$(contraR).addClass("error-validation");
		} else {
			$(contraR).removeClass("error-validation");
		}

		if(contraRep.val() == "" || contraRep.val() !== contraR.val() || contraRep.val().length < 3){
			msg += "El campo repita contraseña está vacío ó contraseñas no coinciden, mínimo tres letras<br>";
			$(contraRep).addClass("error-validation");
		} else {
			$(contraRep).removeClass("error-validation");
		}

  		$("#errorsR").html(msg);

  		if (msg == ""){
  			
  			$("#registro").submit();
  		}
	});

	/*Validación Login */

	$("#loginBtn").click(function(){

		msg = "";
		var usuario = $("#usuarioL");
		var contraLogin = $("#contraL");
		
		if(usuario.val() == null || usuario.val().length == 0 || /^\s+$/.test(usuario.val()) || usuario.val().length < 3){
			msg += "Campo usuario vacío o invalido, mínimo tres letras<br>";
			$(usuario).addClass("error-validation");
		} else {
			$(usuario).removeClass("error-validation");
		}
		if($(contraLogin).val() == "" || contraLogin.val().length < 3){
			msg += "El campo contraseña está vacío, mínimo tres letras <br>";
			$(contraLogin).addClass("error-validation");
		} else {
			$(contraLogin).removeClass("error-validation");
		}

  		$("#errorsL").html(msg);

  		if (msg == ""){
  			$("#login").submit();
  		}
	});

	/*Validación contacto */

	$("#btn_env").click(function(){

		msg = "";
		var email_cont = $("#email_cont");
		var texto = $("#mensaje");

		var emailRegex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		var ValidEmail = emailRegex.test(email_cont.val());
		if(email_cont.val() == "" || !ValidEmail){
			msg += "El campo e-mail está vacío o no es valido<br>";
			$(email_cont).addClass("error-validation");
		} else {
			$(email_cont).removeClass("error-validation");
		}

		if($(texto).val() == ""){
			msg += "El campo mensaje está vacío<br>";
			$(texto).addClass("error-validation");
		} else {
			$(texto).removeClass("error-validation");
		}

		$("#errorsCont").html(msg);

		if (msg == ""){
			$("#btn_env").submit();
		}
	});
});
