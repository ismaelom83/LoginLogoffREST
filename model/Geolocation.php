<?php

class Geolocation{
    
   private $longitud;
   private $latitud;
   
   function __construct($longitud, $latitud) {
       $this->longitud = $longitud;
       $this->latitud = $latitud;
   }
   
   function getLongitud() {
       return $this->longitud;
   }

   function getLatitud() {
       return $this->latitud;
   }

   function setLongitud($longitud) {
       $this->longitud = $longitud;
   }

   function setLatitud($latitud) {
       $this->latitud = $latitud;
   }



    
}
