
<h3>Solicitar servicio REST a google geolocation para saber las cordenadas de una ciudad del mundo y si pones un pais te pone la de la capital</h3>
<a href="https://developers.google.com/maps/documentation/directions/start?hl=es" target="_blank">Ir a la API de Google geolocation</a>
<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset>
            <label for="">Poblacion</label><br>
            <input type="text" name="direccion" placeholder="Introduce Poblacion" value="<?php
            if ($aErrores['direccion'] == NULL && isset($_POST['direccion'])) {
                echo $_POST['direccion'];
            }
            ?>">
                   <?php if ($aErrores['direccion'] != NULL) { ?>
                <div class="error">
                    <?php echo $aErrores['direccion']; //Mensaje de error que tiene el array aErrores?>
                </div>   
            <?php } ?>  
            <br><br>
            <div class="botones2">
                <input type="submit" name="solicitarRest" value="Solicitar servicio REST"  class="form-control  btn btn-secondary mb-1">  
                <br><br>
                <input type="submit" name="cancelaRest" value="Cancelar" class="form-control  btn btn-secondary mb-1">  
            </div>
        </fieldset>
    </form>
</div>
<div class="cordenadas">
    <h2>Cordenadas</h2>
    <p><?php
        if (isset($_GET["solicitarRest"]) && !$entradaOK == null) {
            echo "La Latitud de " . $direccion . " es: " . trim($latitud);
        }
        ?></p>
    <p><?php
        if (isset($_GET["solicitarRest"]) && !$entradaOK == null) {
            echo "La Longitud de " . $direccion . " es: " . trim($longitud);
        }
        ?></p>
</div>
