/**
 * Created by luisd on 19/03/2018.
 */

function guardar(e) {
    InicioCarando();
    var msj = ValidaFormulario($('#empresa')[0]);
    if (msj.fallo) {
        e.preventDefault();
        var re = msj.mensajes[0];
        $('#errores').css('visibility', '');
        $('#errores').html('');
        $('#errores').html(re);
        FinCarando();
    }
    else {
        var data = $('#empresa').serialize();
        var url = baseUrl+'CreaEditEmpresa';
        $.post({
            url: url,
            data: data,
            success: function (resp) {
                if (resp.msg != null) {
                    if (!resp.error) {
                        ResetForm($('#empresa')[0], event);
                        $('#errores').css('color', '#37474F');
                        $('#errores').html('');
                        $('#errores').css('visibility', 'none');
                        $('#formulario').css('display', 'none');
                        destruirMask('tel');
                        $('#ContenedorAltertas').append(
                            "<div id='AlertResp' class='AlertasAreaNoError'>" +
                            "<i onclick='cerrarResp();' style='cursor: pointer;'" +
                            " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                            "<p>" + resp.msg + " </p></div>"
                        );
                       $('#tbCompanias').html('');
                        var tb="";
                        $.each(resp.table,function (index,item) {
                            tb+='<tr><td><input type="checkbox"/></td><td>'+item.nomb_Companias+
                                '<div class="OpcionesTabla">' +
                                '<a onclick="editEmpresa('+item.cod_Companias+');">Editar</a>' +
                                '<span class="SeparadorOpcionesTablas">|</span><a href="#">Eliminar</a>' +
                                '</div></td><td>'+item.nit_Companias+'</td>' +
                                '<td>'+item.tel_Companias+'</td>' +
                                '<td>'+item.correo_companias+'</td>' +
                                '<td>'+item.direccion_companias+'</td></tr>';

                        });
                        $('#tbCompanias').html(tb);
                        FinCarando();
                    }
                    else {
                        $('#errores').css('visibility', '');
                        $('#errores').css('color', 'red');
                        $('#errores').html('');
                        $('#errores').html(resp.msg);
                    }

                    FinCarando();
                }
                else {
                    FinCarando();
                    $('#errores').css('visibility', '');
                    $('#errores').html('');
                    $('#errores').html(resp.msg);
                }

            },
            error: function (resp, textStatus) {
                FinCarando();
                $('#errores').css('visibility', '');
                $('#errores').html('');
                $('#errores').html('Error' + resp.msg);
            }
        });
    }

}
function editEmpresa(idEmpresa) {
    InicioCarando();
    var url =baseUrl+'getEmpresa/';
    $.ajax({
        type: "GET",
        url: url + idEmpresa,
        success: function (resp) {
            if (resp != null&&resp!=undefined) {
                if ($('#formulario').css('display') == 'none') {
                    $('#formulario').css('display', '');
                    crearMask('tel');
                }
                ResetForm($('#empresa')[0], event);
                $('#idcompanias').prop('value',resp.cod_Companias);
                $('#nomb_Companias').val(resp.nomb_Companias);
                $('#nit_Companias').val(resp.nit_Companias);
                $('#correo_companias').val(resp.correo_companias);
                $('#tel_Companias').val(resp.tel_Companias);
                $('#direccion_companias').val(resp.direccion_companias);
            }
            else {
                $('#errores').css('visibility', '');
                $('#errores').html('');
                $('#errores').html('Ocurrio un error, Comuniquese con el departamento de soporte');
            }
            FinCarando();
        },
        error: function (resp, textStatus) {
            FinCarando();
            $('#errores').css('visibility', '');
            $('#errores').html('');
            $('#errores').html('Error' + textStatus);
        }
    });
}