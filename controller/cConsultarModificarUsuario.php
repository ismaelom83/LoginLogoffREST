<?php
/**
     * Short Description
     *
     * Long Description
     *
     * @package      proyectoLoginLogoffREST
     * @author       Ismael Heras
     */
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POODepartamento']);
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_POST["volverUsuarios"])) {
    $_SESSION['DAW209POOusuario'];
    $_SESSION["pagina"] = "mUsuarios"; //Se guarda en la variable de sesión la ventana de registro
     header('Location: index.php'); //Se le redirige al index
    exit;
}
require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';

//require_once  'core/validacionFormularios.php'; //importamos la libreria de validacion  
define('OBLIGATORIO', 1); //constante que define que un campo es obligatorio.
define('NOOBLIGATORIO', 0); //constante que define que un campo NO es obligatorio.
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
//manejo del control de errores.
$aErrores = ['DescUsuarios' => null];
//manejo de las variables del formulario
$aFormulario = ['DescUsuarios' => null];
//si esta definida la variable y no es null almacenamos en una variable el codigo del registro recogido con $_GET
//y realizamos una consulta de todos los campos con ese codigo.
if (isset($_SESSION['usuarioAdmin'])) {
    $_SESSION['usuarioAdmin'];
    $codUsuario = $_SESSION['usuarioAdmin'];
    $objetoUsuario = UsuarioPDO::buscarUsuarioPorCodigo($codUsuario);
}
if (isset($_POST['ModificarUsuario'])) {
    //La posición del array de errores recibe el mensaje de error si hubiera.
    $aErrores['DescUsuarios'] = validacionFormularios::comprobarAlfaNumerico($_POST['DescUsuarios'], 255, 1, 1);
    //foreach para recorrer el array de errores
    foreach ($aErrores as $campo => $error) {
        if (!is_null($error)) {
            $_REQUEST[$campo] = "";
            $entradaOK = false;
        }
    }
} else {
    $entradaOK = false; //Cambiamos el valor de la variable si no se pulsa enviar.
}
if ($entradaOK && isset($_SESSION['usuarioAdmin'])) {//si la variable entradaOK esta el true ejecutamos el codigo.
    //el valor del array ahora es igual al de los campos recogidos en el formulario.
    $descUsuario = $_POST['DescUsuarios'];
    UsuarioPDO::modificarUsuario($descUsuario,$objetoUsuario->getCodUsuario());
    $_SESSION['pagina'] = 'mUsuarios';
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
}
$descripcionUsuario = $objetoUsuario->getDescUsuario();
$numeroAcccesos = $objetoUsuario->getContadorAccesos();
//mostramos las vistas.
$vista = $vistas["modificarUsuario"];
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "modificarUsuario";
require_once $vistas["layout"];

