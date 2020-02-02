
<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <div class="obligatorio">
                CODIGO: 
                <input type="text" name="CodDepartamentos" placeholder="Introduce codigo(PK)" class="form-control " value="<?php
                if ($aErrores['CodDepartamentos'] == NULL && isset($_POST['CodDepartamentos'])) {
                    echo $_POST['CodDepartamentos'];
                }
                ?>" <!--//Si el valor es bueno, lo escribe en el campo-->
                       <?php if ($aErrores['CodDepartamentos'] != NULL) { ?>
                           <div class="error">
                               <?php echo $aErrores['CodDepartamentos']; //Mensaje de error que tiene el array aErrores       ?>
                    </div>   
                <?php } ?>                
            </div>
            <br>
            <div class="obligatorio">
                DESCRIPCION: 
                <input type="text" name="DescDepartamentos" placeholder="Introduce Descripcion" class="form-control " value="<?php
                if ($aErrores['DescDepartamentos'] == NULL && isset($_POST['DescDepartamentos'])) {
                    echo $_POST['DescDepartamentos'];
                }
                ?>" <!--//Si el valor es bueno, lo escribe en el campo-->
                       <?php if ($aErrores['DescDepartamentos'] != NULL) { ?>
                           <div class="error">
                               <?php echo $aErrores['DescDepartamentos']; //Mensaje de error que tiene el array aErrores       ?>
                    </div>   
                <?php } ?>   
                <br>
                <br>
                <label class="label2" for="VolumenNegocio">ValorNegocio</label>
                <input type="number" name="VolumenNegocio" id="VolumenNegocio" class="form-control" placeholder="Inserta un valor en Euros(€)" value="<?php
                if (isset($_POST['VolumenNegocio']) && is_null($aErrores['VolumenNegocio'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                    echo $_POST['VolumenNegocio']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                }
                ?>">
                       <?php if ($aErrores['VolumenNegocio'] != NULL) { ?>
                    <div class="error">
                        <?php echo "<p class='p1'>" . $aErrores['VolumenNegocio'] . "</p>"; //mensaje de error que tiene el array aErrores        ?>
                    </div>   
                <?php } ?> 
            </div>
            <br>
            <br>
            <div class="botones2">
                <input type="submit" name="altaDepartamento" value="AñadirDepartamento" class="form-control  btn btn-secondary mb-1">
                <input type="submit" name="volverDepartamento" value="Cancelar" class="form-control  btn btn-secondary mb-1">
            </div>
        </fieldset>
    </form>
</div>