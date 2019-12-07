
<?php

include '../../Vistas/auxiliar/Codificar.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$operacion = $_REQUEST['operacion'];
$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$direccion = $_REQUEST['direccion'];
$telefono = $_REQUEST['telefono'];
$rol = $_REQUEST['rol'];

include '../../Vistas/auxiliar/constantes.php';
// Create connection
$conn = new mysqli(constantes::url, constantes::usu, constantes::pass, constantes::bbdd);
// Check connection
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

if (isset($usuario)) {

    if ($operacion == "Validar") {
 
        //Insertamos el nuevo usuario
        $query = "INSERT INTO usuario VALUES(usuario, password, nombre, apellidos, direccion, telefono) "
                . " VALUES (?,?,?,?,?,?)";

        
        $passcodi = Codificar::codificarCadena($password);
        
        $stmt->bind_param("ssssss", $usuario, $passcodi, $nombre, $apellidos, $direccion, $telefono);

        /* Ejecución de la sentencia. */
        $stmt->execute();
        
        //insertamos el rol del usuario en este caso registrado
        $query = "INSERT INTO rol_usuario VALUES(rol_idroles, usuario_usuario) "
                . " VALUES (?,?)";

        $idrol = 1;
        
        $stmt->bind_param("is", $idrol, $usuario);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }
    if ($operacion == "Modificar") {
        $query = "UPDATE usuario SET password=?, nombre=?, apellidos=?, telefono=? WHERE usuario=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);
        $passcodi = Codificar::codificarCadena($password);
        $stmt->bind_param("sssss", $passcodi, $nombre, $apellidos, $telefono, $usuario);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }
    if ($operacion == "Eliminar") {
        //Borramos el rol del usuario en la tabla rol_usuario
        $query = "DELETE FROM rol_usuario WHERE usuario_usuario=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);

        $stmt->bind_param("s", $usuario);

        /* Ejecución de la sentencia. */
        $stmt->execute();

        //Borramos el usuario de la tabla usuarios
        $query = "delete from usuario where usuario=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = $conn->prepare($query);

        $stmt->bind_param("s", $usuario);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }



    $conn->close();

    $hola = json_encode($responder); //string formateado como JSON,

    echo $hola; // respuesta a Javascript
}
?>