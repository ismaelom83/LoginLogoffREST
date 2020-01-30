
<?php
require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
//manejo del control de errores.
//manejo de las variables del formulario
$aFormulario ['DescDepartamentos'] = null;
//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_POST["volverDe"])) {
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
if (isset($_POST['DescDepartamentos'])) {//si esta definida la variable i no es null decimos que nuestro array es igual al valor que recogemos en el campo buscar 
    $aFormulario ['DescDepartamentos'] = $_POST['DescDepartamentos'];
}
//si el array es diferente de null entonces ejecutamos la consulta para decir si lo introducido en el campo
// de buscar coincide con la descripcion de alguno de los registros.
if ($aFormulario['DescDepartamentos'] != null) {

   
$obDepartamento = DepartamentoPDO::buscarDepartamentoPorCodigo("%".$_POST['DescDepartamentos']."%");
} else {

    $obDepartamento = DepartamentoPDO::buscarDepartamento();
//    $_SESSION['DAW209POOusuario'] = $obDepartamento;
    $vista = $vistas["departamentos"];
    $_SESSION['pagina'] = 'MtoDep';
    require_once $vistas["layout"];
}

//muestra los registros que coinciden en la sentencia sql que sera dependiendo de el condicional de arriba 
//(si hay algo en el input ejecutara la sentencia de de comparar (like) y si no hara un select de todos los campos(limit 7)) y da formato
//a nuestra tabla con los td y tr de modificar borrar etc...

//mostramos las vistas del rest
$vista = $vistas["departamentos"];
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "MtoDep";
require_once $vistas["layout"];

