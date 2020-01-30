<?php

include_once 'DBPDO.php';
require_once 'Departamento.php';

class DepartamentoPDO {

    public static function buscarDepartamentoPorCodigo($codDescripcion){
        $codDepartamento = "";
           $consulta = "select * from T02_Departamento where T02_CodDepartamento like ?;";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codDepartamento]);
        if($resultadoConsulta->rowCount() != 0){
            $resultadoFormateado = $resultadoConsulta->fetchObject();
            $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $resultadoFormateado->T02_FechaCreacionDepartamento, $resultadoFormateado->T02_FechaBajaDepartamento);
            return $objetoDepartamento;
        } 
        return null;
        
    }


    
    public static function buscarDepartamento() {
        $consulta = "SELECT * FROM `T02_Departamento`"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, []); //Ejecutamos la consulta.
        
        return $resConsulta;
    }

}