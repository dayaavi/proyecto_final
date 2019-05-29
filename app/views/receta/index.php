<?php defined('BASEPATH') or exit ('No se permite acceso directo');?>



<body>
    <div class="recetas col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <!-- action="receta/form" lo quite porq debo hacerlo con ajax-->
        <form method="post" id="formulario_receta" class="formulario_receta" id="insert_form" name="insert" enctype="multipart/form-data">
        <fieldset id="field_legend"> 
            <legend id="legend">CREA TU RECETA AQUÍ</legend>
                  
            <div class="form_fist">

                <div id="imagen" class="inf_first">
                    <div class="img-box">
                <img src="<?php echo BASE_DIR_URL_IMG?>salmon.png" id="user-img" alt="user" height="82" width="100">
                        <input type="file" id="user-img-file" name="user-img-file">
                        <label for="user-img-file" class="center">
                            Click aquí para subir imagen (2MB máx).
                        </label>
                    </div>
                </div>

                <div class="inf_first">
                <div>         
                    <label for="fname">Nombre de la receta:</label>
                    <input class="input_text" type="text" id="fname" name="fname" placeholder="Nombre de la receta...">
                </div>
                <div>
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria">
                    <optgroup label="Categoría">
                        <option value="postres">Postres</option>
                        <option value="carnes">Carnes</option>
                        <option value="ensalada">Ensaladas</option>
                    </optgroup>
                    </select>
                </div>
                <div>
                    <label for="creado">Creado por:</label>
                    <input class="input_text" type="text" id="creado" name="creado" placeholder="Escribe tú nombre aquí...">
                </div>
                </div>
            </div> 

            <div class="form_second">
                <h6 class="desc_tit">INGREDIENTES:</h6>
                 
                <button type="submit" id="bt_add" class="butto_ing btn btn_default"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>

                <button type="submit" id="bt_del" class="butto_ing btn btn_default"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                <table id="tabla" class="table table_bordered">
                    <tr>
                        <th class="left tabla_ing">Ítem</th>
                        <th class="tabla_ing">Nombre</th>
                        <th class="tabla_ing">Cantidad usada</th>
                        <th class="tabla_ing">Unidad de medida</th>
                        <th class="tabla_ing">Cantidad comprada</th>
                        <th class="tabla_ing">Unidad de medida comprada</th>
                        <th class="right tabla_ing">Precio</th>
                    </tr>
                    <!-- apartir de aquí la tabla será dinamica -->
                    <tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id)">
                        <td>
                            <p>1</p>
                        </td>
                        <td>
                            <input class="input_text" type="text" name="nombre_ing" placeholder="Nombre ejemplo: agua...">
                        </td>
                        <td>
                            <input class="input_text" type="text" name="cant_usada" placeholder="Cantidad usada...">
                        </td>
                        <td>
                            <select class="input_text" id="medida" name="und_med" placeholder="Unidad de medida...">
                                <option value="litros">Litros</option>
                                <option value="gramos">gramos</option>
                                <option value="tazas">tazas</option>
                                <option value="cdta">cdta</option>
                                <option value="docena">docena</option>
                                <option value="und">und</option>
                            </select> 
                        </td>
                        <td>
                            <input class="input_text" type="text" name="cant_comp" placeholder="Cantidad comprada...">
                        </td>
                        <td>
                             <select class="input_text" id="medida" name="und_med" placeholder="Unidad de medida...">
                                <option value="litros">Litros</option>
                                <option value="gramos">gramos</option>
                                <option value="tazas">tazas</option>
                                <option value="cdta">cdta</option>
                                <option value="docena">docena</option>
                                <option value="und">und</option>
                            </select>                             
                        </td>
                        <td>
                            <input class="input_text" type="number" name="precio" placeholder="Precio...">
                        </td>
                    </tr>
                     <!-- aquí termina  -->
                </table>      
            </div>
            
            <div class="form_third">
            <fieldset> 
            <legend>DESCRIPCIÓN:</legend>
                <!-- <h6 class="desc_tit">DESCRIPCIÓN:</h6> -->
                <textarea name="text_form" id="text_form"cols="40" rows="5">
                    Agregar agua...
                </textarea>
            </fieldset>
            </div>
 
            <div class="submit_cont">
                <input type="button" id="btn_guardar" value="Guardar">
                <!-- <input type="button" id="btn_envia" value="Enviar">
                <input type="button" id="btn_com" value="Compartir">
                <input type="button" id="btn_imp" value="Imprimir"> -->
            </div>
                <div id="results"></div>
            </fieldset>
        </form>
    </div>
</body>
