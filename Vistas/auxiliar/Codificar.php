<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Codificar
 *
 * @author DarkS
 */
class Codificar {

    public static function codificarCadena($cadena) {
        $codificada = base64_encode($cadena);
        return $codificada;
    }
    
    public static function decodificar($cadenaCodificada) {
        $cadenaDecodificada = base64_decode($cadenaCodificada); 
        return $cadenaDecodificada;
    }

}
