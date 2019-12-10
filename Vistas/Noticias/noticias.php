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
        <link rel="stylesheet" href="../../css/bootstrap.min.css">

        <!-- MyCSS -->
        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/menu_bootstrap.css">


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>


        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    </head>
    <body class="background_listado">

        <div class="container-fluid">
            <?php
            include '../../Vistas/auxiliar/Noticia.php';
            include '../../Vistas/auxiliar/Persona.php';
            session_start();
            ob_start();


            //MOSTRAR MENU - NO REGISTRADOS
            include '../../Vistas/Headers/header.php';
            include '../../Vistas/Headers/cabecera_vacia.php';
//                include '../../Vistas/MenuDesplegable/menu_desplegable_no_registro.php';
            ?>
            <!--Miga de pan que marca el home-->
            <br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Noticias</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-12">             
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="col-8 panel_blanco centrado">
                            <form name="frmNoticias" action="../../controlador.php" method="POST">
                                <input type="submit" class="btn btn-danger" id="noticias" name="noticias" value="Ver">
                                <br>
                                <?php
                                if (isset($_SESSION['noticias'])) {

                                    $noticias = $_SESSION['noticias'];
                                    ?>
                                    <table class="table-responsive table" id="#validateTable">
                                        <?php
                                        foreach ($noticias as $noticia) {
                                            ?>
                                            <tr>
                                            <br>
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="row">
                                                        <div class="col-6 izquierda">
                                                            <span id="titulo"><?php echo $noticia->getFecha() ?></span>
                                                        </div>
                                                        <div class="col-6 derecha">
                                                            <span id="titulo"><?php echo $noticia->getUsuario_usuario() ?></span>
                                                        </div>
                                                    </div>

                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <span id="titulo"><?php echo $noticia->getTitulo() ?></span><br>
                                                    <?php
                                                    if ($noticia->getFoto() != null) {
                                                        echo '<img id="foto" class="imagen_noticias" src="data:image/jpg;base64,' . $noticia->getFoto() . '"/><br>';
                                                    } else {
                                                        echo '<img id="foto" class="imagen_noticias" src="../../img/sin_foto.jpg"/><br>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center ">
                                                <div class="col-6"> 
                                                    <br>
                                                    <span id="descripcion" class="texto_centrado"><?php echo $noticia->getDescripcion() ?></span>
                                                </div>
                                            </div>
                                            </tr>
                                            <hr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                }
                                ?>
                                <input type="submit" class="btn btn-danger" id="volver" name="volver" value="Volver">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </body>
    <?php
    if (!isset($_SESSION['usuario'])) {
        include '../Footers_iniciados/footer_noregistro.php';
    } else {
        include '../Footers_iniciados/footer1.php';
    }
    ?>
    <?php
    include '../../Vistas/Footers/footer2.php';
    ?>
</html>
