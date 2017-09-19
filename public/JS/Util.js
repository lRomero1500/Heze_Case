function InicioCarando() {
    $('body').loading({
        message:'<p style="color:#151515 !important;"class="saving">Procesando<span>.</span><span>.</span><span>.</span></p>',
        stoppable: false
    });
}
function FinCarando() {
    $('body').loading('stop');
}
var caracteres = new Array("Ñ", "Á", "É", "Í", "Ó", "Ú", " "); //Arreglo con los caracteres permitidos para validar una cadena de solo letras
var getEl = function (elementId) {
    return document.getElementById(elementId);
}

Array.prototype.encontrar = //Agrega Función prototipo a la clase Array para buscar un valor en el arreglo
    function (val) {
        for (var i = 0; i <= this.length; i++)
            if (this[i] == val)
                return true
        return false
    }
String.prototype.trim = function () {
    return this.replace(/^\s+|\s+$/g, "");
}
String.prototype.ltrim = function () {
    return this.replace(/^\s+/, "");
}
String.prototype.rtrim = function () {
    return this.replace(/\s+$/, "");
}
String.prototype.pad = function (l, s, t) {
    return s || (s = " "), (l -= this.length) > 0 ? (s = new Array(Math.ceil(l / s.length)
        + 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
        + this + s.substr(0, l - t) : this;
};

String.prototype.toFloat = function () {
    return isNaN(parseFloat(this.replace(/,/gi, ""))) ? 0 : parseFloat(this.replace(/,/gi, ""));
}

Date.prototype.convertir = function (fecha, formato) {
    var dia, mes, año
    dia = fecha.substring(0, 2)
    mes = fecha.substring(3, 5)
    año = fecha.substring(6, 10)
    var fecha = new Date(año, mes - 1, dia)
    return fecha
}
function validaEntero(txt) {//Valida para una caja de texto que solamente se digiten números
    if (isNaN(String.fromCharCode(event.keyCode)) && !(String.fromCharCode(event.keyCode) == "-" && txt.value.indexOf("-") < 0))
        return false;
    if (String.fromCharCode(event.keyCode) == "-") {
        txt.value = "-" + txt.value;
        return false;
    }
    return true;
}

function validaFloat(txt, sepDecimal) {//Valida para una caja de texto que solamente se digiten numeros ó el separador decimal ó el sumbolo menos
    if (isNaN(String.fromCharCode(event.keyCode)) && !(String.fromCharCode(event.keyCode) == sepDecimal && txt.value.indexOf(sepDecimal) < 0) && !(String.fromCharCode(event.keyCode) == "-" && txt.value.indexOf("-") < 0))
        return false;
    if (String.fromCharCode(event.keyCode) == "-") {
        txt.value = "-" + txt.value;
        return false;
    }
    return true;
}

function validaTexto() {//Solo Permite digitar letras y los caracteres especificados en el arreglo caracteres
    var car = String.fromCharCode(event.keyCode).toUpperCase();
    if ((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122) || caracteres.encontrar(car))
        return true;
    return false;
}
function validaValorEnt(objTxt) {
    if (isNaN(parseInt(objTxt.value)))
        objTxt.value = ""
    else
        objTxt.value = parseInt(objTxt.value)
}
function validaValorFlo(objTxt) {
    objTxt.value = objTxt.value.replace(/,/, ".")
    if (isNaN(parseFloat(objTxt.value)))
        objTxt.value = ""
    else
        objTxt.value = parseFloat(objTxt.value)
    objTxt.value = objTxt.value.replace(/\./, ',')
}
function Traduccion() {
    var myLanguage = {
        errorTitle: 'Envio de formulario fallido!',
        requiredFields: 'No ha completado todos los campos requeridos',
        badTime: 'No ha proporcionado un tiempo correcto',
        badEmail: 'No ha proporcionado una direccion de correo valida',
        badTelephone: 'No ha proporcionado un numero telefonico correcto',
        badSecurityAnswer: 'No ha proporcionado una respuesta de seguridad correcta',
        badDate: 'No ha proporcionado una fecha correcta',
        lengthBadStart: 'El valor del campo debe estar entre ',
        lengthBadEnd: ' caracteres',
        lengthTooLongStart: 'El valor del campo es mayor que ',
        lengthTooShortStart: 'El valor del campo es menor que ',
        notConfirmed: 'Input values could not be confirmed',
        badDomain: 'Incorrect domain value',
        badUrl: 'The input value is not a correct URL',
        badCustomVal: 'The input value is incorrect',
        andSpaces: ' and spaces ',
        badInt: 'The input value was not a correct number',
        badSecurityNumber: 'Your social security number was incorrect',
        badUKVatAnswer: 'Incorrect UK VAT Number',
        badStrength: 'The password isn\'t strong enough',
        badNumberOfSelectedOptionsStart: 'You have to choose at least ',
        badNumberOfSelectedOptionsEnd: ' answers',
        badAlphaNumeric: 'The input value can only contain alphanumeric characters ',
        badAlphaNumericExtra: ' and ',
        wrongFileSize: 'The file you are trying to upload is too large (max %s)',
        wrongFileType: 'Only files of type %s is allowed',
        groupCheckedRangeStart: 'Please choose between ',
        groupCheckedTooFewStart: 'Please choose at least ',
        groupCheckedTooManyStart: 'Please choose a maximum of ',
        groupCheckedEnd: ' item(s)',
        badCreditCard: 'The credit card number is not correct',
        badCVV: 'The CVV number was not correct',
        wrongFileDim : 'Incorrect image dimensions,',
        imageTooTall : 'the image can not be taller than',
        imageTooWide : 'the image can not be wider than',
        imageTooSmall : 'the image was too small',
        min : 'min',
        max : 'max',
        imageRatioNotAccepted : 'Image ratio is not accepted'
    };
    return myLanguage;
}


