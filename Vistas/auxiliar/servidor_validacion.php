
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idpelicula = $_REQUEST['idpelicula'];
$operacion = $_REQUEST['operacion'];

$nombre = $_REQUEST['nombre'];
$direccion = $_REQUEST['direccion'];
$produccion = $_REQUEST['produccion'];
$guion = $_REQUEST['guion'];
$musica = $_REQUEST['musica'];
$estreno = $_REQUEST['estreno'];

include '../../Vistas/auxiliar/constantes.php';
// Create connection
$conn = new mysqli(constantes::url, constantes::usu, constantes::pass, constantes::bbdd);
// Check connection
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

if (isset($idpelicula)) {

    if ($operacion == "Validar") {
        $query = "UPDATE pelicula SET activa=? WHERE idpelicula=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);

        $activa = '1';

        $stmt->bind_param("ii", $activa, $idpelicula);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }
    if ($operacion == "Modificar") {
        $query = "UPDATE pelicula SET nombre=?, direccion=?, produccion=?, guion=?, musica=?, estreno=? WHERE idpelicula=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);

        $stmt->bind_param("sssssss", $nombre, $direccion, $produccion, $guion, $musica, $estreno, $idpelicula);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }
    if ($operacion == "Eliminar") {
        //Borramos el genero de la pelicula seleccionada
        $query = "DELETE FROM pelicula_genero WHERE idpelicula=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);

        $stmt->bind_param("i", $idpelicula);

        /* Ejecución de la sentencia. */
        $stmt->execute();

        //Borramos todas las puntuaciones si tuviera
        $query = "delete from puntuacion where idpelicula=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);

        $stmt->bind_param("i", $idpelicula);

        /* Ejecución de la sentencia. */
        $stmt->execute();

        //Borramos la pelicula seleccionada
        $query = "DELETE FROM pelicula WHERE idpelicula=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);

        $stmt->bind_param("i", $idpelicula);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }



    $conn->close();

    $hola = json_encode($responder); //string formateado como JSON,

    echo $hola; // respuesta a Javascript
}
?>