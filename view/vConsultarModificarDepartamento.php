  <div class="wrap">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <fieldset>
                    <div class="obligatorio">
                        CODIGO: 
                        <input type="text" name="CodDepartamentos" placeholder="" class="form-control " disabled value="<?php echo $codDEpartamento ?>"                                 
                    <br>
                    <div class="obligatorio">
                        DESCRIPCION: 
                        <input type="text" name="DescDepartamentos"  class="form-control " value="<?php echo $descripcion ?>" 
                        <?php if ($aErrores['DescDepartamentos'] != NULL) { ?>
                                   <div class="error">
                                       <?php echo $aErrores['DescDepartamentos']; //Mensaje de error que tiene el array aErrores?>
                            </div>   
                        <?php } ?>   
                        <br>
                        <br>
                        <label class="label2" for="VolumenNegocio">ValorNegocio</label>
                        <input type="text" name="VolumenNegocio" id="VolumenNegocio" class="form-control"  value="<?php echo $volumenNegocio ?>">
                        <?php if ($aErrores['VolumenNegocio'] != NULL) { ?>
                            <div class="error">
                                <?php echo "<p class='p1'>" . $aErrores['VolumenNegocio'] . "</p>"; //mensaje de error que tiene el array aErrores ?>
                            </div>   
                        <?php } ?> 
                   
                    <br>
                    <br>
                    <div class="botones2">
                        <input type="submit" name="modificar"  value="ModificarDepartamento" class="form-control  btn btn-secondary mb-1">
                        <input type="submit" name="volverModDep"  value="cancelar" class="form-control  btn btn-secondary mb-1">
                    </div>
                </fieldset>
            </form>
        </div>

