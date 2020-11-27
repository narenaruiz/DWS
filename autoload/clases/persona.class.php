<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Persona {
    private $nombre;
    private $apellido;
    private $edad;
    public function __construct($nombre, $apellido, $edad) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }
    
    public function mostrarDetalles(){
        echo "$this->nombre, $this->apellido, edad $this->edad años";
    }
}