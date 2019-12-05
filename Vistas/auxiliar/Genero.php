<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genero
 *
 * @author pedro
 */
class Genero {
    private $id;
    private $descripcion;
    
    function __construct($id, $descripcion) {
        $this->id = $id;
        $this->descripcion = $descripcion;
    }

    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
