<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noticia
 *
 * @author pedro
 */
class Noticia {
    private $idnoticia;
    private $titulo;
    private $usuario_usuario;
    private $fecha;
    private $descripcion;
    private $foto;
    
    function __construct($idnoticia, $titulo, $usuario_usuario, $fecha, $descripcion, $foto) {
        $this->idnoticia = $idnoticia;
        $this->titulo = $titulo;
        $this->usuario_usuario = $usuario_usuario;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
    }
    
    
    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

        function getIdnoticia() {
        return $this->idnoticia;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getUsuario_usuario() {
        return $this->usuario_usuario;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdnoticia($idnoticia) {
        $this->idnoticia = $idnoticia;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setUsuario_usuario($usuario_usuario) {
        $this->usuario_usuario = $usuario_usuario;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
