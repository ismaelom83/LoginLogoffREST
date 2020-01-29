<?php

//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_GET["cancelaRest"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
//si hemos pulsado el boton de solocuitar del formularioo entramos.
if (isset($_GET["solicitarRest"])) {

    //guardamo en una variable la direccion del formulario
    $direccion = $_GET["direccion"];

    //guardamos en unavariable la url para recibir el json expecifico para nuestra direccion.
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $direccion . "&key=AIzaSyCrSgHJZQygN2PiJN35GiTuc83XnVHSSlg";
    //trasmite el fichero json a una cadena.
    $json = file_get_contents($url);
    //convertimos el string decoficado de json en una variable.
    $datos = json_decode($json, true);

    //almacenamos en una variable los datos optenidos (con postmas previamentye hemos estudiado el arreglo y sabemos donde estan la longitud y la latitud) del arreglo del json
    $latitud = $datos["results"][0]["geometry"]["location"]["lat"];
    $longitud = $datos["results"][0]["geometry"]["location"]["lng"];
    //mostramos por pantalla la longitud y la latitud de la ciudad.
//    echo "<h5>".'La latitud es: ' . $latitud."</h5>";
//    echo '<br>';
//    echo "<h5>".'La longitud es: ' . $longitud."</h5>";

    $vista = $vistas["rest"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "rest";


    require_once $vistas["layout"];
} else {
$longitud;
$longitud;
    $vista = $vistas["rest"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "rest";


    require_once $vistas["layout"];
}
