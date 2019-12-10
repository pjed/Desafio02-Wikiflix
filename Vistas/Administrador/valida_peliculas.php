<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../../Vistas/auxiliar/Pelicula.php';
include '../../Vistas/auxiliar/Persona.php';
session_start();
include '../Registro/cabecera_registro_solo_logo.php';
?>

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
                $operacion = "";
                $("#validar").click(function () {
                    $operacion = "Validar";
                });

                $("#modificar").click(function () {
                    $operacion = "Modificar";
                });

                $("#eliminar").click(function () {
                    $operacion = "Eliminar";
                });

                $("tbody tr").click(function () {
                    $('.selected').removeClass('selected');
                    $(this).addClass("selected");
                    $id = $('.id', this).html();
                    $nombre = $('#nombre', this).val();
                    $direccion = $('#direccion', this).val();
                    $produccion = $('#produccion', this).val();
                    $guion = $('#guion', this).val();
                    $musica = $('#musica', this).val();
                    $estreno = $('#estreno', this).val();

                    $.ajax({
                        data: {"idpelicula": $id, "operacion": $operacion, "nombre": $nombre, "direccion": $direccion, "produccion": $produccion, "guion": $guion, "musica": $musica, "estreno": $estreno}, //datos json recogidos del formulario formu
                        type: "POST", // método de envío de datos
                        url: "../auxiliar/servidor_validacion.php", //código a ejecutar en el servidor
                        success: function (respuesta) {
                            var variable = JSON.parse(respuesta); //conversión a json de los datos de respuesta
//                            if (variable !== null) {
//                                $("#titulo").html(variable[0].nombre);
//                                $("#direccion").html(variable[0].direccion);
//                                $("#produccion").html(variable[0].produccion);
//                                $("#guion").html(variable[0].guion);
//                                $("#musica").html(variable[0].musica);
//                                $("#pais").html(variable[0].pais);
//                                $("#ano").html(variable[0].ano);
//                                $("#estreno").html(variable[0].estreno);
//                                $("#duracion").html(variable[0].duracion);
//                                $("#idiomas").html(variable[0].idiomas);
//                                $("#productora").html(variable[0].productora);
//                                $("#distribucion").html(variable[0].distribucion);
//                                $("#presupuesto").html(variable[0].presupuesto);
//                                $("#recaudacion").html(variable[0].recaudacion);
//                                $("#argumento").html(variable[0].argumento);
//                                $("#foto").attr('src', 'data:image/png;base64,' + variable[0].foto);
//                                if (variable[1].puntuacion != "0") {
//                                    $("#puntos").val(variable[1].puntuacion);
//                                    $('#puntos').attr('disabled', true);
//                                } else {
//                                    $("#puntos").val("0");
//                                    $('#puntos').prop("disabled", false);
//                                }
//                                $("#media_pelicula").html(variable[2].media);
//                            } else {
//                                alert("Se ha producido un error de ajax");
//                            }
                        }
                    });

                });
            });
        </script>

    </head>
    <body class="background">
        <div class="container-fluid">
            <div class="panel_blanco_bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Área Películas</li>
                        <li class="breadcrumb-item active" aria-current="page">Validar Película</li>
                    </ol>
                </nav>
            </div>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <div class="panel_negro">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-10">
                        <form name="frmValidar" action="../../controlador_admin.php" method="POST">
                            <div class="row centrado">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-danger" name="ver" id="ver" value="Ver peliculas sin validar">    
                                </div>
                            </div>
                            <br>
                            <div class="row centrado">
                                <div class="col-12">

                                    <?php
                                    if (isset($_SESSION['pelis_sin_validar'])) {
                                        $validaciones = $_SESSION['pelis_sin_validar'];
                                        ?>
                                        <table class="table-responsive" id="tabla">
                                            <thead>
                                                <tr>
                                                    <th class="blanco" scope="col"></th>
                                                    <th class="blanco" scope="col"></th>
                                                    <th class="blanco" scope="col"></th>
                                                    <th class="blanco" scope="col" hidden>ID</th>
                                                    <th class="blanco" scope="col">Nombre</th>
                                                    <th class="blanco" scope="col">Direccion</th>
                                                    <th class="blanco" scope="col">Produccion</th>
                                                    <th class="blanco" scope="col">Guion</th>
                                                    <th class="blanco" scope="col">Musica</th>
                                                    <th class="blanco" scope="col">Estreno</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($validaciones as $pelicula) {
                                                    ?>
                                                    <tr>
                                                        <td class="validar"><button type="button" id="validar" name="validar" class="btn btn-danger validar" name="validar" id="validar"><span class="glyphicon glyphicon-ok validar"></span></button></td>
                                                        <td class="modificar"><button type="button" id="modificar" name="modificar" class="btn btn-danger validar"><span class="glyphicon glyphicon-pencil validar"></span></button></td>
                                                        <td class="eliminar"><button type="button" id="eliminar" name="eliminar" class="btn btn-danger validar"><span class="glyphicon glyphicon glyphicon-trash validar"></span></button></td>
                                                        <td hidden class="id"><?php echo $pelicula->getId_Pelicula() ?></td>
                                                        <td class="nombre"><input type="text" style="width: 100%;" class="texto_centrado validar" id="nombre" name="nombre" value="<?php echo $pelicula->getNombre() ?>"></td>
                                                        <td class="direccion"><input type="text" style="width: 100%;" class="texto_centrado validar" id="direccion" name="direccion" value="<?php echo $pelicula->getDireccion() ?>"></td>
                                                        <td class="produccion"><input type="text" style="width: 100%;" class="texto_centrado validar" id="produccion" name="produccion" value="<?php echo $pelicula->getProduccion() ?>"></td>
                                                        <td class="guion"><input type="text" style="width: 100%;" class="texto_centrado validar" id="guion" name="guion" value="<?php echo $pelicula->getGuion() ?>"></td>
                                                        <td class="musica"><input type="text" style="width: 100%;" class="texto_centrado validar" id="musica" name="musica" value="<?php echo $pelicula->getMusica() ?>"></td>
                                                        <td class="estreno"><input type="text" style="width: 100%;" class="texto_centrado validar" id="estreno" name="estreno" value="<?php echo $pelicula->getEstreno() ?>"></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row centrado">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-danger" name="volver" id="volver" value="Volver al index">  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
    <?php
    include '../Footers_iniciados/footer1.php';
    ?>
    <?php
    include '../Footers/footer2.php';
    ?>
</html>
