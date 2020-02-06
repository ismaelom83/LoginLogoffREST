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
require_once 'model/REST.php';
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
        $coordenadas = Rest::cordenadas($direccion);
        
     $longitud = $coordenadas->getLongitud();
    $latitud = $coordenadas->getLatitud();

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

