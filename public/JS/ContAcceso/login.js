/**
 * Created by luisd on 19/03/2018.
 */
var mailValido;
var PasValido;
$(document).ready(function () {
    $('#usrName').focus();
    document.addEventListener("keydown", function (event) {
        if ((event.keyCode == 13) && ($('#Usr').css('display') == 'block')) {
            $('#btnValida').click();
        }
        else if ((event.keyCode == 13) && ($('#Pass').css('display') == 'block')) {
            $('#btnIngresa').click()
        }
    });
});
var traduccion = Traduccion();
$.validate({
    form: '#login',
    language: traduccion,
    validateOnEvent:true,
    onElementValidate: function (valid, $el, $form, errorMess) {
        if ($el.attr('name') == 'usrName') {
            mailValido = valid;
        }
        else if ($el.attr('name') == 'usrPass'){
            PasValido=valid;
        }
    }
});

function validar() {
    if (mailValido) {
        var data = $('#login').serialize();
        var url = "/valida";

        InicioCarando();
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg == null) {
                    $('#textNomCont').html('');
                    $('#textNomCont').html('Contraseña');
                    $('#ini').html(resp.ini);
                    $('#nomUsr').html(resp.nombre);
                    $('#Usr').hide();
                    $('#Pass').show("slow");
                    $('#avatar').show("slow");
                    $('#passForgot').show("slow");
                    $('#usrPass').focus();
                    FinCarando();
                }
                else {
                    FinCarando();
                    alert(resp.msg);
                }

            },
            error: function (resp, textStatus) {
                FinCarando();
                alert(resp);
            }
        });
    }
}
function ingresar() {
    if(PasValido){
        var data = $('#login').serialize();
        var url = "/ingresa";
        InicioCarando();
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (!resp.error) {
                    window.location.href = '/' + resp.msg;
                }
                else {
                    alert(resp.msg);
                    FinCarando();
                }
            },
            error: function (resp, textStatus) {
                FinCarando();
                alert(textStatus);
            }
        });
    }
}