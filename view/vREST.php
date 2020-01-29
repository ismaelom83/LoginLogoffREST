
<h3>Solicitar servicio REST a google geolocation para saber las cordenadas de una localidad</h3>
<div class="wrap">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset>
            <label for="">Poblacion</label><br>
            <input type="text" name="direccion" placeholder="Introduce Poblacion">
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
    if (isset($_GET["solicitarRest"])) {
        echo "La Latitud de ".$direccion." es: ".$latitud;
    }
    ?></p>
<p><?php
    if (isset($_GET["solicitarRest"])) {
        echo "La Longitud de ".$direccion." es: ".$longitud;
    }
    ?></p>
</div>
