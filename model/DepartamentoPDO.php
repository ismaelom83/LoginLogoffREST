<?php
  /**
     * Short Description
     *
     * Long Description
     *
     * @package      proyectoLoginLogoffREST
     * @subpackage   Some Subpackage
     * @category     Some Category
     * @author       Ismael Heras
     */

include_once 'DBPDO.php';
require_once 'Departamento.php';

/**
 * Class DepartamentoPDO
 *
 * Clase para definir los metodos
 *
 * Clase que es la unica que tiene acceso a la base de datos y ejecuta las consultas a la misma.
 * 
 * PHP version 7.3
 *
 * @category ejecucion
 * @package  proyectoLoginLogoffREST
 * @source Departamento.php
 * @since 1.6
 * @copyright 12-02-2020
 * @author  Ismael Heras Salvador
 * 
 * 
 */



class DepartamentoPDO {

    /**
     * buscar
     * 
     * funcion para buscar departamentos
     * 
     * @param  $codDEpartamento
     * @return Departamento
     */
    public static function buscarDepartamentoPorCodigo($codDEpartamento) {
        $consulta = "SELECT * FROM `T02_Departamento` WHERE `T02_Departamento`.`T02_CodDepartamento` = ?;"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codDEpartamento]); //Ejecutamos la consulta.

        if ($resConsulta->rowCount() == 1) {
            $resFetch = $resConsulta->fetchObject();
            $departamento = new Departamento($resFetch->T02_CodDepartamento, $resFetch->T02_DescDepartamento, $resFetch->T02_VolumenNegocio,$resFetch->T02_FechaBaja);
            return $departamento;
        }   
    }
    /**
     * buscarpordescriipcion
     * 
     * metodo para buscar por descripcion
     * 
     * @param  $busqueda
     * @return  object
     */
    public static function buscarDepartamentosPorDescripcion($busqueda) {
        $consulta = "select * from T02_Departamento where T02_DescDepartamento LIKE ?;";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$busqueda]);
         
        return $resultadoConsulta;
    }

    /**
     * buscardepartamento
     * 
     * buscar todos los departamentos
     * 
     * @return  object
     */
    public static function buscarDepartamento() {
       $consulta = "SELECT * FROM T02_Departamento"; //Creacion de la consulta.
        $resConsulta = DBPDO::ejecutaConsulta($consulta, []); //Ejecutamos la consulta.
        return $resConsulta;
    }
    /**
     * modificar 
     * 
     * modificar departamentos
     * 
     * @param  $codDepartamento
     * @param  $descDepartamento
     * @param  $vNegocio
     */
    public static function modificaDepartamento($codDepartamento, $descDepartamento, $vNegocio) {
        $consulta = "UPDATE T02_Departamento SET T02_DescDepartamento = ?, T02_VolumenNegocio = ? WHERE T02_CodDepartamento = ?;"; 
        DBPDO::ejecutaConsulta($consulta, [$descDepartamento, $vNegocio, $codDepartamento]); //Ejecutamos la consulta.
    }
    /**
     * bajafisica
     * 
     * dar de baja fisica
     * 
     * @param  $codDepartamento
     */
     public static function bajaFisicaDepartamento($codDepartamento) {
        $consulta = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento = ? ;"; //Creacion de la consulta.
        DBPDO::ejecutaConsulta($consulta, [$codDepartamento]); //Ejecutamos la consulta.
    }
    /**
     * 
     * alatadepartamento
     * 
     * dar de alta un departamento
     * 
     * @param  $codDepartamento
     * @param  $descDepartamento
     * @param  $vol
     * 
     */
       public static function altaDepartamento($codDepartamento, $descDepartamento, $vol){
       $consulta = "INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_VolumenNegocio) VALUES(?,?,?)";
        DBPDO::ejecutaConsulta($consulta, [$codDepartamento, $descDepartamento, $vol]);
    }
    /**
     * validarNioExiste
     * 
     * validar un departamento que no exista.
     * 
     * @param  $codDepartamento
     * @return boolean
     */
     public static function validaCodNoExiste($codDepartamento){
        $consulta = "SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento=?;";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codDepartamento]);
         if($resultadoConsulta->rowCount() == 1){
             return false;
         }
        return true;
    }

}
