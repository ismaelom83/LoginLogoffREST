<?php

//requerimos las clases para poder utilizar la base de datos.
require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';
//variable para controlar el formulario
$entradaOK = true;
//Array de los errores
$aErrores = [];
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
if (isset($_POST["editarUsuario"])) {
    $aErrores["DescUsuario"] = validacionFormularios::comprobarAlfaNumerico($_POST["DescUsuario"], 250, 1, 1);
    foreach ($aErrores as $key => $value) {
        if (!is_null($value)) {
            $entradaOK = false;
        }
    }
   if ($entradaOK) {
       
    $descUsuario = $_POST["DescUsuario"];
    $codUsuario = $_SESSION['DAW209POOusuario']->getCodUsuario();
    
            $objetoUsuario = UsuarioPDO::modificarUsuario($descUsuario, $codUsuario);
            $_SESSION['DAW209POOusuario'] = $objetoUsuario;
            $_SESSION['pagina'] = 'inicio';
            header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
            exit;
   }
} else {

    $usuario = $_SESSION["DAW209POOusuario"]->getCodUsuario();
    $descripcion = $_SESSION["DAW209POOusuario"]->getDescUsuario();
    $perfil =  $_SESSION["DAW209POOusuario"]->getPerfil();
    $visitas = $_SESSION["DAW209POOusuario"]->getContadorAccesos()+1;
    $vista = $vistas["miCuenta"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "miCuenta";

    require_once $vistas["layout"];
}

