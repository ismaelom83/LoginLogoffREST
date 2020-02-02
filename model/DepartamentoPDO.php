<?php

include_once 'DBPDO.php';
require_once 'Departamento.php';

class DepartamentoPDO {

    public static function buscarDepartamentoPorCodigo($codDEpartamento) {
        $consulta = "SELECT * FROM `T02_Departamento` WHERE `T02_Departamento`.`T02_CodDepartamento` = ?;"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codDEpartamento]); //Ejecutamos la consulta.

        if ($resConsulta->rowCount() == 1) {
            $resFetch = $resConsulta->fetchObject();
            $departamento = new Departamento($resFetch->T02_CodDepartamento, $resFetch->T02_DescDepartamento, $resFetch->T02_VolumenNegocio,$resFetch->T02_FechaBaja);
            return $departamento;
        }   
    }

    public static function buscarDepartamentosPorDescripcion($busqueda) {
        $consulta = "select * from T02_Departamento where T02_DescDepartamento LIKE ?;";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$busqueda]);
         
        return $resultadoConsulta;
    }

    public static function buscarDepartamento() {
       $consulta = "SELECT * FROM T02_Departamento"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, []); //Ejecutamos la consulta.
        return $resConsulta;
    }
    
    public static function modificaDepartamento($codDepartamento, $descDepartamento, $vNegocio) {
        $consulta = "UPDATE T02_Departamento SET T02_DescDepartamento = ?, T02_VolumenNegocio = ? WHERE T02_CodDepartamento = ?;"; 
        DBPDO::ejecutaConsulta($consulta, [$descDepartamento, $vNegocio, $codDepartamento]); //Ejecutamos la consulta.
    }
    
     public static function bajaFisicaDepartamento($codDepartamento) {
        $consulta = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento = ? ;"; //Creacion de la consulta.
        DBPDO::ejecutaConsulta($consulta, [$codDepartamento]); //Ejecutamos la consulta.
    }

}
