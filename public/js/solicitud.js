

let afiliado = true;
let beneficiario = false;
let rutValidate = false;
let cedulaValidate = false;
let rutTitulaValidate = false;
let activeRutTitular = false;
let cedula1 = false;
let cedula2 = false;


//boton
const submit = document.getElementById("submit");


// rut seccion
const inputRut = document.getElementById("rut-1");
const labelRutError = document.getElementById("errorRut");

// rut titular seccion
const inputRutTitular = document.getElementById("rut-3");
const labelRutTitularError = document.getElementById("errorRutTitular");

// celuda seccion

const inputCedula = document.getElementById("numero-serie");
const errorCedula1 = document.getElementById("errorCedula1");
const errorCedula2 = document.getElementById("errorCedula2");
// const labelCedulaError = document.getElementById("errorCedulaRepetida");

const inputCedulaRepetida = document.getElementById("numero-serie-confirm");
const labelCedulaRepetidaError = document.getElementById("errorCedulaRepetida");

const classValida = 'form-control is-valid'
const classInvalida = 'form-control is-invalid'
const classForm = 'form-control';

// alerta
const alerta = document.getElementById("alert");
const alertBeneficiario = document.getElementById("alertBeneficiario");
const alertPensionado = document.getElementById("alertPensionado");

// sow beneficiario
function showBeneficiario() {
    if($('#afiliado-no').is(":checked")) {

        $('#aviso-beneficiario').removeClass('d-none');
        $("#box-beneficiario").removeClass('d-none');
    } else {
        activeRutTitular = false;
        $('#aviso-beneficiario').addClass('d-none');
        $("#box-beneficiario").addClass('d-none');

    }
}

// ================= Validaciones =================
function validarRadio() {
    const radioValue = document.inicioSolicitudForm.afiliado.value;
    if(radioValue == 'opcion-1'){
        afiliado = true
        beneficiario = false;
    } else {
        afiliado = false
        beneficiario = true;
    }
}

function validarRut(){
    // const rut = document.inicioSolicitudForm.rut.value;
    alerta.style.display = 'none';
    alertBeneficiario.style.display = 'none';
    alertPensionado.style.display = 'none';
    // submit.disabled = false;

    const rut = document.getElementById('rut-1').value;
    const resultado =  /^([0-9]{7,8})+[-|‐]{1}[0-9kK]{1}$/.test( rut );
    if(resultado) {
        rutValidate = true;
        inputRut.className  = classValida
        labelRutError.style.display = "none";
    } else {
        if (rut == "") {
            rutValidate = false;
            inputRut.className  = classForm
            labelRutError.style.display = "none";
        } else {
            rutValidate = false;
            inputRut.className  = classInvalida
            labelRutError.style.display = "block";
        }
    }
}

function validateCedula(){
    // desactivamos la alerta
    alerta.style.display = 'none';
    alertBeneficiario.style.display = 'none';
    alertPensionado.style.display = 'none';
    // submit.disabled = false;
    // declaraciones
    const numero = document.getElementById("numero-serie").value;
    const numeroRepetido = document.getElementById("numero-serie-confirm").value;
    // flujo
    if (numero != '' && numeroRepetido != ''){
        if (numero == numeroRepetido ){
            if (numero.length > 8){
                inputCedula.className = classValida;
                cedula1 = true;
            }
            if (numeroRepetido.length > 8){
                inputCedulaRepetida.className = classValida;
                cedula1 = true;
            }
            labelCedulaRepetidaError.style.display = "none";
            errorCedula1.style.display = 'none'
            errorCedula2.style.display = 'none'
            cedulaValidate = true;
        } else {
            // if ( numero.length < 9){
            //     errorCedula1.style.display = 'block'
            // }
            // if ( numeroRepetido.length < 9){
            //     errorCedula2.style.display = 'block'
            //     inputCedulaRepetida.className = classInvalida;
            // }
            // if (numero !== numeroRepetido){
            //     inputCedula.className = classInvalida;
            // }
            inputCedula.className = classInvalida;
            inputCedulaRepetida.className = classInvalida;
            labelCedulaRepetidaError.style.display = "block";
            cedulaValidate = false;
        }
    } else {
        if (numero == '') {
            inputCedula.className = classForm;
            labelCedulaRepetidaError.style.display = "none";
            cedulaValidate = false;
        }
        if (numeroRepetido == '') {
            inputCedulaRepetida.className = classForm;
            labelCedulaRepetidaError.style.display = "none";
            cedulaValidate = false;
        }
    }
}

