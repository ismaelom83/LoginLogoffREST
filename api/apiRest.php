<?php
include_once '../config/confDB.php';
include_once '../model/Departamento.php';
include_once '../model/DepartamentoPDO.php';

if (isset($_GET["codigo"])) {
    $codDepartamento = $_GET["codigo"];
    $departamento = DepartamentoPDO::buscarDepartamentoPorCodigo($codDepartamento); //Lamada a la base de datos
    if (is_null($departamento)) { //Si no existe, se crea la respuesta con el error de no existe
        echo json_encode(null);
        header("HTTP/1.1 404");
    } else {
        echo json_encode($departamento->getVolumenDeNegocio());
        header("HTTP/1.1 200 OK");
    }
} else {
    echo json_encode(null);
    header("HTTP/1.1 402 ERROR");
    die;
}



