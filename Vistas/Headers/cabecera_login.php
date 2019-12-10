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
            <div class="col-xl-3 col-lg-3 col-sm-3"> 
                <a href="./index.php"><embed src="img/wikiflix.svg" class="logo_pagina mx-auto d-block"> </a>
            </div>

            <div class="col-xl-6 col-lg-5 col-sm-5"> 
            </div>  

            <div id="registrado" class="col-xl-3 col-lg-4 col-sm-4">  
                <div class="container d-flex h-100">
                    <div class="row justify-content-center align-self-center">
                        <form name="frmLogout" action="./controlador.php" method="POST">
                            <input type="submit" id="cerrar" name="cerrar" value="Cerrar" class="btn btn btn-danger mx-auto d-block" data-toggle="tooltip" data-placement="top" title="Cerrar sesión">
                        </form>
                    </div>  
                </div>
            </div>  
        </div>  
    </div>  
</div>  

