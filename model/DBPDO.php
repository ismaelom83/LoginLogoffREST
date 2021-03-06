
<?php

/**
     * Short Description
     *
     * Long Description
     * 
     * @package      proyectoLoginLogoffREST
     * @author       Ismael Heras
     */

/**
 * Class DBPDO
 *
 * Clase para ejecutar consultas a la base de datos
 *
 * Clase que es la unica que tiene acceso a la base de datos y ejecuta las consultas a la misma.
 * 
 * PHP version 7.3
 *
 * @category ejecucion
 * @package  proyectoLoginLogoffREST
 * @source DBPDO.php
 * @since 1.0
 * @copyright 12-02-2020
 * @author  Ismael Heras Salvador.
 * 
 * 
 */
class DBPDO {
      /**
       * funcion para ejecutar una o varias consultas  a la base de datos.
       * 
       * @param $sentenciaSQL
       * @param tparametros
       * @return type string
       */
    public static function ejecutaConsulta($sentenciaSQL, $parametros){
        try {
            $miDB = new PDO(MAQUINA, USUARIO, PASSWD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($sentenciaSQL); //Preparamos la consulta.
            $consulta->execute($parametros); //Ejecutamos la consulta.
        } catch (PDOException $exception) {
            $consulta = null; //Destruimos la consulta.
            echo $exception->getMessage();
            unset($miDB);
        }
        return $consulta;
    }  
}
