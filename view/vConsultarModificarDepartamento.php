
<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>                
            CODIGO: 
            <input type="text" name="CodDepartamentos" placeholder="" class="form-control " disabled value="<?php echo $codDEpartamento ?>"                                                  
                   <br>
            <label class="label2" for="DescDepartamentos">Descripcion</label>
            <input type="text" name="DescDepartamentos" id="DescDepartamentos" class="form-control"  value="<?php echo $descripcion ?>">
            <?php if ($aErrores['DescDepartamentos'] != NULL) { ?>
                <div class="error">
                    <?php echo "<p class='p1'>" . $aErrores['DescDepartamentos'] . "</p>"; //mensaje de error que tiene el array aErrores ?>
                </div>   
            <?php } ?> 
            <br>
            <label class="label2" for="VolumenNegocio">ValorNegocio</label>
            <input type="number" name="VolumenNegocio" id="VolumenNegocio" class="form-control"  value="<?php echo $volumenNegocio ?>">
            <?php if ($aErrores['VolumenNegocio'] != NULL) { ?>
                <div class="error">
                    <?php echo "<p class='p1'>" . $aErrores['VolumenNegocio'] . "</p>"; //mensaje de error que tiene el array aErrores ?>
                </div>   
            <?php } ?> 

            <br>
            <div class="botones2">
                <input type="submit" name="modificar"  value="ModificarDepartamento" class="form-control  btn btn-secondary mb-1">
                <input type="submit" name="volverModDep"  value="Cancelar" class="form-control  btn btn-secondary mb-1"> 
            </div>
        </fieldset>
    </form>
</div>

