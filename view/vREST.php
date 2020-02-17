
<div class="wrapRest">
    <a href="https://developers.google.com/maps/documentation/directions/start?hl=es" target="_blank">Ir a API de Google geolocation</a>
    <p>Consumiendo Servicio Rest que introduces<br> una localidad y te da las cordenadas</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset>
            <label for="">Poblacion</label><br>
            <input type="text" name="direccion" placeholder="Introduce Ciudad" value="<?php
            if (isset($_GET["solicitarRest"]) && !$entradaOK == null) {
                echo $poblacion ;
            }
            ?>">

            <?php if ($aErrores['direccion'] != NULL) { ?>
                <div class="error">
                    <?php echo $aErrores['direccion']; //Mensaje de error que tiene el array aErrores?>
                </div>   
            <?php } ?>  
            <br><br>
            <div class="botonesRest">
                <input type="submit" name="solicitarRest" value="Solicitar servicio REST"  class="form-control  btn btn-secondary mb-1">  
                <br><br>

            </div>
        </fieldset>
    </form>
    <div class="cordenadas">
        <h2>Cordenadas</h2>

        <label for="latitud">Latitud</label>
        <input type="text"  id="latitud" placeholder="latitud" disabled  value="<?php
        if (isset($_GET["solicitarRest"]) && !$entradaOK == null) {
            echo trim($latitud);
        }
        ?>">
        <br>
        <label for="longitud">Longitud</label>
        <input type="text"  id="latitud" placeholder="longitud" disabled  value="<?php
        if (isset($_GET["solicitarRest"]) && !$entradaOK == null) {
            echo trim($longitud);
        }
        ?>">

    </div>
</div>
<div class="wrapRest2">
    <a href="https://developers.google.com/maps/documentation/maps-static/dev-guide?hl=es" target="_blank">Ir a API de Google MAP Static</a>
    <p>Consumiendo Servicio Rest que introduces una<br> localidad te muestra un mapoa estatico</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset>
            <label for="">Poblacion</label><br>
            <input type="text" name="direccionMapaEstatico" placeholder="Introduce Ciudad" value="<?php
            if (isset($_GET["solicitarRestMapa"]) && !$entradaOK == null) {
                echo $direccionMapaEstatico;
            }
            ?>">
                   <?php if ($aErrores['direccionMapaEstatico'] != NULL) { ?>
                <div class="error">
                    <?php echo $aErrores['direccionMapaEstatico']; //Mensaje de error que tiene el array aErrores?>
                </div>   
            <?php } ?>  
            <br><br>
            <div class="botonesRest">
                <input type="submit" name="solicitarRestMapa" value="Solicitar servicio REST"  class="form-control  btn btn-secondary mb-1">  
                <br><br>
<!--                <input type="submit" name="cancelaRest" value="Cancelar" class="form-control  btn btn-secondary mb-1">  -->
            </div>
        </fieldset>
    </form>
    <h2 class="mapaEstatico">Mapa estatico</h2>
    <div class="cordenadas">
        <img src="<?php
        if (isset($_GET["solicitarRestMapa"]) && !$entradaOK == null) {
            echo $urlMapaEtatico;
        }
        ?>">
    </div>
</div>

<div class="wrapRest83">
    <a href="DOC/apirestpropia.pdf" target="_blank">Como Funciona Mi API</a>
    <p>API propia para que pasa el volumen de negocio<br>por URL introduciendo un codigo</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset>
            <label for="">Departamento</label><br>
            <input type="text" name="departamentoAPI" placeholder="Introduce Departamento" value="<?php
            if (isset($_GET["solicitarResPropia"]) && !$entradaOK == null) {
                echo $_SESSION['MYAPIPROPIA'];
            }
            ?>">
                   <?php if ($aErrores['solicitarAPIPropia'] != NULL) { ?>
                <div class="error">
                    <?php echo $aErrores['solicitarAPIPropia']; //Mensaje de error que tiene el array aErrores?>
                </div>   
            <?php } ?>  
            <br><br>
            <div class="botonesRest">
                <input type="submit" name="solicitarResPropia" value="Solicitar servicio REST Propio"  class="form-control  btn btn-secondary mb-1">  
                <br><br>
<!--                <input type="submit" name="cancelaRest" value="Cancelar" class="form-control  btn btn-secondary mb-1">  -->
            </div>
        </fieldset>
    </form>
       <div class="cordenadas">
        <h2>VolumenNegocio</h2>
        <label for="myAPI">VolumenNegocio</label>
        <input type="text"  id="myAPI" placeholder="VolumenNegocio" disabled  value="<?php
        if (isset($_GET["solicitarResPropia"]) && !$entradaOK == null) {
            echo $_SESSION['volumenFinal'];
        }
        ?>">
    </div>
</div>

