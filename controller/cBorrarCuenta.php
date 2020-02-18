<?php
/**
     * Short Description
     *
     * Long Description
     *
     * @package      proyectoLoginLogoffREST
     * @author       Ismael Heras
     */
require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';
//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_POST["cancelar"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
if (isset($_REQUEST["eliminarCuenta"])) {

    $codUsuario = $_SESSION['DAW209POOusuario']->getCodUsuario();
    UsuarioPDO::borrarUsuario($codUsuario);

    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
} else {
    $usuario = $_SESSION["DAW209POOusuario"]->getCodUsuario();
    $descripcion = $_SESSION["DAW209POOusuario"]->getDescUsuario();
    $perfil =  $_SESSION["DAW209POOusuario"]->getPerfil();
    $password = $_SESSION["DAW209POOusuario"]->getPassword();
    $vista = $vistas["borrarCuenta"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "borrarCuenta";
    require_once $vistas["layout"];
}
