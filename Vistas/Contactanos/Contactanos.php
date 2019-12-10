<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../../Vistas/auxiliar/Persona.php';
session_start();
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
    </head>
    <body>
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
        }
        ?>

        <div class="container-fluid">
            <?php
            include '../Registro/cabecera_registro.php';
            ?>
            <div class="panel_blanco_bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contactanos</li>
                    </ol>
                </nav>
            </div>

            <div class="panel_blanco">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-8">

                        <h3 class="centrado">Contactanos</h3>
                        <br>
                        <div class="panel_blanco">
                            <?php
                            if (isset($_SESSION['respuesta'])) {
                                $respuesta = $_SESSION['respuesta'];
                                ?>
                                <div class="col-12 centrado">
                                    <span><?php echo $respuesta ?></span><br><br>
                                    <a href="../../index.php"><input type="button" class="btn btn-danger" value="Ir a index"></a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <form name="contactform" method="post" action="../../controlador.php">
                                    <table class="table-responsive" width="450px">
                                        <tr>
                                            <td valign="top">
                                                <label for="first_name">Nombre *</label>
                                            </td>
                                            <td valign="top">
                                                <input  type="text" name="first_name" maxlength="50" size="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <label for="last_name">Apellidos *</label>
                                            </td>
                                            <td valign="top">
                                                <input  type="text" name="last_name" maxlength="50" size="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <label for="email">Email *</label>
                                            </td>
                                            <td valign="top">
                                                <input  type="text" name="email" maxlength="80" size="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <label for="telephone">Telefono</label>
                                            </td>
                                            <td valign="top">
                                                <input  type="text" name="telephone" maxlength="30" size="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                <label for="comments">Comentarios *</label>
                                            </td>
                                            <td valign="top">
                                                <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align:center">
                                                <input type="submit" value="Enviar"> 
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                            }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </body>
            <?php
            include '../Footers_iniciados/footer1.php';
            ?>
            <?php
            include '../Footers/footer2.php';
            ?>
</html>
