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
    </head>
    <body class="background">
        <div class="container-fluid">
            <?php
            include '../Registro/cabecera_registro_solo_logo.php';
            ?>
            <div class="panel_blanco_bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Área Películas</li>
                        <li class="breadcrumb-item active" aria-current="page">Añadir Película</li>
                    </ol>
                </nav>
            </div>

            <div class="panel_negro">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-10">
                        <form name="frmRegistro" action="../../controlador.php" method="POST" enctype="multipart/form-data">
                            <h3 class="white centrado">Registrar nueva película</h3>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Título: </span>
                                        </div>
                                        <input type="text" class="form-control" id="titulo" name="titulo" required placeholder="Titulo" aria-label="Titulo" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Dirección: </span>
                                        </div>
                                        <input type="text" class="form-control" id="direccion" name="direccion" required placeholder="Dirección" aria-label="Contraseña" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Producción: </span>
                                        </div>
                                        <input type="text" class="form-control" id="produccion" name="produccion" required placeholder="Producción" aria-label="Producción" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Guión: </span>
                                        </div>
                                        <input type="text" class="form-control" id="guion" name="guion" required placeholder="Guión" aria-label="Guión" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Música: </span>
                                        </div>
                                        <input type="text" class="form-control" id="musica" name="musica" required placeholder="Música" aria-label="Música" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">País: </span>
                                        </div>
                                        <input type="text" class="form-control" id="pais" name="pais" required placeholder="País" aria-label="País" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Año: </span>
                                        </div>
                                        <select name="ano" class="browser-default custom-select">
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Estreno: </span>
                                        </div>
                                        <select name="estreno" class="browser-default custom-select">
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select> 
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Duración: </span>
                                        </div>
                                        <input type="number" class="form-control" value="0" id="duracion" name="duracion" required placeholder="Duración" aria-label="Duración" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Idioma: </span>
                                        </div>
                                        <input type="text" class="form-control" id="idiomas" name="idiomas" required placeholder="Idioma" aria-label="Idiomas" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Productora: </span>
                                        </div>
                                        <input type="text" class="form-control" id="productora" name="productora" required placeholder="Productora" aria-label="Productora" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Distribución: </span>
                                        </div>
                                        <input type="text" class="form-control" id="distribucion" name="distribucion" required placeholder="Distribución" aria-label="Distribución" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Presupuesto: </span>
                                        </div>
                                        <input type="number" class="form-control" id="presupuesto" name="presupuesto" value="0" required placeholder="Presupuesto" aria-label="Presupuesto" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Recaudación: </span>
                                        </div>
                                        <input type="number" class="form-control" id="recaudacion" name="recaudacion" value="0" required placeholder="Recaudación" aria-label="Recaudación" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="panel_blanco">
                                        <span>Elige un género como mínimo</span>
                                        <div class="row align-items-center">
                                            <div class="row">
                                                <div class="col-2 checkboxes text-center">
                                                    <div class="form-check" >
                                                        <input class="form-check-input" required checked type="checkbox" value="1" id="genero" name="genero[]">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Gangsters
                                                        </label>
                                                        <input class="form-check-input" type="checkbox" value="3" id="genero" name="genero[]">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Acción
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="2" id="genero" name="genero[]">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Comedia
                                                        </label>
                                                        <input class="form-check-input" type="checkbox" value="4" id="genero" name="genero[]">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Aventuras
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-file">
                                        <label class="custom-file-label" name="imagefile" for="imagen">Imagen: </label>
                                        <input type="file" name="imagefile" class="custom-file-input">
                                    </div>

                                    <script>
                                        // Add the following code if you want the name of the file appear on select
                                        $(".custom-file-input").on("change", function () {
                                            var fileName = $(this).val().split("\\").pop();
                                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                        });
                                    </script>
                                    <br><br><br>
                                    <div class="form-group">
                                        <label for="comment" class="blanco">Argumento:</label>
                                        <textarea class="form-control" required rows="5" id="argumento" name="argumento"></textarea>
                                    </div>
                                </div>

                                <div class="container-fluid"> 
                                    <div class="row align-items-center">
                                        <div class="col text-center">
                                            <a href="../../index.php"><button type="button" class="btn btn-danger">Volver</button></a>
                                        </div>
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-danger" id="aceptar_peli" name="aceptar_peli">Registrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
