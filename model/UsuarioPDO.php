<?php

/**
 * Class UsuarioPDO
 *
 * Clase que ejecutas las consultas
 *
 * Clase que ejecuta todas las consultas de la basee de datos 
 * 
 * PHP version 7.3
 *
 * @package  LoginLogoffMulticapaMVC
 * @source UsuarioPDO.php
 * @since 1.0
 * @copyright 15-01-2020
 * @author  Ismael Heras Salvador.
 * 
 * 
 */
include 'DBPDO.php';
require_once 'Usuario.php';
class UsuarioPDO {
    /**
     * funcion que valida usuarios y pide a la clase DBPDO el metodo ejecutarConsultas
     * 
     * @param type $codUsuario el codigo del usuario que recivimos en el formulario
     * @param type $password la contraseña del usuario que recivimos por el formulario
     * @return type devuelve un array con toos los valores de la base de datos del usuario
     */
    public static function validarUsuario($codUsuario, $password) {
        //creamos una consulta para saber el codigo del usuario y la contraseña
        $consulta = "select * from T01_Usuarios where T01_CodUsuario=? and T01_Password=?";
        //pedimos el metodo ejecutar consulta y la ejecutamos
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $password]);
        //Si ahya algun resultado alamacenamos en el array todos los resultados.
        if ($resConsulta->rowCount() == 1) {
             //update a la base de datos para amuntar el numero de visitas antes de crear ekl objeto
            $consulta = "UPDATE T01_Usuarios SET T01_NumAccesos=T01_NumAccesos+1, T01_FechaHoraUltimaConexion=now() WHERE T01_CodUsuario=?";
            DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
            //creamos el objeto usuario despues de haber actualizado la base de datos.
       $usuario =$resConsulta->fetchObject();
       $obUsuario = new Usuario($usuario->T01_CodUsuario,$usuario->T01_DescUsuario,$usuario->T01_Password,$usuario->T01_Perfil,$usuario->T01_FechaHoraUltimaConexion,$usuario->T01_NumAccesos);
       return $obUsuario;
        }else{
            return false;
        }  
    }
    /**
     * 
     * @param type $codUsuario
     * @return boolean
     */
    
     public static function validarCodNoExiste($codUsuario){
         //consulta SQL para saber el usuario 
        $consulta = "SELECT T01_CodUsuario FROM T01_Usuarios WHERE T01_CodUsuario=?;";
        //se alamacena en una variable el resultado de la consulta.
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
        //si existe una consulta devuelve un valor verdadero
         if($resultadoConsulta->rowCount() == 1){
             return true;
         }
        return false;
    }
/**
 * 
 * @param type $codUsuario
 * @param type $descUsuario
 * @param type $password
 * @return type
 */
 public static function altaUsuario($codUsuario, $descUsuario, $password,$accesos){
     //insertamos en la base de datos un nuevo registro con los valores predeterminados.
     
        $consulta = "INSERT INTO T01_Usuarios (T01_CodUsuario, T01_DescUsuario, T01_Password,T01_NumAccesos) VALUES(?,?,?,?);";
        DBPDO::ejecutaConsulta($consulta, [$codUsuario, $descUsuario, $password,$accesos]);
        return self::validarUsuario($codUsuario, $password);
    } 
    
    /**
     * 
     * @param type $codUsuario
     */
    public static function borrarUsuario($codUsuario){ 
        $consulta = "DELETE FROM T01_Usuarios WHERE T01_CodUsuario LIKE ? ";
        DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
    }
    
    public static function modificarUsuario($descUsuario,$codUsuario){
        $consulta = "UPDATE T01_Usuarios SET T01_DescUsuario = ? WHERE T01_CodUsuario = ?;";
        DBPDO::ejecutaConsulta($consulta, [$descUsuario, $codUsuario]);   
        $objetoUsuario = new Usuario($codUsuario,$descUsuario,$_SESSION['DAW209POOusuario']->getPassword(), $_SESSION['DAW209POOusuario']->getPerfil(), $_SESSION['DAW209POOusuario']->getUltimaConexion(),$_SESSION['DAW209POOusuario']->getContadorAccesos());

        return $objetoUsuario;
    }
  

}

