<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">

        <!-- MyCSS -->
        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/menu_bootstrap.css">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>

        <script>
            $(function () {
                $("tbody tr").click(function () {
                    $('.selected').removeClass('selected');
                    $(this).addClass("selected");
                    $id = $('.id', this).html();


                    $.ajax({
                        data: {"idpelicula": $id}, //datos json recogidos del formulario formu
                        type: "POST", // método de envío de datos
                        url: "../auxiliar/servidor_detalle.php", //código a ejecutar en el servidor
                        success: function (respuesta) {
                            var variable = JSON.parse(respuesta); //conversión a json de los datos de respuesta
                            if (variable !== null) {
                                $("#titulo").html(variable[0].nombre);
                                $("#direccion").html(variable[0].direccion);
                                $("#produccion").html(variable[0].produccion);
                                $("#guion").html(variable[0].guion);
                                $("#musica").html(variable[0].musica);
                                $("#pais").html(variable[0].pais);
                                $("#ano").html(variable[0].ano);
                                $("#estreno").html(variable[0].estreno);
                                $("#duracion").html(variable[0].duracion);
                                $("#idiomas").html(variable[0].idiomas);
                                $("#productora").html(variable[0].productora);
                                $("#distribucion").html(variable[0].distribucion);
                                $("#presupuesto").html(variable[0].presupuesto);
                                $("#recaudacion").html(variable[0].recaudacion);
                                $("#argumento").html(variable[0].argumento);
                                $("#foto").attr('src', 'data:image/png;base64,' + variable[0].foto);


                            }
                        }
                    });
                });
            });
        </script>
    </head>
    <body class="background_listado">
        <div class="container-fluid">
            <?php
            include '../../Vistas/auxiliar/Persona.php';
            include '../../Vistas/auxiliar/Pelicula.php';
            include '../../Vistas/auxiliar/Genero.php';
            session_start();
            ob_start();

            $_SESSION['pagina'] = "Genero";
//            unset($_SESSION['peliculas']);

            if (isset($_SESSION['usuario'])) {
                $usuarios = $_SESSION['usuario'];

                $usuRegistrado = null;
                $usuAdmin = null;
                $index = 1;
                foreach ($usuarios as $fila) {
                    if ($index == 2) {
                        $usuAdmin = $fila;
                    } else {
                        $usuRegistrado = $fila;
                    }
                    $index++;
                }


                if (count($usuarios) == 2) {
                    include '../../Vistas/Headers/cabecera_vacia.php';
//                    include '../../Vistas/MenuDesplegable/menu_desplegable_adm.php';
                    // MOSTRAR MENU REGISTRADOS Y ADMINISTRADORES
                    echo '<title>Bienvenido ' . $usuAdmin->getNombre() . ' como rol ' . $usuAdmin->getDescripcion() . '</title>';
                } else {
                    include '../../Vistas/Headers/cabecera_vacia.php';
//                    include '../../Vistas/MenuDesplegable/menu_desplegable_registrados.php';
                    //MOSTRAR MENU REGISTRADOS
                    echo '<title>Bienvenido ' . $usuRegistrado->getNombre() . ' como rol ' . $usuRegistrado->getDescripcion() . '</title>';
                }
            } else {
                //MOSTRAR MENU - NO REGISTRADOS
                include '../../Vistas/auxiliar/header.php';
                include '../../Vistas/Headers/cabecera_vacia.php';
//                include '../../Vistas/MenuDesplegable/menu_desplegable_no_registro.php';
            }
            ?>
            <!--Miga de pan-->
            <div class="row container-fluid">
                <div class="col-12">
                    <br>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Listar Género</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-12">
                            <form name="frmListarGenero" action="../../controlador.php" method="POST">
                                <div class="panel_blanco_filtro">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="centrado"><input type="submit" class="btn btn-danger" name="genero" id="genero" value="Ver Generos"></div>
                                            <br>
                                            <?php
                                            if (isset($_SESSION['generos'])) {
                                                $generos = $_SESSION['generos'];
                                                $generos[] = new Genero("Todos", "Todos");
                                                foreach ($generos as $genero) {
                                                    echo '<input type="submit" class="btn btn-danger" name="generos" id="generos" value="' . $genero->getDescripcion() . '" >  ';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel_blanco">
                                    <br>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="row">
                                            <br>
                                            <?php
                                            if (isset($_SESSION['peliculas'])) {
                                                $peliculas = $_SESSION['peliculas'];
                                                $indice = 0;
                                                ?>

                                                <table class="table table-striped" id="tabla">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" hidden>ID</th>
                                                            <th scope="col">FOTO</th>
                                                            <th scope="col">TITULO</th>
                                                            <th scope="col">DIRECCION</th>
                                                            <th scope="col">ESTRENO</th>
                                                            <th scope="col">DURACION</th>
                                                            <th scope="col">VER</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($peliculas as $pelicula) {
                                                            $indice++;
                                                            ?>
                                                            <tr>
                                                                <td class="id" hidden><?php echo $pelicula->getId_pelicula() ?></td>
                                                                <td><?php echo '<img class="imagen" src="data:image/jpg;base64,' . $pelicula->getFoto() . '"/>'; ?></td>
                                                                <td><?php echo $pelicula->getNombre() ?></td>
                                                                <td><?php echo $pelicula->getDireccion() ?></td>
                                                                <td><?php echo $pelicula->getEstreno() ?></td>
                                                                <td><?php echo $pelicula->getDuracion() ?></td>
                                                                <td>
                                                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                                                                    <button type="button" class="btn btn-danger" id="detalle" name="detalle" data-toggle="modal" data-target="#exampleModal">
                                                                        <span class="glyphicon glyphicon-search"></span>
                                                                </td>

                                                                <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="modal-title" id="exampleModalLabel"><h5>Ficha de la película</h5></div>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <?php echo '<img id="foto" class="imagen_grande" src="data:image/jpg;base64,' . $pelicula->getFoto() . '"/>'; ?><br>
                                                                            </div>
                                                                            <div class="col-8">
                                                                                <span id="argumento"></span><br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-6 derecha"><br>
                                                                                <span>Titulo: </span><br>
                                                                                <span>Direccion: </span><br>
                                                                                <span>Produccion: </span><br>
                                                                                <span>Guion: </span><br>
                                                                                <span>Musica: </span><br>
                                                                                <span>Pais: </span><br>
                                                                                <span>Año: </span><br>
                                                                                <span>Estreno: </span><br>
                                                                                <span>Duracion: </span><br>
                                                                                <span>Idioma: </span><br>
                                                                                <span>Productora: </span><br>
                                                                                <span>Distribucion: </span><br>
                                                                                <span>Recaudacion: </span><br>
                                                                            </div>
                                                                            <div class="col-6 izquierda"><br>
                                                                                <span id="titulo"></span><br>
                                                                                <span id="direccion"></span><br>
                                                                                <span id="produccion"></span><br>
                                                                                <span id="guion"></span><br>
                                                                                <span id="musica"></span><br>
                                                                                <span id="pais"></span><br>
                                                                                <span id="ano"></span><br>
                                                                                <span id="estreno"></span><br>
                                                                                <span id="duracion"></span><br>
                                                                                <span id="idiomas"></span><br>
                                                                                <span id="productora"></span><br>
                                                                                <span id="distribucion"></span><br>
                                                                                <span id="recaudacion"></span><br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>    
                                                    <h1>No hay ninguna pelicula con los criterios seleccionados</h1>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include '../Footers_iniciados/footer1.php';
            ?>
            <?php
            include '../Footers/footer2.php';
            ?>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </body>
</html>
