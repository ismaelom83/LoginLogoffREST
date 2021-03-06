<?php
/**
     * Short Description
     *
     * Long Description
     *
     * @package      proyectoLoginLogoffREST
     * @author       Ismael Heras
     */
if (isset($_REQUEST["cerrarSesion"])) {//cerramos sesion y destruimos todas las variables de sesion
    unset($_SESSION['DAW209POOusuario']); 
    unset($_SESSION['pagina']); 
    unset($_SESSION['volumenFinal']);
    unset($_SESSION['myAPI']);
    unset($_SESSION['poblacion']);
    unset($_SESSION['longitud']);
    unset($_SESSION['latitud']);
    unset($_SESSION['URLmapaEstatico']);
    unset($_SESSION['mapaEstatico']);
    header("location: index.html");
}
if (isset($_POST["volverInicio"])) {//volvemos  al inicio y destruimos todas las variables de sesion que utilizamos para manejar los tres formularios
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
    unset($_SESSION['volumenFinal']);
    unset($_SESSION['myAPI']);
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
//comprobamos que existen las sesiones para mandar a la vista
if (!isset($_SESSION['volumenFinal'])) {
    $_SESSION['volumenFinal'] = "";
}
if (!isset($_SESSION['myAPI'])) {
    $_SESSION['myAPI'] = "";
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
            //inicialixzamos las sesiones por si sale un error
            $_SESSION['longitud'] = "";
            $_SESSION['latitud'] = "";
            $_SESSION['poblacion'] = "";
        }
    }
    if ($entradaOK) {
        $_SESSION["poblacion"] = $_GET["direccion"]; //guardamo en una variable la direccion del formulario  

        $coordenadas = Rest::cordenadas($_SESSION["poblacion"]); //pedimos a la clase rest el metodo para traducir las cordenadas.
        //guardamos en variables la longitusd y la latitud para darselas a lña vista y quer las muestre.
        if (is_null($coordenadas)) {
             //inicializamos las sesiones  si sale un error
            $aErrores['direccion'] = "Esta direccion no existe.";
            $_SESSION['longitud'] = "";
            $_SESSION['latitud'] = "";
            $_SESSION['poblacion'] = "";
        } else {
            //asignamos valor a las sesiones para mostrar en la vista. 
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
            //inicialixzamos las sesiones por si sale un error
            $_SESSION["mapaEstatico"] = "";
            $_SESSION["URLmapaEstatico"] = "";
        }
    }
    if ($entradaOK) {
        $_SESSION["mapaEstatico"] = $_GET["direccionMapaEstatico"]; //guardamo en una variable la direccion del formulario para saber la direcion del mapa estatico.
        //requerimos la clase rest para que nos de el metodo mapaaestatico y conseguir la url con las cordenadas de la localidad y nos lo muestre la vista
        //el metodo nos pide la direcion que introducimos en el input.
        $urlMapaEstatico = Rest::mapaEstatico($_SESSION["mapaEstatico"]);
        if (is_null($urlMapaEstatico)) {
            //inicializamos las sesiones  si sale un error
            $aErrores['direccionMapaEstatico'] = "No existe esta direccion";
            $_SESSION["mapaEstatico"] = "";
            $_SESSION["URLmapaEstatico"] = "";
        } else {
            //asignamos valor a las sesiones para mostrar en la vista. 
            $_SESSION["URLmapaEstatico"] = $urlMapaEstatico;
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
            //inicialixzamos las sesiones por si sale un error
            $_SESSION['volumenFinal'] = "";
            $_SESSION['myAPI'] = "";
        }
    }
    if ($entradaOK) {
        $_SESSION['myAPI'] = $_GET['departamentoAPI'];
        $volumenPropio = REST::myApiREST($_SESSION['myAPI']);
        if (is_null($volumenPropio)) {
            //inicializamos las sesiones  si sale un error
            $aErrores['solicitarAPIPropia'] = "Este departamento no existe.";
            $_SESSION['myAPI'] = "";
            $_SESSION['volumenFinal'] = "";
        } else {
            //asignamos valor a las sesiones para mostrar en la vista. 
            $_SESSION['myAPI'] = $_GET['departamentoAPI'];
            $_SESSION['volumenFinal'] = $volumenPropio;
        }
    }
}
$vista = $vistas["rest"]; //mostramos las vistas del rest
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "rest";
require_once $vistas["layout"];
