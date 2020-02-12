<?php
/**
     * Short Description
     *
     * Long Description
     *
     * @package      proyectoLoginLogoffREST
     * @author       Ismael Heras
     */
//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_POST["volverInicio"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
require_once 'model/REST.php';
require_once 'model/DepartamentoPDO.php';
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
//Inicializamos un array que se encargara de recoger los errores(Campos vacios)
$aErrores = [
    'direccion' => null,
    'direccionMapaEstatico' => null,
    'solicitarAPIPropia' => null
];
//si hemos pulsado el boton de solocuitar del formularioo entramos.
if (isset($_GET["solicitarRest"]) ) {
    $aErrores['direccion'] = validacionFormularios::comprobarAlfabetico($_GET['direccion'], 64, 2, 1); //maximo, mínimo y opcionalidad

    //Autenticación con la base de datos
    foreach ($aErrores as $key => $value) {
        if ($value != NULL) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        //guardamo en una variable la direccion del formulario
        $poblacion = $_GET["direccion"];
        //pedimos a la clase rest el metodo para traducir las cordenadas.
        $coordenadas = Rest::cordenadas($poblacion );
        //guardamos en variables la longitusd y la latitud para darselas a lña vista y quer las muestre.
     $longitud = $coordenadas->getLongitud();
    $latitud = $coordenadas->getLatitud();
 
    }
}
//si hemos pulsado el boton de solocuitar del formularioo entramos.
if (isset($_GET["solicitarRestMapa"])){

    $aErrores['direccionMapaEstatico'] = validacionFormularios::comprobarAlfabetico($_GET['direccionMapaEstatico'], 64, 2, 1); //maximo, mínimo y opcionalidad
    //Autenticación con la base de datos
    foreach ($aErrores as $key => $value) {
        if ($value != NULL) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        //guardamo en una variable la direccion del formulario para saber la direcion del mapa estatico.
        $direccionMapaEstatico = $_GET["direccionMapaEstatico"];
    //requerimos la clase rest para que nos de el metodo mapaaestatico y conseguir la url con las cordenadas de la localidad y nos lo muestre la vista
    //el metodo nos pide la direcion que introducimos en el input.
   $urlMapaEtatico = Rest::mapaEstatico($direccionMapaEstatico);      
    }
}

//mostramos las vistas del rest
$vista = $vistas["rest"];
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "rest";
require_once $vistas["layout"];

