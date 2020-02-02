<?php

/**
 * requerimos la clase validacion de formulrios
 */
require_once 'core/validacionFormularios.php';
/**
 * requerimos las clases del modelo
 */
require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';
require_once 'model/DBPDO.php';

//creamos los arrays para acceder a las vistas y a los controladores sin tener que escribir todo el rato las rutas

$controladores = [
    'login' => 'controller/cLogin.php',
    'inicio' => 'controller/cInicio.php',
    'registro' => 'controller/cRegistro.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'rest' => 'controller/cREST.php',
    'departamentos' => 'controller/cMtoDepartamentos.php',
    'modDep' => 'controller/cConsultarModificarDepartamento.php',
    'borrarDep' => 'controller/cEliminarDepartamento.php',
];

$vistas = [
    'layout' => 'view/Layout.php',
    'login' => 'view/vLogin.php',
    'inicio' => 'view/vInicio.php',
    'registro' => 'view/vRegistro.php',
    'borrarCuenta' => 'view/vBorrarCuenta.php',
    'miCuenta' => 'view/vMiCuenta.php',
    'rest' => 'view/vREST.php',
     'departamentos' => 'view/vMtoDepartamentos.php',
    'modDep' => 'view/vConsultarModificarDepartamento.php',
    'borrarDep' => 'view/vEliminarDepartamento.php',
];
