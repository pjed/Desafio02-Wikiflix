<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './Vistas/auxiliar/conexion.php';
include './Vistas/auxiliar/Codificar.php';
session_start();

if (isset($_REQUEST['iniciar'])) {
    $usuario = $_REQUEST['usuario'];
    $password = Codificar::codificarCadena($_REQUEST['password']);

    conexion::abrirBBDD();
    $usuario = conexion::existeUsuario($usuario, $password);
    conexion::cerrarBBDD();

    if ($usuario != null) {
        $_SESSION['usuario'] = $usuario;
        header('Location: ./index.php');
    } else {
        header('Location: ./Vistas/error/error.php');
    }
}


if (isset($_REQUEST['cerrar'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_REQUEST['puntuar'])) {
    $idpelicula = $_REQUEST['idpelicula'];
    $email = $_REQUEST['email_usuario'];
    $puntos = $_REQUEST['puntos'];



    conexion::abrirBBDD();

    $valoracion = conexion::comprobarValoracionPelicula($idpelicula, $email, $puntos);

    if (!isset($valoracion)) {
        conexion::insertarValoracion($idpelicula, $email, $puntos);

        conexion::cerrarBBDD();
        header('Location: ./Vistas/Registro/puntuacion_registrada.php');
    } else {
        conexion::cerrarBBDD();
        header('Location: ./Vistas/Registro/puntuacion_error.php');
    }
}

if (isset($_REQUEST['aceptar'])) {

    $idroles = 1;
    $email = $_REQUEST['email'];
    $contrasena = Codificar::codificarCadena($_REQUEST['password']);
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];

    conexion::abrirBBDD();
    $p = conexion::existeUsuarioEmail($email);
    conexion::cerrarBBDD();

    if ($p !== null) {
        //Existe el usuario mostramos mensaje de error que no existe el usuario
        header('Location: ./Vistas/Registro/registro_error.php');
    } else {
        //No existe el usuario procedemos a insertarlo en la BBDD
        conexion::abrirBBDD();
        conexion::registrarUsuario($idroles, $email, $contrasena, $nombre, $apellidos, $direccion, $telefono);
        conexion::cerrarBBDD();
        header('Location: ./Vistas/Registro/registro_correcto.php');
    }
}

if (isset($_REQUEST['letra'])) {

    $pagina = $_SESSION['pagina'];

    if ($pagina == "Nombre") {
        $letra = $_REQUEST['letra'] . '%';
        conexion::abrirBBDD();
        $peliculas = conexion::obtenerTodasPeliculas("letra", $letra);
        conexion::cerrarBBDD();
        header('Location: ./Vistas/Listar/ListarNombre.php');
    }

    $_SESSION['peliculas'] = $peliculas;
}

if (isset($_REQUEST['estreno'])) {

    if ($_SESSION['pagina'] == "Estreno") {
        $estreno = $_REQUEST['estreno'];
        conexion::abrirBBDD();
        $peliculas = conexion::obtenerTodasPeliculas("estreno", $estreno);
        conexion::cerrarBBDD();
        header('Location: ./Vistas/Listar/ListarFechaEstreno.php');
    }

    $_SESSION['peliculas'] = $peliculas;
}

if (isset($_REQUEST['generos'])) {

    if ($_SESSION['pagina'] == "Genero") {
        $genero = $_REQUEST['generos'];
        conexion::abrirBBDD();
        $peliculas = conexion::obtenerTodasPeliculas("genero", $genero);
        conexion::cerrarBBDD();
        $_SESSION['peliculas'] = $peliculas;
        header('Location: ./Vistas/Listar/ListarGenero.php');
    }
}

if (isset($_REQUEST['detalle'])) {
    $idDetalle = $_REQUEST['detalle'];
    echo $idDetalle;
}

if (isset($_REQUEST['aceptar_peli'])) {

    $idpelicula = "0";
    $nombre = $_REQUEST['titulo'];
    $direccion = $_REQUEST['direccion'];
    $produccion = $_REQUEST['produccion'];
    $guion = $_REQUEST['guion'];
    $musica = $_REQUEST['musica'];
    $pais = $_REQUEST['pais'];
    $ano = $_REQUEST['ano'];
    $estreno = $_REQUEST['estreno'];
    $duracion = $_REQUEST['duracion'];
    $idiomas = $_REQUEST['idiomas'];
    $productora = $_REQUEST['productora'];
    $distribucion = $_REQUEST['distribucion'];
    $presupuesto = $_REQUEST['presupuesto'];
    $recaudacion = $_REQUEST['recaudacion'];
    $argumento = $_REQUEST['argumento'];
    $generos = $_REQUEST['genero'];


    //declare variables
    $foto = $_FILES['imagefile']['tmp_name'];
    $nombre_archivo = $_FILES['imagefile']['name'];
    $foto = base64_encode(file_get_contents(addslashes($foto)));


    conexion::abrirBBDD();
    $p = conexion::existePelicula($nombre);
    conexion::cerrarBBDD();

    if ($p !== null) {
        //Existe el usuario mostramos mensaje de error que no existe el usuario
        unset($_REQUEST['genero']);
        header('Location: ./Vistas/Registro/registro_peli_error.php');
    } else {
        //Miramos si la lista de generos nos viene vacia
        if (!empty($generos)) {
            //No existe el usuario procedemos a insertarlo en la BBDD
            conexion::abrirBBDD();
            conexion::registrarPelicula($idpelicula, $nombre, $direccion, $produccion, $guion, $musica, $pais, $ano, $estreno, $duracion, $idiomas, $productora, $distribucion, $presupuesto, $recaudacion, $generos, $argumento, $nombre_archivo, $foto);
            conexion::cerrarBBDD();
            unset($_REQUEST['genero']);
            header('Location: ./Vistas/Registro/registro_correcto_peli.php');
        }
    }
}

if (isset($_REQUEST['genero'])) {
    $generos = null;
    conexion::abrirBBDD();
    $generos = conexion::obtenerGeneros();
    conexion::cerrarBBDD();
    $_SESSION['generos'] = $generos;
    header('Location: ./Vistas/Listar/ListarGenero.php');
}