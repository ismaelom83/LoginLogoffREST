
<div class="wrap">
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>                  
            BUSCAR DEPARTAMENTOS: 
            <input type="text" name="DescDepartamentos" placeholder="Introduce coincidencia con descripcion" id="buscar" value="<?php
            if (isset($_POST['DescDepartamentos'])) {
                echo $_POST['DescDepartamentos'];
            }
            ?>"> 
            <br><br>
            <div class="botones2">
                <input type="submit" name="enviarDepartamentos" value="Buscar" id="enviar"> 
                <br><br>
                <input type="submit" name="volverDe" value="volverInicio" > 
            </div>
        </fieldset>
    </form>
</div>
<br>
<div class="wrap">
    <table border="1">
        <thead>
            <tr>
                <th>
                    Codigo
                </th>
                <th>
                    Descripcion
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($campoTabla = $obDepartamento->fetchObject()) {
                echo '<tr>';
                echo "<td>" . '<b>' . $campoTabla->T02_CodDepartamento . "</td>" . "<td>" . '</b>' . '<b>' . $campoTabla->T02_DescDepartamento .
                "</td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