function validarCedula1(){
    const numero = document.getElementById("numero-serie").value;
   if (numero.length > 8 ) {
    cedula1 = true;
    errorCedula1.style.display = 'none'
    inputCedula.className = classValida;
} else {
    
    errorCedula1.style.display = 'block'
    inputCedula.className = classInvalida;
    cedula1 = false;
}
}
function validarCedula2(){
    const numeroRepetido = document.getElementById("numero-serie-confirm").value;
    if (numeroRepetido.length > 8) {
        cedula2 = true;
        errorCedula2.style.display = 'none'
        inputCedulaRepetida.className = classValida;
    } else {
        errorCedula2.style.display = 'block'
        inputCedulaRepetida.className = classInvalida;
        cedula2 = false;
    }
}


function validateRutTitular(){
    // const rut = document.inicioSolicitudForm.rut.value;
    console.log('hola');
    alerta.style.display = 'none';
    alertBeneficiario.style.display = 'none';
    alertPensionado.style.display = 'none';
    // submit.disabled = false;
    //variables
    const rut = document.getElementById('rut-3').value;
    const resultado =  /^([0-9]{7,8})+[-|‐]{1}[0-9kK]{1}$/.test( rut );
    if(resultado) {
        rutTitulaValidate = true;
        inputRutTitular.className  = classValida
        labelRutTitularError.style.display = "none";
    } else {
        if (rut == "") {
            rutTitulaValidate = false;
            inputRutTitular.className  = classForm
            labelRutTitularError.style.display = "none";
        } else {
            rutTitulaValidate = false;
            inputRutTitular.className  = classInvalida
            labelRutTitularError.style.display = "block";
        }
    }
}


// ================= FIN Validaciones =================


// metodos para submit
function cargaDatos(rut,afiliado,beneficiario,rut_titular, ejecutivo,num_serie) {
    //console.log(rut,afiliado,beneficiario);

            const token = $("input[name=_token]").val();
            const route = "{{ route('solicitante.validateRut') }}";
            const urlList = APP_URL+'solicitantes/validateRut';
            // const urlList = 'https://retiro10rentasvitalicias.rentanacional.cl/solicitantes/validateRut';
            const urlError = APP_URL+'solicitantes/error/';
            // const urlError = 'https://retiro10rentasvitalicias.rentanacional.cl/solicitantes/error/';
            const urlSusses = APP_URL+'formulario';
            // const urlSusses = 'https://retiro10rentasvitalicias.rentanacional.cl/formulario';

            $.ajax({
                url: urlList,
                type: 'POST',
                data: {
                    _token:token,
                    rut:rut,
                    beneficiario: beneficiario,
                    rut_titular: rut_titular,
                    ejecutivo: ejecutivo,
                    num_serie: num_serie,
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res)
                    if (res.response.code === '0' || res.response.code === 0){
                        location.href = urlSusses;
                    } else if (res.response.code === '1' || res.response.code === 1){
                        if (beneficiario){
                            alerta.style.display = 'none';
                            alertBeneficiario.style.display = 'block';
                            alertPensionado.style.display = 'none';

                        } else {
                            alerta.style.display = 'none';
                            alertBeneficiario.style.display = 'none';
                            alertPensionado.style.display = 'block';

                        }

                    } else if (res.response.code === '2' || res.response.code === 2){
                        location.href = urlError+res.response.code;
                    }
                }
            });
}

function post(){
    // prevencion para submit
    event.preventDefault()
    // declaraciones
    const rut = document.getElementById('rut-1').value;
    const rutTitular = document.getElementById('rut-3').value;
    const num_serie = document.getElementById('numero-serie').value;
    ejecutivo = 0;
    if(document.getElementById('ejecutivo')){
        ejecutivo = document.getElementById('ejecutivo').value;
    }
    //flujo
    if (activeRutTitular){
        if (rutValidate && cedulaValidate && rutTitulaValidate && cedula1 && cedula2 ){
            // console.log('correcto');
            alerta.style.display = 'none';
            cargaDatos(rut,afiliado,beneficiario,rutTitular, ejecutivo,num_serie);
        } else {
            alerta.style.display = 'block';
            // submit.disabled = true;
        }

    } else {
        if (rutValidate && cedulaValidate && cedula1 && cedula2 ){
            console.log('correcto');
            alerta.style.display = 'none';
            cargaDatos(rut,afiliado,beneficiario,rutTitular, ejecutivo,num_serie);
        } else {
            alerta.style.display = 'block';
            // submit.disabled = true;
        }
    }
}


