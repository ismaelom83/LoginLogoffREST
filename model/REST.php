<?php

/**
     * Short Description
     *
     * Long Description
     *
     * @package      proyectoLoginLogoffREST
     * @author       Ismael Heras
     */
include_once 'Geolocation.php';
/**
 * Class REST
 *
 * Clase que ejecutas las APIs
 *
 * Clase que ejecuta todas las APIS consumidas.
 * 
 * PHP version 7.3
 *
 * @package  proyectoLoginLogoffREST
 * @source REST.php
 * @since 1.6
 * @copyright 12-02-2020
 * @author  Ismael Heras Salvador.
 * 
 * 
 */

class Rest{
    
    /**
     * Función para apai de cordenadas.
     * 
     * Función que le paasas una poblacion y te entrega unas cordenadas.
     * 
     * @function cordenadas();
     * @author Ismael Heras Salvador.
     * @version 1.6 
     * @param $poblacion poblacion a buscar.
     * @return object $coordenadas
     **/
    
    public static function cordenadas($poblacion) {
        //sustituimos los espacios por el simbolo de %20 para que el navegador lo reconozca.
        $nuevadPoblacion= str_replace(" ", '%20', $poblacion);
        //modificamos para que la ñ la sustituya por la n para que lo reconazca LA API
//            $nuevadireccion= str_replace("ñ", '&ntilde', $direccion);
        //guardamos en unavariable la url para recibir el json expecifico para nuestra direccion.
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $nuevadPoblacion . "&key=AIzaSyCrSgHJZQygN2PiJN35GiTuc83XnVHSSlg";
        //trasmite el fichero json a una cadena.
        $json = file_get_contents(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $url));
        //convertimos el string decoficado de json en una variable.
        $datos = json_decode($json, true);
        
        $coordenadas = new Geolocation($datos["results"][0]["geometry"]["location"]["lng"],$datos["results"][0]["geometry"]["location"]["lat"]);
        
        return $coordenadas;
    }
    
     /**
     * Función para apai de mapa estatico.
     * 
     * Función que le paasas una poblacion y te entrega un mapa estatico.
     * 
     * @function mapaEstatico();
     * @author Ismael Heras Salvador.
     * @version 1.6 
     * @param $poblacion poblacion a buscar.
     * @return object $urlPosicionMapa
     **/
    
    public static function mapaEstatico($poblacion) {
        
      $obCordenadas =  self::cordenadas($poblacion);
     $longitud = $obCordenadas->getLongitud();
     $latitud = $obCordenadas->getLatitud();     
      $urlPosicionMapa =  "https://maps.googleapis.com/maps/api/staticmap?center=".$latitud.", ". $longitud."&zoom=14&size=400x400&key=AIzaSyCrSgHJZQygN2PiJN35GiTuc83XnVHSSlg"; 
      
      return $urlPosicionMapa;
    } 
    
        /**
     * obtencion de departamentos.
     * 
     * Función que obtiene los datos de un departamento..
     * 
     * @function myApiREST();
     * @authorIsmael Heras Salvador.
     * @version 1.0 
     * @param $codDepartamento código del departamento que se busca.
     * @return int
     **/
    public static function myApiREST($codDepartamento){
        //Iniciamos el curl
        $curl = curl_init(); 
        //Preparamos la url de la api con el departamento que buscamos
        $url = "http://192.168.1.245/proyectoDWES/LoginLogoffREST/api/apiRest.php?codigo=" . $codDepartamento; 
        //Le decimos que queremos los datos de esa url
        curl_setopt($curl, CURLOPT_URL, $url); 
        //le decimos que lo guarde en "curl_exec" en vez de mostrarlo
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec($curl); //cogemos el resultado de curl_exec para devolverlo
        $resultadoFinal = json_decode($result,true);
        //cerramos el curl
        curl_close($curl); 
        return $resultadoFinal;   
    }
}

