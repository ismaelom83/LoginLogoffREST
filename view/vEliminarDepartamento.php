
<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <div class="obligatorio">
                <label for="CodDep">Codigo</label> 
                <input type="text" name="CodDep" placeholder="" disabled class="form-control " value=" <?php echo $codDepartamento; ?> ">                                              
            </div>
            <br>
            <div class="obligatorio">
                <label for="DescDep">Descripcion</label>
                <input type="text" name="DescDep" placeholder="Introduce Descripcion" disabled class="form-control " value=" <?php echo $descripcion; ?> ">  
            </div>
            <br>
             <label class="label2" for="volumenNeg">VolumenNegocio</label>
            <input type="text" name="volumenNeg" id="rol" class="form-control" disabled  value="<?php  echo $volumenNegocio; ?>">
            <br>
            <div class="botones2">
                <input type="submit" name="eliminarDept" value="EliminarDepartamento" class="form-control  btn btn-secondary mb-1">    
                <input type="submit" name="cancelar" value="Cancelar" class="form-control  btn btn-secondary mb-1">                                       
                <br>
            </div>
        </fieldset>
    </form>
</div>

