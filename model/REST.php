<?php

include_once 'Geolocation.php';
include_once 'MapaEstatico.php';
class Rest{
    
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
    
    public static function mapaEstatico($poblacion) {
        
      $obCordenadas =  self::cordenadas($poblacion);
     $longitud = $obCordenadas->getLongitud();
     $latitud = $obCordenadas->getLatitud();     
      $urlPosicionMapa =  "https://maps.googleapis.com/maps/api/staticmap?center=".$latitud.", ". $longitud."&zoom=14&size=400x400&key=AIzaSyCrSgHJZQygN2PiJN35GiTuc83XnVHSSlg"; 
      
      return $urlPosicionMapa;
    }
}