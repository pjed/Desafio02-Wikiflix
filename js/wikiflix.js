/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$(function () {
//    $('#detalle').click(function () {
//        $item = $(this).data("id") // will return the number 123
//        alert($item);
//    });
//});

$("tbody tr").click(function () {
    $('.selected').removeClass('selected');
    $(this).addClass("selected");
    $id = $('.id', this).html();
    alert($id);


    $.ajax({
        data: {"idpelicula": $id}, //datos json recogidos del formulario formu
        type: "POST", // método de envío de datos
        url: "../auxiliar/servidor_detalle.php", //código a ejecutar en el servidor
        success: function (respuesta) {
            var variable = JSON.parse(respuesta); //conversión a json de los datos de respuesta
            if (variable !== null) {
                $("#nombre").val(variable[0]);
            } else {
                alert("Se ha producido un error de ajax");
            }
        }
    });
});
