<div class="contentFormulario3Colomnas" style="padding:0px!important;margin-bottom: 0.5em">
    <div class="tituloTabla">
        <h2>Datos de la empresa</h2>
    </div>
    <div class="contenedorDeCampos">
        <div class="campoCorto"><h5>Razón social</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Nit</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Correo</h5>
            <input type="mail" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Teléfono</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Rubro</h5>
            <input type="text" value="" placeholder="">
        </div>
        <div class="campoCorto"><h5>Dirección</h5>
            <input type="text" value="" placeholder="">
        </div>
    </div>
</div>
<div class="btnGuardar" style="display: inline-block;">
    <button id="btnGuardar" style="color: #ffffff !important;"><i class="fa fa-floppy-o btnIconComun"></i><p> Guardar datos</p></button>
</div>
<script src="/JS/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('#btnGuardar').click(function () {
            InicioCarando();
        });
    }).jquery;
</script>