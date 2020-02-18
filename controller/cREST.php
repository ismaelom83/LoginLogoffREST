<?php

if (isset($_REQUEST["cerrarSesion"])) {//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
    unset($_SESSION['DAW209POOusuario']); //destruye la sesion del usuario
    unset($_SESSION['pagina']); //nos dirige al login
    unset($_SESSION['volumenFinal']);
    unset($_SESSION['MYAPIPROPIA']);
    unset($_SESSION['poblacion']);
    unset($_SESSION['longitud']);
    unset($_SESSION['latitud']);
    unset($_SESSION['URLmapaEstatico']);
    unset($_SESSION['mapaEstatico']);
    header("location: index.html");
}
if (isset($_POST["volverInicio"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
    unset($_SESSION['volumenFinal']);
    unset($_SESSION['MYAPIPROPIA']);
    unset($_SESSION['poblacion']);
    unset($_SESSION['longitud']);
    unset($_SESSION['latitud']);
     unset($_SESSION['URLmapaEstatico']);
    unset($_SESSION['mapaEstatico']);
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
require_once 'model/REST.php';
require_once 'model/DepartamentoPDO.php';
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
$aErrores = [//Inicializamos un array que se encargara de recoger los errores(Campos vacios)
    'direccion' => null,
    'direccionMapaEstatico' => null,
    'solicitarAPIPropia' => null
];

if (!isset($_SESSION['volumenFinal'])) {
    $_SESSION['volumenFinal'] = "";
}
if (!isset($_SESSION['MYAPIPROPIA'])) {
    $_SESSION['MYAPIPROPIA'] = "";
}
if (!isset($_SESSION['poblacion'])) {
    $_SESSION['poblacion'] = "";
}
if (!isset($_SESSION['longitud'])) {
    $_SESSION['longitud'] = "";
}
if (!isset($_SESSION['latitud'])) {
    $_SESSION['latitud'] = "";
}
if (!isset($_SESSION['mapaEstatico'])) {
    $_SESSION['mapaEstatico'] = "";
}
if (!isset($_SESSION['URLmapaEstatico'])) {
    $_SESSION['URLmapaEstatico'] = "";
}
if (isset($_GET["solicitarRest"])) {//API rRest de google geolocation
    $aErrores['direccion'] = validacionFormularios::comprobarAlfabetico($_GET['direccion'], 64, 2, 1); //maximo, mínimo y opcionalidad
    //Autenticación con la base de datos
    foreach ($aErrores as $key => $value) {
        if ($value != NULL) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        $_SESSION["poblacion"] = $_GET["direccion"]; //guardamo en una variable la direccion del formulario  

        $coordenadas = Rest::cordenadas($_SESSION["poblacion"]); //pedimos a la clase rest el metodo para traducir las cordenadas.
        //guardamos en variables la longitusd y la latitud para darselas a lña vista y quer las muestre.
        if (is_null($coordenadas)) {
            $aErrores['direccion'] = "Esta direccion no existe.";
            $_SESSION['longitud'] = "";
            $_SESSION['latitud'] = "";
            $_SESSION['poblacion'] = "";
        } else {
            $_SESSION["poblacion"] = $_GET["direccion"];
            $_SESSION["longitud"] = $coordenadas->getLongitud();
            $_SESSION["latitud"] = $coordenadas->getLatitud();
        }
    }
}
if (isset($_GET["solicitarRestMapa"])) {//API rRest de google static maps
    $aErrores['direccionMapaEstatico'] = validacionFormularios::comprobarAlfabetico($_GET['direccionMapaEstatico'], 64, 2, 1); //maximo, mínimo y opcionalidad
    foreach ($aErrores as $key => $value) {//Autenticación con la base de datos
        if ($value != NULL) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        $_SESSION["mapaEstatico"] = $_GET["direccionMapaEstatico"]; //guardamo en una variable la direccion del formulario para saber la direcion del mapa estatico.
        //requerimos la clase rest para que nos de el metodo mapaaestatico y conseguir la url con las cordenadas de la localidad y nos lo muestre la vista
        //el metodo nos pide la direcion que introducimos en el input.
       $urlMapaEstatico  = Rest::mapaEstatico($_SESSION["mapaEstatico"]);
        if(is_null($urlMapaEstatico)){
            $aErrores['direccionMapaEstatico'] = "No existe esta direccion";
            $_SESSION["URLmapaEstatico"] = "";
        }else{
            $_SESSION["URLmapaEstatico"] =$urlMapaEstatico;
        }
    }
}
if (isset($_GET['solicitarResPropia'])) { //my prpopia api rest
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['solicitarAPIPropia'] = validacionFormularios::comprobarAlfabetico($_GET['departamentoAPI'], 3, 3, 1); //max, min y obligatoriedad
    $_SESSION['volumenFinal'] = "";
    foreach ($aErrores as $key => $value) {
        if ($value != NULL) {
            $entradaOK = false;
            $_SESSION['volumenFinal'] = "";
        }
    }
    if ($entradaOK) {
        $_SESSION['MYAPIPROPIA'] = $_GET['departamentoAPI'];
        $volumenPropio = REST::myApiREST($_SESSION['MYAPIPROPIA']);
        if (is_null($volumenPropio)) {
            $aErrores['solicitarAPIPropia'] = "Este departamento no existe.";
            $_SESSION['MYAPIPROPIA'] = "";
            $_SESSION['volumenFinal'] = "";
        } else {
            $_SESSION['MYAPIPROPIA'] = $_GET['departamentoAPI'];
            $_SESSION['volumenFinal'] = $volumenPropio;
        }
    }
}
$vista = $vistas["rest"]; //mostramos las vistas del rest
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "rest";
require_once $vistas["layout"];
