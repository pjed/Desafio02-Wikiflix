<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './Vistas/auxiliar/conexion.php';
include './Vistas/auxiliar/Codificar.php';
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

if (isset($_REQUEST['crud'])) {
    conexion::abrirBBDD();
    $usuarios = conexion::obtenerTodosUsuarios();
    conexion::cerrarBBDD();

    $_SESSION['usuarios_crud'] = $usuarios;
    header('Location: ./Vistas/Administrador/crud_usuarios.php');
}

if(isset($_REQUEST['validar_crud'])){
    
    $usuario = $_REQUEST['usuario_nuevo'];
    $nombre = $_REQUEST['nombre_nuevo'];
    $apellidos = $_REQUEST['apellidos_nuevo'];
    $direccion = $_REQUEST['direccion_nuevo'];
    $telefono = $_REQUEST['telefono_nuevo'];
    $rol_nuevo = $_REQUEST['rol_nuevo'];
    $password = 1;
    
    conexion::abrirBBDD();
    conexion::insertarUsuario($usuario, Codificar::codificarCadena($password), $nombre, $apellidos, $direccion, $telefono, $rol_nuevo);
    conexion::cerrarBBDD();
    
    header('Location: ./Vistas/Administrador/crud_usuarios.php');
}


if(isset($_REQUEST['modificar_crud'])){
    
    $usuario = $_REQUEST['usuario'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    $rol_usuario = $_REQUEST['rol_usuario'];
    
    
    conexion::abrirBBDD();
    conexion::modificarUsuario($usuario, $nombre, $apellidos, $direccion, $telefono, $rol_usuario);
    conexion::cerrarBBDD();
    
    header('Location: ./Vistas/Administrador/crud_usuarios.php');
}


if(isset($_REQUEST['eliminar_crud'])){
    $usuario = $_REQUEST['usuario'];
    
    conexion::abrirBBDD();
    conexion::eliminarUsuario($usuario);
    conexion::cerrarBBDD();
    
    header('Location: ./Vistas/Administrador/crud_usuarios.php');
}

