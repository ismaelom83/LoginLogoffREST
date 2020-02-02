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
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "MtoDep"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}

if(isset($_SESSION['DAW209POODepartamento'])){
     $codDEpartamento = $_SESSION['DAW209POODepartamento'];
     $objetoDepartamento = DepartamentoPDO::buscarDepartamentoPorCodigo("DIW");
     $_SESSION['DAW209POODepartamento'] = $objetoDepartamento; 
}

if (isset($_REQUEST["eliminarDept"]) && isset($_SESSION['DAW209POODepartamento'])) {

   $cod = $_SESSION['DAW209POODepartamento']->getCodDepartamento();
  
    DepartamentoPDO::bajaFisicaDepartamento($cod);

    //destruye la sesion del usuario
    unset($_SESSION['DAW209POODepartamento']);
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
} 

    $descripcion = $_SESSION["DAW209POODepartamento"]->getDescDepartamento();
    $volumenNegocio =  $_SESSION["DAW209POODepartamento"]->getVolumenDeNegocio();
    
    $vista = $vistas["borrarDep"];
//metemos en la sesion en la pagina que estamos.
    $_SESSION["pagina"] = "borrarDep";

    require_once $vistas["layout"];


