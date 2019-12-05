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
class Pelicula {
    private $id_pelicula;
    private $nombre;
    private $direccion;
    private $produccion;
    private $guion;
    private $musica;
    private $pais;
    private $ano;
    private $estreno;
    private $duracion;
    private $idiomas;
    private $productora;
    private $distribucion;
    private $presupuesto;
    private $recaudacion;
    private $generos_idgeneros;
    private $argumento;
    private $nombre_foto;
    private $tipo_foto;
    private $foto;
    
    function __construct($id_pelicula, $nombre, $direccion, $produccion, $guion, $musica, $pais, $ano, $estreno, $duracion, $idiomas, $productora, $distribucion, $presupuesto, $recaudacion, $generos_idgeneros, $argumento, $nombre_foto, $tipo_foto, $foto) {
        $this->id_pelicula = $id_pelicula;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->produccion = $produccion;
        $this->guion = $guion;
        $this->musica = $musica;
        $this->pais = $pais;
        $this->ano = $ano;
        $this->estreno = $estreno;
        $this->duracion = $duracion;
        $this->idiomas = $idiomas;
        $this->productora = $productora;
        $this->distribucion = $distribucion;
        $this->presupuesto = $presupuesto;
        $this->recaudacion = $recaudacion;
        $this->generos_idgeneros = $generos_idgeneros;
        $this->argumento = $argumento;
        $this->nombre_foto = $nombre_foto;
        $this->tipo_foto = $tipo_foto;
        $this->foto = $foto;
    }

    function getNombre_foto() {
        return $this->nombre_foto;
    }

    function getTipo_foto() {
        return $this->tipo_foto;
    }

    function setNombre_foto($nombre_foto) {
        $this->nombre_foto = $nombre_foto;
    }

    function setTipo_foto($tipo_foto) {
        $this->tipo_foto = $tipo_foto;
    }

        
    function getId_pelicula() {
        return $this->id_pelicula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getProduccion() {
        return $this->produccion;
    }

    function getGuion() {
        return $this->guion;
    }

    function getMusica() {
        return $this->musica;
    }

    function getPais() {
        return $this->pais;
    }

    function getAno() {
        return $this->ano;
    }

    function getEstreno() {
        return $this->estreno;
    }

    function getDuracion() {
        return $this->duracion;
    }

    function getIdiomas() {
        return $this->idiomas;
    }

    function getProductora() {
        return $this->productora;
    }

    function getDistribucion() {
        return $this->distribucion;
    }

    function getPresupuesto() {
        return $this->presupuesto;
    }

    function getRecaudacion() {
        return $this->recaudacion;
    }

    function getGeneros_idgeneros() {
        return $this->generos_idgeneros;
    }

    function getArgumento() {
        return $this->argumento;
    }

    function getFoto() {
        return $this->foto;
    }

    function setId_pelicula($id_pelicula) {
        $this->id_pelicula = $id_pelicula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setProduccion($produccion) {
        $this->produccion = $produccion;
    }

    function setGuion($guion) {
        $this->guion = $guion;
    }

    function setMusica($musica) {
        $this->musica = $musica;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setEstreno($estreno) {
        $this->estreno = $estreno;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function setIdiomas($idiomas) {
        $this->idiomas = $idiomas;
    }

    function setProductora($productora) {
        $this->productora = $productora;
    }

    function setDistribucion($distribucion) {
        $this->distribucion = $distribucion;
    }

    function setPresupuesto($presupuesto) {
        $this->presupuesto = $presupuesto;
    }

    function setRecaudacion($recaudacion) {
        $this->recaudacion = $recaudacion;
    }

    function setGeneros_idgeneros($generos_idgeneros) {
        $this->generos_idgeneros = $generos_idgeneros;
    }

    function setArgumento($argumento) {
        $this->argumento = $argumento;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }
}
