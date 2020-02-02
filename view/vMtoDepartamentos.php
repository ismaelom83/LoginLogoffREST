
<div class="wrap">
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>                  
            BUSCAR DEPARTAMENTOS: 
            <input type="text" name="DescDepartamentos" placeholder="coincidencia con descripcion" id="buscar" value="<?php
            if (isset($_POST['DescDepartamentos'])) {
                echo $_POST['DescDepartamentos'];
            }
            ?>"> 
            <br><br>
            <div class="botones2">
                <input type="submit" name="enviarDepartamentos" value="Buscar" id="enviar">
                <br><br>
                <input type="submit" name="volverDe" value="volverInicio"> 
                <br><br>
                <input type="submit" name="altaDep" value="AltaDepartamento"> 
            </div>
        </fieldset>
    </form>
</div>
<br>
<div class="wrap">
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset> 
            <table border="1">
                <thead>
                    <tr>
                        <th>
                            Codigo
                        </th>
                        <th>
                            Descripcion
                        </th>
                        <th>
                            VolumenNegociod
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

