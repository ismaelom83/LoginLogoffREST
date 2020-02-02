<?php

require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';
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
    $_SESSION["pagina"] = "MtoDep"; //Se guarda en la variable de sesión la ventana de registro
      header('Location: index.php'); //Se le redirige al index
    exit;
}

if(isset($_SESSION['DAW209POODepartamento'])){
    $_SESSION['DAW209POOusuario'];
     $codDepartamento = $_SESSION['DAW209POODepartamento'];
     $objetoDepartamento = DepartamentoPDO::buscarDepartamentoPorCodigo($codDepartamento);
}

if (isset($_REQUEST["eliminarDept"])) {
   $cod = $objetoDepartamento->getCodDepartamento();
    DepartamentoPDO::bajaFisicaDepartamento($cod);

  $_SESSION['pagina'] = 'MtoDep';
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
} 

    $descripcion = $objetoDepartamento->getDescDepartamento();
    $volumenNegocio =  $objetoDepartamento->getVolumenDeNegocio();
    
    $vista = $vistas["borrarDep"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "borrarDep";

    require_once $vistas["layout"];


