/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    /** ********************************* **/
    /** Inicio Codigo jQuery y JavaScript **/
    /** ********************************* **/
    $('.curvas').css({
        '-moz-border-radius': '7px', 
        '-webkit-border-radius': '7px', 
        '-khtml-border-radius': '7px', 
        'border-radius': '7px'
    });
    /** Capturar Envio De Formulario LOGIN **/
    $('#formulario').submit(function(){
        var usuario = $('#usuario').val().length;
        var clave = $('#clave').val().length;
        if(usuario < 1){
            alert("Debe Ingresar Su Nombre De Usuario!.");
            return false;
        }else if(clave < 1){
            alert("Debe Ingresar Su Clave Antes De Continuar!.");
            return false;
        }else{
            $('#creditos_login').fadeOut();
            $('#cuadro_login').fadeOut();
            return true;
        }
        return false;
    });
});