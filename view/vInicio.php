<div class="inicio1">
    <p> <?php echo $saludoInicial ?></p>
    <p><?php echo "Tu perfil es ".$perfil ?></p>
    <p><?php echo $accesosT ?></p>
    <p><?php echo $ultimaConexion ?></p>
    <br>
 <?php if ($perfil == "usuario") { ?>
       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
           <input type="submit" class="btn btn-secondary" value="EditarPerfil" name="editarPerfil">
            <input type="submit" class="btn btn-secondary" value="BorrarCuenta" name="borrarCuenta">
        </form>
    <?php } ?> 
     <?php if ($perfil == "administrador") { ?>
       <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
           <input type="submit" class="btn btn-secondary" value="MantenimientoUsuarios" name="editarMiUsuario">
        </form>
    <?php } ?> 
</div>

