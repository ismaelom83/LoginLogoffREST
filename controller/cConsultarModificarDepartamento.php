<?php

if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POODepartamento']);
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
$aErrores = ['CodDepartamentos' => null,
    'DescDepartamentos' => null,
    'FechaBaja' => null,
    'VolumenNegocio' => null];
//manejo de las variables del formulario
$aFormulario = ['CodDepartamentos' => null,
    'DescDepartamentos' => null,
    'FechaBaja' => null,
    'VolumenNegocio' => null];
//if (isset($_POST['modificar']) && $_POST['modificar'] == 'ModificarDepartamento') {
//    //La posición del array de errores recibe el mensaje de error si hubiera.
//    $aErrores['DescDepartamentos'] = validacionFormularios::comprobarAlfaNumerico($_POST['DescDepartamentos'], 255, 1, 1);
//    $aErrores['VolumenNegocio'] = validacionFormularios::comprobarFloat($_POST['VolumenNegocio'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 1);
//    //foreach para recorrer el array de errores
//    foreach ($aErrores as $campo => $error) {
//        if (!is_null($error)) {
//            $_REQUEST[$campo] = "";
//            $entradaOK = false;
//        }
//    }
//} else {
//    $entradaOK = false; //Cambiamos el valor de la variable si no se pulsa enviar.
//}
//
//if ($entradaOK) {//si la variable entradaOK esta el true ejecutamos el codigo.
//    //el valor del array ahora es igual al de los campos recogidos en el formulario.
//    $aFormulario['DescDepartamentos'] = $_POST['DescDepartamentos'];
//    $aFormulario['VolumenNegocio'] = $_POST['VolumenNegocio'];
//
//    //realizamos una consulta preparada que es un update de los campos descripcion y volumen 
//    //del  registro con codigo recojido por $_GET.
//    $sql = "UPDATE Departamento SET DescDepartamento=:descDepartamento, VolumenNegocio=:volumenNegocio WHERE CodDepartamento=:codDepartamento";
//    //guardamos en una variable la sentencia sql
//    $sentencia = $miDB->prepare($sql);
//    //blindeamos los parametros.
//    $sentencia->bindParam(":codDepartamento", $_GET['codigo']);
//    $sentencia->bindParam(":descDepartamento", $_POST['DescDepartamentos']);
//    $sentencia->bindParam(":volumenNegocio", $_POST['VolumenNegocio']);
//    $sentencia->execute();
//    //cath donde nos salta las excepcion si introducimos mal los datos
//}
//si esta definida la variable y no es null almacenamos en una variable el codigo del registro recogido con $_GET
//y realizamos una consulta de todos los campos con ese codigo.
//if (isset($_SESSION['DAW209POODepartamento'])) {
//
//    $codDEpartamento = $_SESSION['DAW209POODepartamento']->getCodDepartamento();
//    $objetoDepartamento = DepartamentoPDO::buscarDepartamentoPorCodigo($codDEpartamento);
//
//    $_SESSION["DAW209POODepartamento"] = $objetoDepartamento;
//
//
//    //mostramos las vistas del rest
//    $vista = $vistas["modDep"];
////metemos en la sesion en la pagina que estamos.
//    $_SESSION["pagina"] = "modDep";
//    require_once $vistas["layout"];
//} else {
//
//    //almacenamos en una variable un campo concreto del array de la consulta para introducirlo por defecto 
//    //mediante los values en cada input de los campos que queremos modificar.
//    $descripcion = $_SESSION["DAW209POODepartamento"]->getDescDepartamento();
//    $volumenNegocio = $_SESSION["DAW209POODepartamento"]->getVolumenDeNegocio();
//    //mostramos las vistas del rest
//    $vista = $vistas["modDep"];
////metemos en la sesion en la pagina que estamos.
//    $_SESSION["pagina"] = "modDep";
//    require_once $vistas["layout"];
//}

if (isset($_SESSION['DAW209POODepartamento'])) {
    $aErrores["VolumenNegocio"] = validacionFormularios::comprobarAlfaNumerico($_POST["VolumenNegocio"], 250, 1, 1);
    $aErrores["DescDepartamentos"] = validacionFormularios::comprobarAlfaNumerico($_POST["DescDepartamentos"], 250, 1, 1);

      
    foreach ($aErrores as $key => $value) {
        if (!is_null($value)) {
            $entradaOK = false;
        }
    }
   if ($entradaOK) {
       
    $codDEpartamento = $_SESSION['DAW209POODepartamento']->getCodDepartamento();
    
            $objetoDepartamento = DepartamentoPDO::buscarDepartamentoPorCodigo($codDEpartamento);
            $_SESSION['DAW209POODepartamento'] = $objetoUsuario;
            $_SESSION['pagina'] = 'MtoDep';
            header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
            exit;
   }
} else {

//    $usuario = $_SESSION["DAW209POODepartamento"]->getDescDepartamento();
//    $descripcion = $_SESSION["DAW209POODepartamento"]->getVolumenDeNegocio();
    $vista = $vistas["modDep"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "modDep";

    require_once $vistas["layout"];
}

