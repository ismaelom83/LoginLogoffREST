<?php

class Geolocation{
    
    private $poblacion;
    
    function __construct($poblacion) {
        $this->poblacion = $poblacion;
    }
    function getPoblacion() {
        return $this->poblacion;
    }

    function setPoblacion($poblacion) {
        $this->poblacion = $poblacion;
    }
    
    
    
}
