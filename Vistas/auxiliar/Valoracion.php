<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Valoracion
 *
 * @author pedro
 */
class Valoracion {
    private $idpelicula;
    private $email;
    private $puntuacion;
    
    function __construct($idpelicula, $email, $puntuacion) {
        $this->idpelicula = $idpelicula;
        $this->email = $email;
        $this->puntuacion = $puntuacion;
    }

    function getIdpelicula() {
        return $this->idpelicula;
    }

    function getEmail() {
        return $this->email;
    }

    function getPuntuacion() {
        return $this->puntuacion;
    }

    function setIdpelicula($idpelicula) {
        $this->idpelicula = $idpelicula;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPuntuacion($puntuacion) {
        $this->puntuacion = $puntuacion;
    }
}
