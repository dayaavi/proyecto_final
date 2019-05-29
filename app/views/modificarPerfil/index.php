<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>

<body>
    <form method="post" id="modificar" enctype="multipart/form-data">
        <h3>MODIFICAR DATOS DE USUARIO</h3>

        <div class="img-box">
            <img src="<?php echo $userData['image'];?>" id="user-img" alt="user" height="42">
            <input type="file" id="user-img-file" name="user-img-file">
            <label for="user-img-file" class="center">
                Click aquí para subir imagen (2MB máx).
            </label>
        </div>

        <!-- <input type="text" name="usuarioM" id="usuarioM" placeholder="usuario" value="<?php echo $userData['user']; ?>">
        <input type="text" name="contraM" id="contraM" placeholder="contraseña" value="<?php echo $userData['password']; ?>"> -->

        <input class="input_texMod" type="text" name="emailM" id="emailM" placeholder="email">
        <input class="input_texMod" type="text" name="contraM" id="contraM" placeholder="contraseña">
        <div class="clearfix">
            <input type="button" class="btn type_btn" value="Modificar" id="modif_btn">
            <input type="reset" class="btn" value="Borrar" id="borrar">
            <div class="clearfix"></div>
        </div>

        <div id="errorsM"></div>

    </form>
</body>

