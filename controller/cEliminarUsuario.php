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
     unset($_SESSION['DAW209POODepartamento']);
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_POST["cancelar"])) {
    $_SESSION['DAW209POOusuario'];
    $_SESSION["pagina"] = "mUsuarios"; //Se guarda en la variable de sesión la ventana de registro
      header('Location: index.php'); //Se le redirige al index
    exit;
}
if (isset($_POST["volverInicio"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}

if(isset($_SESSION['usuarioAdmin'])){
     $codUsuario = $_SESSION['usuarioAdmin'];
     $objetoUsuario = UsuarioPDO::buscarUsuarioPorCodigo($codUsuario);
}

if (isset($_REQUEST["eliminarUsuario"])) {
   $codigoUsuario = $objetoUsuario->getCodUsuario();
   UsuarioPDO::borrarUsuario($codigoUsuario);

  $_SESSION['pagina'] = 'mUsuarios';
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
} 

    $descripcion = $objetoUsuario->getDescUsuario();
    $numeroAccesos = $objetoUsuario->getContadorAccesos();
    
    $vista = $vistas["eliminarUsuario"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "eliminarUsuario";

    require_once $vistas["layout"];

