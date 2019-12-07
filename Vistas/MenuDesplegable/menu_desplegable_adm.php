<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-lightgrey col-12">
        <div class="container-fluid">
            <a href="./index.php" class="navbar-brand">Home</a>
            <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbarContent" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item"><a href="./Vistas/Noticias/noticias.php" class="nav-link">Noticias</a></li>
                    <!-- Level one dropdown -->
                    <li class="nav-item dropdown">
                        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Listar Películas</a>
                        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="./Vistas/Listar/ListarNombre.php" class="dropdown-item">Por nombre</a></li>
                            <li><a href="./Vistas/Listar/ListarGenero.php" class="dropdown-item">Por genero</a></li>
                            <li><a href="./Vistas/Listar/ListarFechaEstreno.php" class="dropdown-item">Por fecha de estreno</a></li>
                            <!-- End Level two -->
                        </ul>
                    </li>
                    <!-- End Level one -->

                    <!-- Level one dropdown -->
                    <li class="nav-item dropdown">
                        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Área Películas</a>
                        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="./Vistas/Registro/registro_peli.php" class="dropdown-item">Añadir Película</a></li>
                            <li><a href="./Vistas/Administrador/valida_peliculas.php" class="dropdown-item">Validar Película</a></li>
                            <!-- End Level two -->
                        </ul>
                    </li>
                    
                    <!-- Level one dropdown -->
                    <li class="nav-item dropdown">
                        <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Administración</a>
                        <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="./Vistas/Administrador/crud_usuarios.php" class="dropdown-item">CRUD Usuarios</a></li>
                            <!-- End Level two -->
                        </ul>
                    </li>
                    <!-- End Level one -->
                </ul>
            </div>
        </div>
    </nav>
</div>