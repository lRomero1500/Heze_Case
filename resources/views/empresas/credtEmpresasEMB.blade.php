<form id="empresa">
    {!! csrf_field() !!}
    <div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em">
        <div class="tituloTabla">
            <h2>Datos de la empresa</h2>
        </div>
        <div class="contenedorDeCampos">
            <input id="idcompanias"  name="cod_Companias" type="hidden" value="0" />
            <div class="campoCorto"><h5>Razón social</h5>
                <input id="nomb_Companias" name="nomb_Companias" type="text" value="" placeholder="" requerido="true" style="">
            </div>
            <div class="campoCorto"><h5>Nit</h5>
                <input  id="nit_Companias" name="nit_Companias" type="text" value="" placeholder="" requerido="true">
            </div>
            <div class="campoCorto"><h5>Correo</h5>
                <input  id="correo_companias" name="correo_companias" type="mail" value="" placeholder="">
            </div>
            <div class="campoCorto"><h5>Teléfono</h5>
                <input  id="tel_Companias" class="tel" name="tel_Companias" type="text" value="" placeholder="" requerido="true">
            </div>
            <div class="campoCorto"><h5>Dirección</h5>
                <input id="direccion_companias"  name="direccion_companias" type="text" value="" placeholder="" requerido="true">
            </div>
            <div class="campoCorto"><h5>Logo</h5>
                <input  id="logo_companias" name="logo_companias" type="text" value="" placeholder="">
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

    </script>
@endsection



