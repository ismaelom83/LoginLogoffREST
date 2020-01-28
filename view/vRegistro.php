
<div class="wrap">
    <h1>Registro</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <div class="obligatorio">
                <label for="CodUsuario"></label> 
                <input type="text" name="CodUsuario" placeholder="Introduce codigo de usuario(PK)" class="form-control " value="<?php
                if ($aErrores['CodUsuario'] == NULL && isset($_POST['CodUsuario'])) {
                    echo $_POST['CodUsuario'];
                }
                ?>" <!--//Si el valor es bueno, lo escribe en el campo-->
                       <?php if ($aErrores['CodUsuario'] != NULL) { ?>
                           <div class="error">
                               <?php echo $aErrores['CodUsuario']; //Mensaje de error que tiene el array aErrores        ?>
                    </div>   
                <?php } ?>                
            </div>
          
            <div class="obligatorio">
                <label for="DescUsuario"></label>
                <input type="text" name="DescUsuario" placeholder="Introduce Descripcion" class="form-control " value="<?php
                if ($aErrores['DescUsuario'] == NULL && isset($_POST['DescUsuario'])) {
                    echo $_POST['DescUsuario'];
                }
                ?>" <!--//Si el valor es bueno, lo escribe en el campo-->
                       <?php if ($aErrores['DescUsuario'] != NULL) { ?>
                           <div class="error">
                               <?php echo $aErrores['DescUsuario']; //Mensaje de error que tiene el array aErrores        ?>
                    </div>   
                <?php } ?>   
            </div>
        
            <label class="label2" for="password1"></label>
            <input type="text" name="password1" id="password" class="form-control" placeholder="Inserta Password" value="<?php
            if (isset($_POST['password1']) && is_null($aErrores['password1'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                echo $_POST['password1']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
            }
            ?>">
                   <?php if ($aErrores['password1'] != NULL) { ?>
                <div class="error">
                    <?php echo "<p class='p1'>" . $aErrores['password1'] . "</p>"; //mensaje de error que tiene el array aErrores         ?>
                </div>   
            <?php } ?> 
           
            <label class="label2" for="password2"></label>
            <input type="text" name="password2" id="password" class="form-control" placeholder="Vuelva a introducir Password" value="<?php
            if (isset($_POST['password2']) && is_null($aErrores['password2'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                echo $_POST['password2']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
            }
            ?>">
                   <?php if ($aErrores['password2'] != NULL) { ?>
                <div class="error">
                    <?php echo "<p class='p1'>" . $aErrores['password2'] . "</p>"; //mensaje de error que tiene el array aErrores         ?>
                </div>   
            <?php } ?> 
            <br>
            <div class="botones2">
                <input type="submit" name="altaUsuarios" value="AñadirRegistro" class="form-control  btn btn-secondary mb-1">
                <br><br>
                <input type="submit" name="VolverLogin" value="VolverLogin" class="form-control  btn btn-secondary mb-1">
            </div>
        </fieldset>
    </form>
</div>                     
<br/>
<br/> 