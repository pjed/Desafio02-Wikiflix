<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- MyCSS -->
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/menu_bootstrap.css">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
//            if (sessionStorage.getItem("sonando") == null) {
//                window.open("audio.php", "_blank");
//                sessionStorage.setItem("sonando", true);
//            }
        </script>
    </head>
    <body>

        <?php
        include './Vistas/auxiliar/Persona.php';
        session_start();
        ob_start();

        unset($_SESSION['peliculas']);
        unset($_SESSION['noticias']);
        unset($_SESSION['usuarios_crud']);
        ?>

        <?php
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
                include './Vistas/Headers/cabecera_login.php';
                include './Vistas/MenuDesplegable/menu_desplegable_adm.php';
                // MOSTRAR MENU REGISTRADOS Y ADMINISTRADORES
                echo '<title>Bienvenido ' . $usuAdmin->getNombre() . ' como rol ' . $usuAdmin->getDescripcion() . '</title>';
            } else {
                include './Vistas/Headers/cabecera_login.php';
                include './Vistas/MenuDesplegable/menu_desplegable_registrados.php';
                //MOSTRAR MENU REGISTRADOS
                echo '<title>Bienvenido ' . $usuRegistrado->getNombre() . ' como rol ' . $usuRegistrado->getDescripcion() . '</title>';
            }
        } else {
            //MOSTRAR MENU - NO REGISTRADOS
            include './Vistas/Headers/header.php';
            include './Vistas/Headers/cabecera.php';
            include './Vistas/MenuDesplegable/menu_desplegable_no_registro.php';
        }
        ?>
        <!--Miga de pan que marca el home-->
        <nav aria-label="breadcrumb" hidden>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>

        <div class="container-fluid">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-xl-12 col-md-10 col-sm-8 contenido">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <br>
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                            <li data-target="#demo" data-slide-to="3"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-interval="5000">
                                <img src="img/carrousel/1.png" class="background_carrousel" alt="Resumen">
                                <div class="carousel-caption">
                                    <h3>Novedades Diciembre</h3>
                                    <p>Witcher, El Irlandés y muchos más</p>
                                </div>
                            </div>
                            <div class="carousel-item" data-interval="3000">
                                <img src="img/carrousel/2.jpg" class="background_carrousel" alt="The Witcher">
                                <div class="carousel-caption">
                                    <h3>Witcher</h3>
                                    <p>Witcher estreno finales Diciembre 2019</p>
                                </div>
                            </div>
                            <div class="carousel-item" data-interval="3000">
                                <img src="img/carrousel/3.jpg" class="background_carrousel" alt="Diciembre">
                                <div class="carousel-caption">
                                    <h3>Netflix</h3>
                                    <p>Tu lugar de entretenimiento</p>
                                </div>
                            </div>
                            <div class="carousel-item" data-interval="3000">
                                <img src="img/carrousel/4.jpg" class="background_carrousel" alt="El Irlandes">
                                <div class="carousel-caption">
                                    <h3>El Irlandés</h3>
                                    <p>La familia te espera ...</p>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                    <p>WikiFlix es tu wiki de peliculas, series y documentales de Netflix.<br><br>

                        Queremos que sea parte de ti, actualizada cada día por la comunidad de cinéfilos y seriéfilos.<br><br>

                        En ella puedes encontrar todo el catálogo de Netflix organizado por Categorías, Listado alfabeticamente de la A a la Z con su valoración por los usuarios<br><br>

                        Esperamos que te involucres para formar la wiki más grande de Internet.


                        Te esperamos

                    <div class="row">
                        <div class="col-12">
                            <img src="img/gif/gif_animado.gif" class="gif_animado">
                        </div>
                    </div>

                    <br><br>© Wikiflix 2019</p>
                </div>
            </div>
        </div>
    </body>

    <?php
    if (!isset($_SESSION['usuario'])) {
        include 'Vistas/Footers/footer_noregistro.php';
    } else {
        include 'Vistas/Footers/footer1.php';
    }
    ?>
    <?php
    include 'Vistas/Footers/footer2.php';
    ?>
</html>
