<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <div class="obligatorio">
                <label for="CodUsuario">Codigo</label> 
                <input type="text" name="CodUsuario" placeholder="" disabled class="form-control " value=" <?php echo $usuario; ?> ">                                              
            </div>
            <br>
            <div class="obligatorio">
                <label for="DescUsuario">Descripcion</label>
                <input type="text" name="DescUsuario" placeholder="Introduce Descripcion" class="form-control " value="<?php echo $descripcion ?>">  
            </div>
            <br>
            <label class="label2" for="rol">Perfil</label>
            <input type="text" name="rol" id="rol" class="form-control" disabled  value="<?php echo $perfil; ?>">
            <br>
            <label class="label2" for="password">NumConexiones</label>
            <input type="text" name="conexiones" id="conexiones" class="form-control" disabled  value="<?php echo $visitas; ?>">
            <br>
            <div class="botones2">
                <input type="submit" name="editarUsuario" value="EditarUsuario" class="form-control  btn btn-secondary mb-1">    
                <input type="submit" name="cancelar" value="Cancelar" class="form-control  btn btn-secondary mb-1">                                       
                <br><br>
            </div>
        </fieldset>
    </form>
</div>