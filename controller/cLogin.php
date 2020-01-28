<?php

require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';
//variable para controlar el formulario
$entradaOK = true;
//Array de los errores
$aErrores = [];

//si pulsamos cerrar sesion destruye la sesion y nos lleva al inicio.
if (isset($_POST["cerrarSesion"])) {
  //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    header('Location: index.html'); //nos redirige al login
    die();//con die() terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
}
//si pulsamos el boton nos lleva  al registro.
if (isset($_POST["registro"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "registro"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}

//si pulsamos el boton enviar del formulario nos ejecuta el programa y comprueba si se valida al usuario o no
if (isset($_POST["enviar"])) {
    $aErrores["codUsuario"] = validacionFormularios::comprobarAlfaNumerico($_POST["usuario"], 250, 1, 1);
    $aErrores["password"] = validacionFormularios::comprobarAlfaNumerico($_POST["password"], 255, 4, 1);
    foreach ($aErrores as $key => $value) {
        if (!is_null($value)) {
            $entradaOK = false;
        }
    }
    //si la entrada  es correcta entramos en el if
    if ($entradaOK) {
        //almacenamos en una variable el usuario tecleado en el formulario
        $codUsuario = $_POST["usuario"];
        //alamacenamos en una variable el hash y la contraseña del usuario
        $password = hash("SHA256", $codUsuario . $_POST["password"]);
        //alamacenamos en una variable el valor dde la consulta validar usuario
        $obUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
        //si exise a creado el objeto validamos al usuario y nos redirigimos al login.
        if (is_object($obUsuario)) {
            //asignamos la sesion del usuario a el objeto de la clase UsuarioPDO validado
            $_SESSION["DAW209POOusuario"] = $obUsuario;
            //guardamos en la sesion que estamos en la pagina de inicio
            $_SESSION["pagina"] = "inicio";
            //y por ultimo nos dirigimos al index.
            header("Location: index.php");
            exit;
        } else {
            $_SESSION["pagina"] = "login";
            require_once $vistas["layout"];
        }
    } else {
        $vista = $vistas["login"];
        require_once $vistas["layout"];
    }
} else {
    $vista = $vistas["login"];
    //metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "login";
    require_once $vistas["layout"];
}