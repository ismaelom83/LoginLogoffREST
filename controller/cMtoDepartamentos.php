<?php
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['DAW209POODepartamento']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
}
if (isset($_POST["volverDe"])) {
    $_SESSION["pagina"] = "inicio"; //Se guarda en la variable de sesión la ventana de registro
      header('Location: index.php'); //Se le redirige al index
    exit;
}
if (isset($_GET['codigoBorrar'])) {;
    $_SESSION['DAW209POODepartamento'] = $_GET['codigoBorrar'];
    $_SESSION["pagina"] = "borrarDep";
    header('Location: index.php'); //Se le redirige al index
    exit;
}
if (isset($_GET['codigoModificar'])) {
    $_SESSION['DAW209POODepartamento'] = $_GET['codigoModificar'];
    $_SESSION["pagina"] = "modDep";
    header('Location: index.php'); //Se le redirige al index
    exit;
}
if (isset($_POST['altaDep'])) {;
    $_SESSION["pagina"] = "altaDep";
    header('Location: index.php'); //Se le redirige al index
    exit;
}
require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';
$descDepart = null;
if (isset($_POST['enviarDepartamentos'])) {//si esta definida la variable i no es null decimos que nuestro array es igual al valor que recogemos en el campo buscar 
    $descDepart = $_POST['DescDepartamentos'];
}
if ($descDepart != null) {
    $obDepartamento = DepartamentoPDO::buscarDepartamentosPorDescripcion("%".$descDepart."%");
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

