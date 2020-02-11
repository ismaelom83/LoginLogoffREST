<?php

include_once 'Geolocation.php';
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
    
    
    public static function myApiREST($codDepartamento){
        //Inicia una nueva sesión y devuelve el manipulador curl para el uso de las funciones
        $myCurl = curl_init(); 
        //la url con el codigo de departamento para que al usuario la devuelva al introducirla el volumen de negocio
        $url = "http://daw209.sauces.local/proyectoDWES/LoginLogoffREST/api/apiRest.php?codigo=" . $codDepartamento;  //Preparamos la url de la api con el departamento que buscamos
        //cogemos los datos de esa url
        curl_setopt($myCurl, CURLOPT_URL, $url); 
         //guardamos el resultado en el curl_exec
        curl_setopt($myCurl, CURLOPT_RETURNTRANSFER, 1);
        //devolvemos  el curl_exec 
        $resultadoUrl = curl_exec($myCurl); 
        $resultadoApi = json_decode($result,true);
        //cerramos el curl
        curl_close($curl); 

        return $resultadoApi;   
    }

    
}
