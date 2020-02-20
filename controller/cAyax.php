<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 * @package POO-LMR
 * @author Luis Mateo Rivera Uriarte
 */

if(isset($_POST['buscaDescripcion'])){
    //Incluimos los ficheros necesarios
    include_once '../model/DepartamentoPDO.php';
    include_once '../config/ConfDB.php';
    include_once '../model/BDPDO.php';
    //llamamos al metodo
    DepartamentoPDO::sacarDescripciones($_REQUEST['buscaDescripcion']);
}

