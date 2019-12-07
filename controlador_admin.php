<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './Vistas/auxiliar/conexion.php';
session_start();

if (isset($_REQUEST['ver'])) {
    conexion::abrirBBDD();
    $validaciones = conexion::recuperarPeliculasNoValidadas();
    conexion::cerrarBBDD();

    $_SESSION['pelis_sin_validar'] = $validaciones;

    if ($validaciones != null) {
        header('Location: ./Vistas/Administrador/valida_peliculas.php');
    } else {
        header("Location: ./Vistas/Administrador/peliculas_validadas.php");
    }
}

if (isset($_REQUEST['volver'])) {
    unset($_SESSION['pelis_sin_validar']);
    header('Location: ./index.php');
}