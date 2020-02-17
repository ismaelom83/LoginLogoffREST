
<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <div class="obligatorio">
                <label for="CodUsuario">Codigo</label> 
                <input type="text" name="CodUsuario" placeholder="" disabled class="form-control " value=" <?php echo $codUsuario; ?> ">                                              
            </div>
            <br>
            <div class="obligatorio">
                <label for="DescUsuario">Descripcion</label>
                <input type="text" name="DescUsuario" placeholder="Introduce Descripcion" disabled class="form-control " value=" <?php echo $descripcion; ?> ">  
            </div>
            <br>
             <label class="label2" for="numeroAccesos">numeroAccesos</label>
            <input type="text" name="numeroAccesos" id="rol" class="form-control" disabled  value="<?php  echo $numeroAccesos; ?>">
            <br>
            <div class="botones2">
                <input type="submit" name="eliminarUsuario" value="EliminarUsuario" class="form-control  btn btn-secondary mb-1">    
                <input type="submit" name="cancelar" value="Cancelar" class="form-control  btn btn-secondary mb-1">                                       
                <br>
            </div>
        </fieldset>
    </form>
</div>

