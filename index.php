<?php

/**
 * requerimos los ficheros de configuarion
 */
require_once './config/confAplicacion.php';
require_once './config/confDB.php';

//iniciamos sesion o la continuamos
session_start();



//si inicias sesion y no cargas ninguan pagina te manda al inicio
if (isset($_SESSION['DAW209POOusuario']) && !isset($_SESSION["pagina"])) {
    // almacenamos el controlador de inicio en la variable
    $controlador = $controladores["inicio"]; 
    require_once $controlador; 
}

//Se te rediccionara a la pagina especifica
if (isset($_SESSION["pagina"])) {
    $controlador = $controladores[$_SESSION["pagina"]]; 
    require_once $controlador; 
}
//si no has iniciado sesion te dredirige al login
else {
    $controlador = $controladores["login"]; 
    require_once $controlador; 
} 

