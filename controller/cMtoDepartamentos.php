
<?php
require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';
if (isset($_GET['codigo'])) {
    header('Location: index.php'); //Se le redirige al index
     $_SESSION['DAW209POODepartamento']=$_GET['codigo'];
    $_SESSION['DAW209POOusuario'] = $_GET['codigo'];
    $_SESSION["pagina"] = "modDep"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
//manejo del control de errores.
//manejo de las variables del formulario
$aFormulario ['DescDepartamentos'] = null;
//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
     unset($_SESSION['DAW209POODepartamento']);
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
if (isset($_POST['enviarDepartamentos'])) {//si esta definida la variable i no es null decimos que nuestro array es igual al valor que recogemos en el campo buscar 
    $aFormulario ['DescDepartamentos'] = $_POST['DescDepartamentos'];
}
//si el array es diferente de null entonces ejecutamos la consulta para decir si lo introducido en el campo
// de buscar coincide con la descripcion de alguno de los registros.
if ($aFormulario['DescDepartamentos'] != null) {
    $obDepartamento = DepartamentoPDO::buscarDepartamentosPorDescripcion("%" . $aFormulario ['DescDepartamentos'] . "%");
} else {

    $obDepartamento = DepartamentoPDO::buscarDepartamento();
//    $_SESSION['DAW209POODepartamento'] = $obDepartamento;
    $vista = $vistas["departamentos"];
    $_SESSION['pagina'] = 'MtoDep';
    require_once $vistas["layout"];
}

//mostramos las vistas del rest
$vista = $vistas["departamentos"];
//metemos en la sesion en la pagina que estamos.
$_SESSION["pagina"] = "MtoDep";
require_once $vistas["layout"];

