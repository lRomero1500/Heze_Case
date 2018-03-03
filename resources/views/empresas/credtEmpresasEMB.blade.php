<form id="empresa">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <div class="campoCorto"><h5>Razón social</h5>
                <input name="nomb_Companias" type="text" value="" placeholder="" requerido="true" style="">
            </div>
            <div class="campoCorto"><h5>Nit</h5>
                <input name="nit_Companias" type="text" value="" placeholder="" requerido="true">
            </div>
            <div class="campoCorto"><h5>Correo</h5>
                <input name="cor_Empresa" type="mail" value="" placeholder="">
            </div>
            <div class="campoCorto"><h5>Teléfono</h5>
                <input class="tel" name="tel_Companias" type="text" value="" placeholder="" requerido="true">
            </div>
            <div class="campoCorto"><h5>Dirección</h5>
                <input name="direccion_companias" type="text" value="" placeholder="" requerido="true">
            </div>
            <div class="campoCorto"><h5>Logo</h5>
                <input name="logo_companias" type="text" value="" placeholder="">
            </div>
        </div>
    </div>
    <div class="btnGuardar" style="display: inline-block;">
        <button type="button" id="btnGuardar" style="color: #ffffff !important;" onclick="guardar(event);"><i
                    class="fa fa-floppy-o btnIconComun"></i>
            <p> Guardar datos</p></button>
    </div>
    <div id="errores" style="visibility: hidden">

    </div>
</form>
@section('scriptsEMB')
    <script>
        /*metodos de formulario*/
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
                var url = '{!! URL::to('/').'/CreaEditEmpresa' !!}';
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
                                    "<div id='AlertNoError' class='AlertasAreaNoError'>" +
                                    "<i id='btnCerrarAlert' style='cursor: pointer;'" +
                                    " class='CerrarAlertasAreaNoError fa fa-times fa-fw' aria-hidden='true'></i>" +
                                    "<p>" + resp.msg + " </p></div>"
                                );
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

    </script>
@endsection



