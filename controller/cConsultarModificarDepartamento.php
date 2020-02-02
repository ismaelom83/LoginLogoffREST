<?php

if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POODepartamento']);
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_POST["volverModDep"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "MtoDep"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';

//require_once  'core/validacionFormularios.php'; //importamos la libreria de validacion  
define('OBLIGATORIO', 1); //constante que define que un campo es obligatorio.
define('NOOBLIGATORIO', 0); //constante que define que un campo NO es obligatorio.
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
//manejo del control de errores.
$aErrores = ['DescDepartamentos' => null,
    'VolumenNegocio' => null];
//manejo de las variables del formulario
$aFormulario = ['DescDepartamentos' => null,
    'VolumenNegocio' => null];
//si esta definida la variable y no es null almacenamos en una variable el codigo del registro recogido con $_GET
//y realizamos una consulta de todos los campos con ese codigo.
if (isset($_SESSION['DAW209POODepartamento'])) {
    $_SESSION['DAW209POOusuario'];
    $codDEpartamento = $_SESSION['DAW209POODepartamento'];
    $objetoDepartamento = DepartamentoPDO::buscarDepartamentoPorCodigo($codDEpartamento);
    $_SESSION['DAW209POODepartamento'] = $objetoDepartamento;
}
if (isset($_POST['modificar'])) {
    //La posición del array de errores recibe el mensaje de error si hubiera.
    $aErrores['DescDepartamentos'] = validacionFormularios::comprobarAlfaNumerico($_POST['DescDepartamentos'], 255, 1, 1);
    $aErrores['VolumenNegocio'] = validacionFormularios::comprobarFloat($_POST['VolumenNegocio'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 1);
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
if ($entradaOK && isset($_SESSION['DAW209POODepartamento'])) {//si la variable entradaOK esta el true ejecutamos el codigo.
    //el valor del array ahora es igual al de los campos recogidos en el formulario.
    $desc = $_POST['DescDepartamentos'];
    $volumen = $_POST['VolumenNegocio'];
    DepartamentoPDO::modificaDepartamento($_SESSION['DAW209POODepartamento']->getCodDepartamento(), $desc, $volumen);
    $_SESSION['pagina'] = 'MtoDep';
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
}
$descripcion = $_SESSION["DAW209POODepartamento"]->getDescDepartamento();
$volumenNegocio = $_SESSION["DAW209POODepartamento"]->getVolumenDeNegocio();
//mostramos las vistas del rest
$vista = $vistas["modDep"];
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "modDep";
require_once $vistas["layout"];





