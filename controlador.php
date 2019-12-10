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
    unset($_SESSION['usuario']);
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

if (isset($_REQUEST['numero'])) {

    $pagina = $_SESSION['pagina'];

    if ($pagina == "Nombre") {
        $numero = $_REQUEST['numero'] . '%';
        conexion::abrirBBDD();
        $peliculas = conexion::obtenerTodasPeliculas("letra", $numero);
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

    //Si el usuario elige una imagen
    if ($_FILES['imagefile']['tmp_name'] != null) {
        $foto = $_FILES['imagefile']['tmp_name'];
        $nombre_archivo = $_FILES['imagefile']['name'];
        $foto = base64_encode(file_get_contents(addslashes($foto)));
    }else{
        $foto = null;
        $nombre_archivo = null;
        $foto = null;
    }



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

if (isset($_REQUEST['cambiar'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];



    conexion::abrirBBDD();

    $usuario = conexion::existeUsuarioCambioPassword($email, $password);

    if ($usuario != null) {
        conexion::cambiarPassword($email, Codificar::codificarCadena($password));
    } else {
        header('Location: ./Vistas/Registro/error_usuario.php');
    }
    conexion::cerrarBBDD();

    header('Location: ./Vistas/Registro/iniciar_sesion.php');
}

if (isset($_REQUEST['perfil'])) {
    $email = $_REQUEST['email'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];

    conexion::abrirBBDD();
    conexion::modificarPerfil($email, $nombre, $apellidos, $direccion, $telefono);
    conexion::cerrarBBDD();

    unset($_SESSION['usuario']);
    header('Location: ./index.php');
}

if (isset($_REQUEST['noticias'])) {
    conexion::abrirBBDD();
    $noticias = conexion::obtenerTodasNoticias();
    conexion::cerrarBBDD();

    $_SESSION['noticias'] = $noticias;
    header('Location: ./Vistas/Noticias/noticias.php');
}


if (isset($_REQUEST['volver'])) {
    unset($_SESSION['noticias']);
    header('Location: ./index.php');
}

if (isset($_REQUEST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "espinosaduque@gmail.com";
    $email_subject = "Contacto";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if (!isset($_REQUEST['first_name']) ||
            !isset($_REQUEST['last_name']) ||
            !isset($_REQUEST['email']) ||
            !isset($_REQUEST['telephone']) ||
            !isset($_REQUEST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $first_name = $_REQUEST['first_name']; // required
    $last_name = $_REQUEST['last_name']; // required
    $email_from = $_REQUEST['email']; // required
    $telephone = $_REQUEST['telephone']; // not required
    $comments = $_REQUEST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email_from)) {
        $error_message .= 'La dirección de correo electrónico que ingresó no es válida.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $first_name)) {
        $error_message .= 'El nombre que ingresó no es válido.<br />';
    }

    if (!preg_match($string_exp, $last_name)) {
        $error_message .= 'El apellido que ingresó no es válido.<br />';
    }

    if (strlen($comments) < 2) {
        $error_message .= 'Los comentarios que ingresó no es válido.<br />';
    }

    if (strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Para más detalles abajo.\n\n";

    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "First Name: " . clean_string($first_name) . "\n";
    $email_message .= "Last Name: " . clean_string($last_name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "Telephone: " . clean_string($telephone) . "\n";
    $email_message .= "Comments: " . clean_string($comments) . "\n";

// create email headers
    $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    $respuesta = "Gracias por contactarnos. Nos pondremos en contacto con usted muy pronto.";
    $_SESSION['respuesta'] = $respuesta;

    header('Location: ./Vistas/Contactanos/Contactanos.php');
    ?>


    <?php

}