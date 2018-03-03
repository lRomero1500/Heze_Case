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
                <input name="tel_Companias" type="text" value="" placeholder="" requerido="true">
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
            }

        }

    </script>
@endsection



