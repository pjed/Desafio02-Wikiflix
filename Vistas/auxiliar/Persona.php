<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author daw201
 */
class Persona {
    private $idroles;
    private $descripcion;
    private $rol_idroles;
    private $email;
    private $contrasena;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;
    
    function __construct($idroles, $descripcion, $rol_idroles, $email, $contrasena, $nombre, $apellidos, $direccion, $telefono) {
        $this->idroles = $idroles;
        $this->descripcion = $descripcion;
        $this->rol_idroles = $rol_idroles;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    function getIdroles() {
        return $this->idroles;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getRol_idroles() {
        return $this->rol_idroles;
    }

    function setIdroles($idroles) {
        $this->idroles = $idroles;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setRol_idroles($rol_idroles) {
        $this->rol_idroles = $rol_idroles;
    }
        
    function getEmail() {
        return $this->email;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}
