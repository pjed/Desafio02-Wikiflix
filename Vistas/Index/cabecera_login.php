<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row"> 
    <div class="col-12 black"> 
        <div class="row"> 
            <div class="col-2"> 
                <a href="./index.php"><img src="img/wikiflix.svg" class="logo_pagina mx-auto d-block"> </a>
            </div>

            <div class="col-8">  
            </div>  

            <div id="registrado" class="col-2">  
                <div class="container d-flex h-100">
                    <div class="row justify-content-center align-self-center">
                        <form name="frmLogout" action="./controlador.php" method="POST">
                            <input type="submit" id="cerrar" name="cerrar" value="Cerrar Sesión" class="btn btn btn-danger mx-auto d-block">
                        </form>
                    </div>  
                </div>
            </div>  
        </div>  
    </div>  
</div>  

