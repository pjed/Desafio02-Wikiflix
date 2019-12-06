
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idpelicula = $_REQUEST['idpelicula'];
$email = $_REQUEST['email'];
include '../../Vistas/auxiliar/constantes.php';
// Create connection
$conn = new mysqli(constantes::url, constantes::usu, constantes::pass, constantes::bbdd);
// Check connection
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

if (isset($idpelicula)) {
    //recojo la pelicula que ha seleccionado el usuario
    $sql = "SELECT p.idpelicula, nombre, direccion, produccion, guion, musica, pais, ano, estreno, duracion, idiomas, productora, distribucion, presupuesto, recaudacion, argumento, foto "
            . " from pelicula as p"
            . " where p.idpelicula = " . $idpelicula . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $responder[0] = $row;
            $i++;
        }
    }

// recojo la puntuacion del usuario que solicita 
    $sql = "SELECT pun.puntuacion    "
            . " from puntuacion as pun "
            . " where pun.idpelicula=" . $idpelicula . " and "
            . " pun.usuario = '" . $email . "';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $responder[1] = $row;
            $i++;
        }
    } else {
        $responder[1] = array("puntuacion" => 0);
    }

    //recojo la media que tiene la pelicula
    $sql = "SELECT AVG(pun.puntuacion) as media " .
            " from puntuacion as pun " .
            " where pun.idpelicula = " . $idpelicula . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            if ($row['media'] != null) {
                $responder[2] = $row;
            } else {
                $responder[2] = array("media" => 0);
            }
            $i++;
        }
    } else {
        $responder[2] = array("media" => 0);
    }
}

$conn->close();

$hola = json_encode($responder); //string formateado como JSON,

echo $hola; // respuesta a Javascript
?>