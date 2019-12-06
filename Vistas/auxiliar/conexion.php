<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author daw201
 */
include './Vistas/auxiliar/constantes.php';
include './Vistas/auxiliar/Persona.php';
include './Vistas/auxiliar/Pelicula.php';
include './Vistas/auxiliar/Genero.php';
include './Vistas/auxiliar/Valoracion.php';

class conexion {

    private static $conexion = null;

    public static function abrirBBDD() {
        $url = constantes::url;
        $usu = constantes::usu;
        $pass = constantes::pass;
        $bbdd = constantes::bbdd;
        conexion::$conexion = mysqli_connect($url, $usu, $pass, $bbdd);

        //print "Conexión realizada de forma procedimental: " . mysqli_get_server_info($conexion) . "<br/>";

        if (mysqli_connect_errno(conexion::$conexion)) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();
        }
    }

    public static function existeUsuarioEmail($email) {
        $query = "select * 
                    from wikiflix.rol as r, wikiflix.rol_usuario as ru, wikiflix.usuario as u 
                    where r.idroles = ru.rol_idroles and ru.usuario_usuario = u.usuario and 
                    u.usuario=?";
        $stmt = conexion::$conexion->prepare($query);
        $stmt->bind_param("s", $email);

        $stmt->execute();

        /* Ejecución de la sentencia. */

        $resultado = $stmt->get_result();

        while ($fila = $resultado->fetch_assoc()) {
            $p = null;
            if ($fila != null) {
                $p = new Persona($fila['idroles'], $fila['descripcion'], $fila['idroles_id_roles'], $fila['usuario'], $fila['password'], $fila['nombre'], $fila['apellidos'], $fila['direccion'], $fila['telefono']);
            }
        }
        $stmt->close();

        return $p;
    }

    public static function existeUsuario($usu, $pass) {
        $query = "select * 
                    from wikiflix.rol as r, wikiflix.rol_usuario as ru, wikiflix.usuario as u 
                    where r.idroles = ru.rol_idroles and ru.usuario_usuario = u.usuario and 
                    u.usuario=? AND u.password=?;";
        $stmt = conexion::$conexion->prepare($query);
        $stmt->bind_param("ss", $usu, $pass);

        $stmt->execute();

        /* Ejecución de la sentencia. */

        $resultado = $stmt->get_result();

        $usuario = null;

        while ($fila = $resultado->fetch_assoc()) {
            $p = null;
            if ($fila != null) {
                $p = new Persona($fila['idroles'], $fila['descripcion'], $fila['idroles_id_roles'], $fila['usuario'], $fila['password'], $fila['nombre'], $fila['apellidos'], $fila['direccion'], $fila['telefono']);
            }
            $usuario[] = $p;
        }
        $stmt->close();

        return $usuario;
    }

    public static function existePelicula($titulo) {
        $query = "select distinct * 
                    from pelicula 
                    where nombre = ?";
        $stmt = conexion::$conexion->prepare($query);
        $stmt->bind_param('s', $titulo);

        $stmt->execute();

        /* Ejecución de la sentencia. */

        $resultado = $stmt->get_result();

        $pelicula = null;

        while ($fila = $resultado->fetch_assoc()) {
            $p = null;
            if ($fila != null) {
                $p = new Pelicula($fila['idpelicula'], $fila['nombre'], $fila['direccion'], $fila['produccion'], $fila['guion'], $fila['musica'], $fila['pais'], $fila['ano'], $fila['estreno'], $fila['duracion'], $fila['idiomas'], $fila['productora'], $fila['distribucion'], $fila['presupuesto'], $fila['recaudacion'], $fila['generos_idgeneros'], $fila['argumento'], $fila['nombre_foto'], $fila['tipo_foto'], $fila['foto']);
            }
            $pelicula = $p;
        }
        $stmt->close();

        return $pelicula;
    }

    public static function obtenerTodosUsuarios() {
        $usuarios = null;
        $consulta = "select * "
                . "from BBDD_Buscaminas.rol as r, BBDD_Buscaminas.rol_usuario as ru, BBDD_Buscaminas.usuario as u "
                . "where r.idROL = ru.idROL_USUARIO and ru.DNI_USUARIO = u.DNI";

        if ($stmt = conexion::$conexion->prepare($consulta)) {
            $stmt->execute();
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $p = new Persona($fila['DNI'], $fila['NOMBRE'], $fila['APELLIDOS'], $fila['USUARIO'], $fila['PASS'], $fila['N_PARTIDAS'], $fila['GANADAS'], $fila['PERDIDAS'], $fila['idROL'], $fila['DESCRIPCION']);
                $usuarios[] = $p;
            }
        }

        return $usuarios;
    }

    public static function obtenerGeneros() {
        $generos = null;
        $consulta = "select * from generos";

        if ($stmt = conexion::$conexion->prepare($consulta)) {
            $stmt->execute();
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $g = new Genero($fila['idgeneros'], $fila['descripcion']);
                $generos[] = $g;
            }
        }

        return $generos;
    }

    public static function cerrarBBDD() {
        conexion::$conexion->close();
        //print "Conexión cerrada" . "<br />";
    }

    public static function registrarUsuario($idroles, $usuario, $password, $nombre, $apellidos, $direccion, $telefono) {
        $query = "INSERT INTO usuario (usuario, password, nombre, apellidos, direccion, telefono) VALUES (?,?,?,?,?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = conexion::$conexion->prepare($query);

        $stmt->bind_param("ssssss", $usuario, $password, $nombre, $apellidos, $direccion, $telefono);

        /* Ejecución de la sentencia. */
        $stmt->execute();

        //Insertamos los roles del usuario en este caso lo damos de alta como jugador rol 1 que es usuario registrado
        $query = "INSERT INTO rol_usuario (rol_idroles, usuario_usuario) VALUES (?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = conexion::$conexion->prepare($query);

        $idRol = $idroles;

        $stmt->bind_param("is", $idRol, $usuario);

        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);
    }
    
    public static function insertarValoracion($idpelicula, $email, $puntos){
        $query = "INSERT INTO puntuacion (idpelicula, usuario, puntuacion) VALUES (?,?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = conexion::$conexion->prepare($query);

        $stmt->bind_param("ssi", $idpelicula, $email, $puntos);

        /* Ejecución de la sentencia. */
        $stmt->execute();

        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);
        return true;
    }
    
    public static function comprobarValoracionPelicula($idpelicula, $email, $puntos){
        $query = "select * 
                    from puntuacion
                    where idpelicula = ? and usuario = ?";
        $stmt = conexion::$conexion->prepare($query);
        $stmt->bind_param("ss", $idpelicula, $email);

        $stmt->execute();

        /* Ejecución de la sentencia. */

        $resultado = $stmt->get_result();

        while ($fila = $resultado->fetch_assoc()) {
            $val = null;
            if ($fila != null) {
                $val = new Valoracion($fila['idpelicula'], $fila['usuario'], $fila['valoracion']);
            }
        }
        $stmt->close();

        return $val;
    }
   

    public static function registrarPelicula($idpelicula, $nombre, $direccion, $produccion, $guion, $musica, $pais, $ano, $estreno, $duracion, $idiomas, $productora, $distribucion, $presupuesto, $recaudacion, $generos, $argumento, $nombre_foto, $foto) {
                                             
//        $query = "INSERT INTO pelicula (idpelicula, nombre, direccion, produccion, guion, musica, pais, ano, estreno, duracion, idiomas, productora, distribucion, presupuesto, recaudacion, generos_idgeneros, argumento, nombre_foto, foto) "
//                . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
//        $stmt = conexion::$conexion->prepare($query);
//
//
//        $stmt->bind_param("isssssssssssssssssb", $idpelicula, $nombre, $direccion, $produccion, $guion, $musica, $pais, $ano, $estreno, $duracion, $idiomas, $productora, $distribucion, $presupuesto, $recaudacion, $selected, $argumento, $nombre_foto, $foto);
//
//        /* Ejecución de la sentencia. */
//        $stmt->execute();


        $query = "INSERT INTO pelicula (idpelicula, nombre, direccion, produccion, guion, musica, pais, ano, estreno, duracion, idiomas, productora, distribucion, presupuesto, recaudacion, argumento, nombre_foto, foto) "
                . "VALUES ('$idpelicula','$nombre','$direccion','$produccion','$guion','$musica','$pais','$ano','$estreno','$duracion','$idiomas','$productora','$distribucion','$presupuesto','$recaudacion','$argumento','$nombre_foto','$foto')"; //Estos parametros seran sustituidos mas adelante por valores.
        mysqli_query(conexion::$conexion, $query);



        //Que esta llena la lista de generos la recorremos y la guardamos en la 
        // variable generos
        foreach ($generos as $selected) {
            $queryID = "SELECT idpelicula FROM pelicula WHERE nombre = '".$nombre."'";
            $queryGenero = "INSERT INTO pelicula_genero (idpelicula, generos_idgeneros) "
                    . "VALUES ((".$queryID."),'$selected')"; //Estos parametros seran sustituidos mas adelante por valores.
            mysqli_query(conexion::$conexion, $queryGenero);
        }
    }

    public static function modificarUsuario($dni, $nombre, $apellidos, $usuario, $password) {
        $query = "UPDATE usuario SET NOMBRE=?, APELLIDOS=?, USUARIO=?, PASS=? WHERE DNI=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = conexion::$conexion->prepare($query);

        $n_partidas = '0';
        $ganadas = '0';
        $perdidas = '0';

        $stmt->bind_param("sssss", $nombre, $apellidos, $usuario, $password, $dni);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }

    public static function eliminarUsuario($dni) {
        $queryRol = "DELETE FROM BBDD_Buscaminas.rol_usuario WHERE DNI_USUARIO = ?";
        $queryUsuario = "DELETE FROM BBDD_Buscaminas.usuario WHERE DNI = ?";

        $stmt = conexion::$conexion->prepare($queryRol);

        $stmt->bind_param("s", $dni);

        /* Ejecución de la sentencia. */
        $stmt->execute();

        $stmt = conexion::$conexion->prepare($queryUsuario);

        $stmt->bind_param("s", $dni);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }

    public static function modificarRanking($num_partida, $ganadas, $perdidas, $dni) {
        $query = "UPDATE usuario SET N_PARTIDAS=?, GANADAS=?, PERDIDAS=? WHERE DNI=?"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = conexion::$conexion->prepare($query);

        $stmt->bind_param("iiis", $num_partida, $ganadas, $perdidas, $dni);

        /* Ejecución de la sentencia. */
        $stmt->execute();
    }

    public static function obtenerTodasPeliculas($tipo, $filtro) {
        $peliculas = null;

        if ($tipo == "estreno" && $filtro == "Todos") {
            $query = "select distinct p.idpelicula, p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
                        from pelicula as p";

            $stmt = conexion::$conexion->prepare($query);

            $stmt->execute();

            /* Ejecución de la sentencia. */

            $resultado = $stmt->get_result();
        }

        if ($tipo == "estreno" && $filtro != "Todos") {
            $query = "select distinct p.idpelicula, p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
                        from pelicula as p
                        where p.estreno = ?;";

            $stmt = conexion::$conexion->prepare($query);
            $stmt->bind_param("s", $filtro);

            $stmt->execute();

            /* Ejecución de la sentencia. */

            $resultado = $stmt->get_result();
        }




        if ($tipo == "letra" && $filtro != "Todas%") {

            $query = "select distinct p.idpelicula, p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
                        from pelicula as p
                        where p.nombre LIKE ?;";

            $stmt = conexion::$conexion->prepare($query);
            $stmt->bind_param("s", $filtro);

            $stmt->execute();

            /* Ejecución de la sentencia. */

            $resultado = $stmt->get_result();
        }

        if ($tipo == "letra" && $filtro == "Todas%") {
            $query = "select distinct p.idpelicula, p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
                        from pelicula as p;";

            $stmt = conexion::$conexion->prepare($query);
            $stmt->bind_param("s", $filtro);

            $stmt->execute();

            /* Ejecución de la sentencia. */

            $resultado = $stmt->get_result();
        }

        if ($tipo == "genero" && $filtro != "Todos") {

            $query = "select distinct p.idpelicula, p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
                        from pelicula as p, generos as g, pelicula_genero as pg
                        where p.idpelicula = pg.idpelicula and pg.generos_idgeneros = g.idgeneros and
                        g.descripcion = ?;";

            $stmt = conexion::$conexion->prepare($query);
            $stmt->bind_param("s", $filtro);

            $stmt->execute();

            /* Ejecución de la sentencia. */

            $resultado = $stmt->get_result();
        }


//        if ($tipo == "genero" && $filtro !="Todos") {
//
//            $query = "select distinct p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
//                        from pelicula as p
//                        where p.estreno = ?;";
//
//            $stmt = conexion::$conexion->prepare($query);
//            $stmt->bind_param("s", $filtro);
//
//            $stmt->execute();
//
//            /* Ejecución de la sentencia. */
//
//            $resultado = $stmt->get_result();
//        }

        if ($tipo == "genero" && $filtro == "Todos") {
            $query = "select distinct p.idpelicula, p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
                        from pelicula as p";

            $stmt = conexion::$conexion->prepare($query);

            $stmt->execute();

            /* Ejecución de la sentencia. */

            $resultado = $stmt->get_result();
        }

        $peliculas = null;

        while ($fila = $resultado->fetch_assoc()) {
            $p = null;
            if ($fila != null) {
                $p = new Pelicula($fila['idpelicula'], $fila['nombre'], $fila['direccion'], $fila['produccion'], $fila['guion'], $fila['musica'], $fila['pais'], $fila['ano'], $fila['estreno'], $fila['duracion'], $fila['idiomas'], $fila['productora'], $fila['distribucion'], $fila['presupuesto'], $fila['recaudacion'], $fila['generos_idgeneros'], $fila['argumento'], $fila['nombre_foto'], $fila['tipo_foto'], $fila['foto']);
            }
            $peliculas[] = $p;
        }
        $stmt->close();

        return $peliculas;
    }

    //Retrieve image from database and display it on html webpage
    public static function displayImageFromDatabase() {
//use global keyword to declare conn inside a function
        global $conn;
        $sqlselectimageFromDb = "SELECT * FROM `imageuploadphpmysqlblob` ";
        $dataFromDb = mysqli_query($conn, $sqlselectimageFromDb);
        while ($row = mysqli_fetch_assoc($dataFromDb)) {
            echo '<img height="250px" width="250px" src="data:image/jpg;base64,' . $row['image'] . '"/>';
        }

        /* Listado general para la tabla
          select distinct p.foto, p.nombre, p.direccion, p.estreno, p.duracion
          from pelicula as p;
         */

        /* Listado especifico por pelicula especifica
          select p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.protagonistas, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
          from pelicula as p
          where p.idpelicula=2;
         */

        /* Listado de la a la z
          select distinct p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.protagonistas, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
          from pelicula as p
          where p.nombre LIKE 'T%';
         */

        /* Listado de las peliculas por generos
          select distinct p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.protagonistas, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
          from pelicula as p
          where p.generos_idgeneros = 2;
         */

        /* Listado de las peliculas por generos
          select distinct p.foto, p.argumento, p.nombre, p.direccion, p.produccion, p.guion, p.musica, p.protagonistas, p.pais, p.ano, p.estreno, p.duracion, p.idiomas, p.productora, p.distribucion, p.recaudacion
          from pelicula as p
          where p.estreno LIKE '%2019%';
         */
    }

}
