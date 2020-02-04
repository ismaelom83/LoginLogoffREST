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
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
//Inicializamos un array que se encargara de recoger los errores(Campos vacios)
$aErrores = [
    'direccion' => null
];
//si hemos pulsado el boton de solocuitar del formularioo entramos.
if (isset($_GET["solicitarRest"])) {
    $aErrores['direccion'] = validacionFormularios::comprobarAlfabetico($_GET['direccion'], 64, 2, 1); //maximo, mínimo y opcionalidad
    //Autenticación con la base de datos
    foreach ($aErrores as $key => $value) {
        if ($value != NULL) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        //guardamo en una variable la direccion del formulario
        $direccion = $_GET["direccion"];
        //sustituimos los espacios por el simbolo de %20 para que el navegador lo reconozca.
        $nuevadireccion= str_replace(" ", '%20', $direccion);
        //modificamos para que la ñ la sustituya por la n para que lo reconazca LA API
//            $nuevadireccion= str_replace("ñ", '&ntilde', $direccion);
        //guardamos en unavariable la url para recibir el json expecifico para nuestra direccion.
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $nuevadireccion . "&key=AIzaSyCrSgHJZQygN2PiJN35GiTuc83XnVHSSlg";
        //trasmite el fichero json a una cadena.
        $json = file_get_contents(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $url));
        //convertimos el string decoficado de json en una variable.
        $datos = json_decode($json, true);
        //inicializamos las variables por que si no al recargar la vista si no ponemos nada en el input da error
        $latitud = "";
        $longitud = "";
        //almacenamos en una variable los datos optenidos (con postmas previamentye hemos estudiado el arreglo 
        //y sabemos donde estan la longitud y la latitud) del arreglo del json
        $latitud = $datos["results"][0]["geometry"]["location"]["lat"];
        $longitud = $datos["results"][0]["geometry"]["location"]["lng"];

        $vista = $vistas["rest"];
        //metemos en la sesion en la pagina que estamos.
        $_SESSION["pagina"] = "rest";
    }
}
//mostramos las vistas del rest
$vista = $vistas["rest"];
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "rest";
require_once $vistas["layout"];

