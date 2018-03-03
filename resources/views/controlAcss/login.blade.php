@extends('layouts/layoutInicio')

@section('content')
    <div class="logo-login">
        <img src="Img/Logo_Hezecase_login.png">
    </div>
    <div class="usps-login">
        <div id="avatar" style="display: none">
            <div class="login-Avatar">
                <h1 id="ini"></h1>
            </div>
            <h2 id="nomUsr"></h2>
        </div>

        <h6 id="textNomCont">Nombre</h6>

        <form id="login" method="POST">
            {!! csrf_field() !!}
            <div id="Usr" style="display:block ">
                <input class="login-control" type="text" name="usrName" id="usrName" placeholder="Ingrese aquí su correo electrónico" data-validation="email"/>
                <input id="btnValida" type="button" class="btn-login" value="Validar" onclick="validar();">
            </div>
            <div id="Pass" style="display: none">
                <input class="login-control" type="password" name="usrPass" id="usrPass" placeholder="Ingrese aquí su contraseña"/>
                <input id="btnIngresa" type="button" class="btn-login" value="Ingresar" onclick="ingresar();"/>
            </div>
        </form>
    </div>
    <div id="passForgot" class="passForgot" style="display: none">
        <a href="#" style="color: #008080;text-decoration: none">Olvide mi contraseña</a>
    </div>
@endsection
@section('scripts')
    <script src="{!! URL::to('JS/jquery-validator.js') !!}"></script>
    <script>
        var valido;
        $(document).ready(function () {
            document.addEventListener("keydown", function(event){
                if((event.keyCode==13) && ($('#Usr').css('display') == 'block')  ){
                    $('#btnValida').click();
                }
                else if((event.keyCode==13) && ($('#Pass').css('display') == 'block') ){
                    $('#btnIngresa').click()
                }
            });
        });
        var traduccion=Traduccion()
        $.validate({
            form : '#login',
            language: traduccion,
            onElementValidate : function(valid, $el, $form, errorMess) {
                if($el.attr('name')=='usrName')
                {
                    valido=valid;
                }
            }
        });
        function validar(){
            if(valido){
                var data= $('#login').serialize();
                var url='{!! URL::to('/').'/valida' !!}';

                InicioCarando();
                $.post({
                    url:url,
                    data:data,
                    success: function (resp) {
                        if(resp.msg==null){
                            $('#textNomCont').html('');
                            $('#textNomCont').html('Contraseña');
                            $('#ini').html(resp.ini);
                            $('#nomUsr').html(resp.nombre);
                            $('#Usr').hide();
                            $('#Pass').show("slow");
                            $('#avatar').show("slow");
                            $('#passForgot').show("slow");
                            FinCarando();
                        }
                        else{
                            FinCarando();
                            alert(resp.msg);
                        }

                    },
                    error:function(resp,textStatus){
                        FinCarando();
                        alert(resp);
                    }
                });
            }
        }
        function ingresar(){
            var data= $('#login').serialize();
            var url='{!! URL::to('/').'/ingresa' !!}';
            InicioCarando();
            $.post({
                url:url,
                data:data,
                success: function (resp) {
                    if(!resp.error){
                        window.location.href = '{!! URL::to('/')!!}'+resp.msg;
                    }
                    else{
                        alert(resp.msg);
                        FinCarando();
                    }
                },
                error:function(resp,textStatus){
                    FinCarando();
                    alert(textStatus);
                }
            });
        }
    </script>
@endsection