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
 * Class Usuario
 *
 * Clase para definir un objeto de la clase usuario
 *
 * Clase que con los atributos igual que el modelo fisico de datos nos permite crear 
 * un objeto de la clase Usuario para utilizarlo con nuestra sesion.
 * 
 * PHP version 7.3
 *
 * @category instanciacion
 * @package  LoginLogoffMulticapaMVC
 * @source Usuario.php
 * @since 1.6
 * @copyright 12-02-2020
 * @author  Ismael Heras Salvador
 * 
 * 
 */
class Usuario{
    /**
     *
     * @var type string
     */
    private $codUsuario;
    private $descUsuario;
    private $password;
    private $perfil;
    private $ultimaConexion;
    private $contadorAccesos;
    
    /**
     * 
     * constructor 
     * 
     * constructor usuario
     * 
     * @function __construct();
     * @author Ismael Heras Salvador.
     * @version 1.6.
     * @since 12-02-2020
     * @param $codUsuario
     * @param $descUsuario
     * @param $password
     * @param $perfil
     * @param $ultimaConexion
     * @param $contadorAccesos
     **/
    
    function __construct($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos) {
        $this->codUsuario = $codUsuario;
        $this->descUsuario = $descUsuario;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->ultimaConexion = $ultimaConexion;
        $this->contadorAccesos = $contadorAccesos;
    }
    
    /**
     * get
     * Getter para mostrar el atributo
     * 
     * @return type/ el codigo del usuario
     */
    
    function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * get
     * 
     * Getter para mostrar el atributo
     * 
     * @return type string
     */
    function getDescUsuario() {
        return $this->descUsuario;
    }
/**
 * get
 * 
 * Getter para mostrar el atributo
 * 
 * @return type string
 */
    function getPassword() {
        return $this->password;
    }
/** 
 * get
 * 
 * Getter para mostrar el atributo
 *  
 * @return type string 
 */
    function getPerfil() {
        return $this->perfil;
    }

    /**
     * get
     * 
     * Getter para mostrar el atributo
     * 
     * @return type data 
     */
    function getUltimaConexion() {
        return $this->ultimaConexion;
    }
    /**
     * get
     * 
     * Getter para mostrar el atributo
     * 
     * @return type int 
     */

    function getContadorAccesos() {
        return $this->contadorAccesos;
    }

    /**
     * set
     * 
     * Setter para modificar el atributo
     * 
     * @param type string  
     */
    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    /**
     * set
     * 
     * Setter para modificar el atributo
     * 
     * @param type string
     */
    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    /**
     * set
     * 
     * Setter para modificar el atributo
     * 
     * @param type string 
     */
    function setPassword($password) {
        $this->password = $password;
    }

    /**
     * set
     * 
     * Setter para modificar el atributo
     * 
     * @param type string 
     */ 
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
/**
 * Setter para modificar el atributo
 * 
 * @param type data 
 */
    function setUltimaConexion($ultimaConexion) {
        $this->ultimaConexion = $ultimaConexion;
    }
/**
 * set
 * 
 * Setter para modificar el atributo
 * 
 * @param type int 
 */
    function setContadorAccesos($contadorAccesos) {
        $this->contadorAccesos = $contadorAccesos;
    }
}
