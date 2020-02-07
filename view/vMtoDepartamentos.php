
<div class="wrap wrap1">
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>                  
          
            <div class="botones2"> 
                <br><br>
                <input type="submit" name="altaDep" class="btn btn-secondary" value="AltaDepartamento"> 
            </div>
          
        </fieldset>
    </form>
</div>
<div class="wrap wrap2">
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>                  

            <br><br>
              BUSQUEDA POR DESCRIPCION: 
              <input type="text" name="DescDepartamentos" autocomplete="off"  placeholder="coincidencia con descripcion" id="buscar" value="<?php
            if (isset($_POST['DescDepartamentos'])) {
                echo $_POST['DescDepartamentos'];
            }
            ?>"> 
                        <br><br>
            <input type="submit" name="enviarDepartamentos" class="btn btn-secondary" value="Buscar" id="enviar">
            <br><br>
        </fieldset>
    </form>
</div>
<br>
<div class="wrap">
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset> 
            <table border="1" class="tablaDepartamentos">
                <thead>
                    <tr>
                        <th>
                            Codigo
                        </th>
                        <th>
                            Descripcion
                        </th>
                        <th>
                            VolumenNegocio
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($campoTabla = $obDepartamento->fetchObject()) {

                        echo '<tr>';
                        echo "<td>" . '<b>' . $campoTabla->T02_CodDepartamento . "</td>" . "<td>" . '</b>' . '<b>' . $campoTabla->T02_DescDepartamento .
                        "</td>" . "<td>" . '<b>' . $campoTabla->T02_VolumenNegocio . "</td>" . "<td>" . '<b>' . "<a href='" . $_SERVER['PHP_SELF'] . "?codigoModificar=$campoTabla->T02_CodDepartamento'><img src='WEBBROOT/img/modificar.png'/></a>" . "</td>"
                              .  "<td>" . '<b>' . "<a href='" . $_SERVER['PHP_SELF'] . "?codigoBorrar=$campoTabla->T02_CodDepartamento'><img src='WEBBROOT/img/borrar2.png'/></a>" . "</td>" ;
                        echo '</tr>';
                    }
                    
                    ?>
                </tbody>
            </table>
        </fieldset>
    </form>
</div>

