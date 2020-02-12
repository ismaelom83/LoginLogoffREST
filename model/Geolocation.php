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
 * Class REST
 *
 * Clase que define la API Geolocation
 *
 * Clase que defrine los atributos a pasar por la clase a la url.
 * 
 * PHP version 7.3
 *
 * @package  proyectoLoginLogoffREST
 * @source Geolocation.php
 * @since 1.6
 * @copyright 12-02-2020
 * @author  Ismael Heras Salvador.
 * 
 * 
 */

class Geolocation{
    
   private $longitud;
   private $latitud;
   
    /**
     * constructor
     * 
     * constructor para rest
     * 
     * @function __construct();
     * @author Ismael Heras Salvador.
     * @version 1.6.
     * @since 12-02-2020
     * @param $longitud
     * @param $latitud
     * 
     **/
   
   function __construct($longitud, $latitud) {
       $this->longitud = $longitud;
       $this->latitud = $latitud;
   }
   
   /**
    * get 
    * 
    * get longitud
    * 
    * @return type float
    */
   function getLongitud() {
       return $this->longitud;
   }
/**
 * get 
 * 
 * get latitud
 * 
 * @return type float
 */
   function getLatitud() {
       return $this->latitud;
   }

   /**
    * set 
    * 
    * set longitud
    * 
    * @param float
    */
   function setLongitud($longitud) {
       $this->longitud = $longitud;
   }
   /**
    * set 
    * 
    * set latitud
    * 
    * @param float
    */

   function setLatitud($latitud) {
       $this->latitud = $latitud;
   } 
}
