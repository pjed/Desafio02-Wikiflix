
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idpelicula = $_REQUEST['idpelicula'];
include '../../Vistas/auxiliar/constantes.php';
// Create connection
$conn = new mysqli(constantes::url, constantes::usu, constantes::pass, constantes::bbdd);
// Check connection
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$sql = "SELECT idpelicula, nombre, direccion, produccion, guion, musica, pais, ano, estreno, duracion, idiomas, productora, distribucion, presupuesto, recaudacion, argumento, foto "
        . " from pelicula "
        . "where idpelicula = " . $idpelicula . ";";
$result = $conn->query($sql);

$i = 0;
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $responder[$i] = $row;
        $i++;
    }
}
$conn->close();

$hola = json_encode($responder); //string formateado como JSON,

echo $hola; // respuesta a Javascript
?>