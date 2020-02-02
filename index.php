<?php

/**
 * requerimos los ficheros de configuarion
 */
require_once './config/confAplicacion.php';
require_once './config/confDB.php';

//iniciamos sesion o la continuamos
session_start();



//si tenemos esesion entra en la estructura de control.
if (isset($_SESSION['DAW209POOusuario'])) {
 //Si ha accedido a alguna pagina, será mandado a la correspondiente
    if(isset($_SESSION["pagina"])){
        $controlador=$controladores[$_SESSION["pagina"]]; //Se almacena el controlador de la ventana en la variable
        require_once $controlador; //Se incluye el controlador
    }
    //si no existe la sesion de usuario pero existe la sesion pagina y es igual al registro requiere.
    //el controlador del registro y nios carga la pantalla de registro
} else if (isset($_SESSION["pagina"]) && $_SESSION["pagina"] == "registro") {
    include_once $controladores["registro"];
    //si no nos hay sesion de usuario y no existe la pagina ni es igual a registro carga en login
    //(por defecto al enttrar simpre carga esta opcion).
} else {
    $vista = $vistas["login"];
    include_once $controladores["login"];
}

