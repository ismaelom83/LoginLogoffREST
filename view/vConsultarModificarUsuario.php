<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>                
            CODIGO: 
            <input type="text" name="CodDUsuario" placeholder="" class="form-control " disabled value="<?php echo $codUsuario ?>"                                                  
                   <br>
            <label class="label2" for="DescUsuarios">Descripcion</label>
            <input type="text" name="DescUsuarios" id="DescUsuarios" class="form-control"  value="<?php echo $descripcionUsuario ?>">
            <?php if ($aErrores['DescUsuarios'] != NULL) { ?>
                <div class="error">
                    <?php echo "<p class='p1'>" . $aErrores['DescUsuarios'] . "</p>"; //mensaje de error que tiene el array aErrores ?>
                </div>   
            <?php } ?> 
            <br>
            <label class="label2" for="numeroAccesos">NumeroAccesos</label>
            <input type="number" name="numeroAccesos" id="numeroAccesos" class="form-control" disabled  value="<?php echo $numeroAcccesos ?>">
            <br>
            <div class="botones2">
                <input type="submit" name="ModificarUsuario"  value="ModificarUsuario" class="form-control  btn btn-secondary mb-1">
                <input type="submit" name="volverUsuarios"  value="Cancelar" class="form-control  btn btn-secondary mb-1"> 
            </div>
        </fieldset>
    </form>
</div>
