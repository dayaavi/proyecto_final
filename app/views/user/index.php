<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>

<body>
	<form action="user/registro" method="post" id="registro" class="form_user">
		
		<h3 class="user_h3">REGISTRARSE</h3>
		<input type="text" name="usuarioR" id="usuarioR" class="psw user_registro" placeholder="usuario">
		<input type="email" name="emailR" id="emailR" class="psw user_registro" placeholder="E-mail">
		<input type="password" name="contraR" id="contraR" class="psw user_registro" placeholder="contraseña">
		<input type="password" name="contraRep" id="contraRep" class="psw user_registro" placeholder="Confirmar contraseña">
		
		<div class="clearfix">
		<input type="button" class="btn" value="Registrar" id="registar">
		<input type="reset" class="btn" value="Borrar" id="borrarR">
		<div class="clearfix"></div>
		</div>	

		<p>Ya estás registrado? <span>entra en la app</span></p>
		<div id="errorsR">
		<?php 
			if(isset($mensaje)) { echo $mensaje; }
		?>
		</div>

	</form>

	<form action="user/login" method="post" id="login" class="form_user">
		
		<h3 class="user_h3">INICIAR SESIÓN</h3>
		<input type="text" name="usuarioL" id="usuarioL" class="psw user_registro" placeholder="usuario">
		<input type="password" name="contraL" id="contraL" class="psw user_registro" placeholder="contraseña">
		
		<div class="clearfix">
		<input type="button" class="btn" value="Entrar" id="loginBtn">
		<input type="reset" class="btn" value="Borrar" id="borrarL">
		<div class="clearfix"></div>
		
		</div>
		<p>No estás registrado? <span>regístrate aquí</span></p>
		<div id="errorsL">
		<?php 
			if(isset($mensaje)) { echo $mensaje; }
		?>
		</div>
	</form>
</body>

