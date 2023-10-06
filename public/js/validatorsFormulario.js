
let correoValidate = false;
let correoConfrimacionValidate = false;
let correosDuplicadosValidate = false;
let movilValidate = false;
let movilConfrimacionValidate = false;
let movilsDuplicadosValidate = false;
let deudor = '';
let aceptar = false;
let menorDeEdad = false;
let rutApoderadoValidate = false;
document.getElementById('button').disabled=false;
// variables mayor de edad
const inputNacimiento = document.querySelector('input[name="nacimiento"]');
const groupApoderado =  document.querySelector('#apoderado-group');

// Alerta 
const alerta = document.getElementById("alert");
const alertaDeudor = document.getElementById("alertDeudor");
const alertaTerminosCondiciones = document.getElementById("alertTerminos");
const alertApoderado = document.getElementById("alertApoderado");

// varibles
const classValida = 'form-control is-valid'
const classInvalida = 'form-control is-invalid'
const classForm = 'form-control';

// inputs rut apoderado
const inputApoderado = document.getElementById("apoderado");
const labetApoderadoError = document.getElementById("errorApoderado");

// inputs + labels CORREO
const inputEmail = document.getElementById("correo");
const labelEmailError = document.getElementById("errorCorreo");

const inputEmailConfirm = document.getElementById("correo-confirm");
const labelEmailConfirmError = document.getElementById("errorCorreoConfirm");
const labelEmailDuplicadoError = document.getElementById("errorCorreoDuplicado");

// inputs + labels CORREO
const inputMovil = document.getElementById("movil");
const labelMovilError = document.getElementById("errorTelefono");

const inputMovilConfirm = document.getElementById("movil-confirm");
const labelMovilConfirmError = document.getElementById("errorTelefonoConfirm");
const labelMovilDuplicadoError = document.getElementById("errorTelefonoDuplicado");



function validatorEmailConfirm(){
    const email = document.getElementById('correo').value;
    const emailConfirmar = document.getElementById('correo-confirm').value;
    
    const test = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emailConfirmar);

    if (emailConfirmar != '') {
        if (test) {
            correoConfrimacionValidate = true;
            inputEmailConfirm.className = classValida;
            labelEmailConfirmError.style.display = "none";
            if (email === emailConfirmar){
                correosDuplicadosValidate = true;
                labelEmailDuplicadoError.style.display = 'none'
                inputEmailConfirm.className = classValida;
                inputEmail.className = classValida;
            } else {
                if (email != ''){
                    labelEmailDuplicadoError.style.display = 'block'
                    inputEmailConfirm.className = classInvalida;
                    inputEmail.className = classInvalida;
                    correosDuplicadosValidate = false;
                } else {
                    correosDuplicadosValidate = false;
                }
            }
        } else {
            inputEmailConfirm.className = classInvalida;
            labelEmailConfirmError.style.display = "block";
            correoConfrimacionValidate = false;
        }
    } else {
        labelEmailConfirmError.style.display = "none";
        labelEmailDuplicadoError.style.display = 'none';
    }
}

function valitEmail(){
    const email = document.getElementById('correo').value;
    const emailConfirmar = document.getElementById('correo-confirm').value;
    const test = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
    if (email != ''){
        if(test){
            inputEmail.className = classValida;
            labelEmailError.style.display = 'none';
            correoValidate = true;
            if (email === emailConfirmar){
                correosDuplicadosValidate = true;
                labelEmailDuplicadoError.style.display = 'none'
                inputEmailConfirm.className = classValida;
            } else {
                if (emailConfirmar != '') {
                    labelEmailDuplicadoError.style.display = 'block'
                    inputEmailConfirm.className = classInvalida;
                    correosDuplicadosValidate = false;
                    
                } else {
                    correosDuplicadosValidate = false
                }
            }
        } else {
            inputEmail.className = classInvalida;
            labelEmailError.style.display = 'block';
            correoValidate = false;
        }
    } else {
        inputEmail.className = classForm;
        labelEmailError.style.display = 'none';
        correoValidate = false;
    }


}




function valitTelefono(){
    const movil = document.getElementById('movil').value;
    const movilConfirmar = document.getElementById('movil-confirm').value;
    const test = /^[(+56)][0-9]{11}$/.test(movil);
    if (movil != ''){
        if(test){
            inputMovil.className = classValida;
            labelMovilError.style.display = 'none';
            movilValidate = true;
            if (movil === movilConfirmar){
                movilsDuplicadosValidate = true;
                labelMovilDuplicadoError.style.display = 'none'
                inputMovilConfirm.className = classValida;
            } else {
                if (movilConfirmar != '') {
                    labelMovilDuplicadoError.style.display = 'block'
                    inputMovilConfirm.className = classInvalida;
                    movilsDuplicadosValidate = false;
                    
                } else {
                    movilsDuplicadosValidate = false
                }
            }
        } else {
            inputMovil.className = classInvalida;
            labelMovilError.style.display = 'block';
            movilValidate = false;
        }
    } else {
        inputMovil.className = classForm;
        labelMovilError.style.display = 'none';
        movilValidate = false;
    }


}

function validatorTelefonoConfirm(){
    const movil = document.getElementById('movil').value;
    const movilConfirmar = document.getElementById('movil-confirm').value;
    const test = /^[(+56)][0-9]{11}$/.test(movilConfirmar);
    
    if (movilConfirmar != '') {
        if (test) {
            movilConfrimacionValidate = true;
            inputMovilConfirm.className = classValida;
            labelMovilConfirmError.style.display = "none";
            if (movil === movilConfirmar){
                movilsDuplicadosValidate = true;
                labelMovilDuplicadoError.style.display = 'none'
                inputMovilConfirm.className = classValida;
                inputMovil.className = classValida;
            } else {
                if (movil != ''){
                    labelMovilDuplicadoError.style.display = 'block'
                    inputMovilConfirm.className = classInvalida;
                    inputMovil.className = classInvalida;
                    movilsDuplicadosValidate = false;
                } else {
                    movilsDuplicadosValidate = false;
                }
            }
        } else {
            inputMovilConfirm.className = classInvalida;
            labelMovilConfirmError.style.display = "block";
            movilConfrimacionValidate = false;
        }
    } else {
        labelMovilConfirmError.style.display = "none";
        labelMovilDuplicadoError.style.display = 'none';
        movilConfrimacionValidate = false;
    }
}

function selection(){
    deudor = true;
    alertaDeudor.style.display = 'none';
}
function selectionNo(){
    deudor = false;
    alertaDeudor.style.display = 'none';
}

function checkAcepto(){
    aceptar = $('#acepto').is(':checked');
    if(aceptar){
        alertaTerminosCondiciones.style.display = 'none';
    }
}

function validateRutApoderado(){
    if (alertApoderado){
        alertApoderado.style.display = 'none';
    }
    const rut = document.getElementById('apoderado').value;
    const resultado =  /^([0-9]{7,8})+[-|‐]{1}[0-9kK]{1}$/.test( rut );
    if(resultado) {
        rutApoderadoValidate = true;
        inputApoderado.className  = classValida
        labetApoderadoError.style.display = "none";
    } else {
        if (rut == "") {
            rutApoderadoValidate = false;
            inputApoderado.className  = classForm
            labetApoderadoError.style.display = "none";
        } else {
            rutApoderadoValidate = false;
            inputApoderado.className  = classInvalida
            labetApoderadoError.style.display = "block";
        }
    }
}


//muestra el campo rut apoderado 
if(inputNacimiento) {
    inputNacimiento.addEventListener('blur',()=>{
        // console.log(inputNacimiento.value)
        mayorDeEdad(inputNacimiento.value);
        
    })
}
function mayorDeEdad(fecha) {
    if (alertApoderado){
        alertApoderado.style.display = 'none';
    }
    //comprueba Momement.js
    try {
        moment();
    } catch (error) {
        // return console.warn('No existe moment.js');
        console.log('No existe moment.js= '+ error);
        return false;
    }
    const birthday = fecha;
    const age =  moment().diff(birthday, 'years');
    console.log(age);
    if(age < 18) {
        groupApoderado.classList.remove('d-none');
        // console.log('menor')
        menorDeEdad = true;
        rutApoderadoValidate=false;
    }
    if(groupApoderado.classList.contains('d-none') == false && age >= 18 ) {
        groupApoderado.classList.add('d-none');
        // console.log('mayor')
        menorDeEdad = false;
        rutApoderadoValidate=true;
    } 
    if(age >= 18){
        menorDeEdad = false;
        rutApoderadoValidate=true;
    }
}



// posteo
function post(){
    // prevencion para submit
    event.preventDefault()
    alerta.style.display = 'none';
    //campos
    const nombre = document.getElementById('nombres').value
    const apellido_paterno = document.getElementById('apellido-paterno').value
    const apellido_materno = document.getElementById('apellido-materno').value
    const fecha_nacimiento = document.getElementById('nacimiento').value
    const email = document.getElementById('correo').value
    const celular = document.getElementById('movil').value
    const region = document.getElementById('regiones').value
    const comuna = document.getElementById('comunas').value
    const direccion = document.getElementById('direccion').value
    const rut_apoderado = document.getElementById('apoderado').value
    const deudor_alimentos = deudor;
    const aceptar_condiciones = aceptar;
    // const nombre = document.getElementById('nombres')

    // alertApoderado ===============
    // console.log('menorDeEdad esta en :',menorDeEdad)
    if (menorDeEdad){
        if ((deudor !== '') && (aceptar_condiciones)){
            if ( rut_apoderado != '' && rutApoderadoValidate){
                alertApoderado.style.display = 'none';
                if(correoValidate
                && correoConfrimacionValidate
                && correosDuplicadosValidate
                && movilValidate
                && movilConfrimacionValidate
                && movilsDuplicadosValidate 
                && nombre != ''
                && apellido_materno != ''
                && apellido_paterno != ''
                && email != ''
                && fecha_nacimiento != ''
                && celular != ''
                && region != ''
                && direccion != ''
                && comuna != ''
                ){
                    alerta.style.display = 'none';
                    const obj = {
                        nombre : nombre, 
                        apellido_materno : apellido_materno, 
                        apellido_paterno : apellido_paterno, 
                        email : email, 
                        fecha_nacimiento : fecha_nacimiento, 
                        celular : celular, 
                        region : region, 
                        direccion : direccion, 
                        comuna : comuna, 
                        aceptar_condiciones : aceptar_condiciones, 
                        deudor_alimentos : deudor_alimentos,
                        rut_apoderado: rut_apoderado
                    }
                    // console.log('va como menor')
                    cargarDatos(obj);
                }else{
                    console.log('incorrecto');
                    alerta.style.display = 'block';
                }
            } else {
                alertApoderado.style.display = 'block';
            }
    
        } else {
            if (deudor == '' && (!aceptar_condiciones)){
                alertaTerminosCondiciones.style.display = 'block';
                alertaDeudor.style.display = 'block';
                console.log('entro');
            }
            if(deudor === '') {
                alertaDeudor.style.display = 'block';
                console.log('entro2');
                
            } 
            if(!aceptar_condiciones) {
                console.log('entro3');
                alertaTerminosCondiciones.style.display = 'block';
            }
        }

    } else {
        
        if ((deudor !== '') && (aceptar_condiciones)){
            if(correoValidate
            && correoConfrimacionValidate
            && correosDuplicadosValidate
            && movilValidate
            && movilConfrimacionValidate
            && movilsDuplicadosValidate 
            && nombre != ''
            && apellido_materno != ''
            && apellido_paterno != ''
            && email != ''
            && fecha_nacimiento != ''
            && celular != ''
            && region != ''
            && direccion != ''
            && comuna != ''
            ){
                alerta.style.display = 'none';
                const obj = {
                    nombre : nombre, 
                    apellido_materno : apellido_materno, 
                    apellido_paterno : apellido_paterno, 
                    email : email, 
                    fecha_nacimiento : fecha_nacimiento, 
                    celular : celular, 
                    region : region, 
                    direccion : direccion, 
                    comuna : comuna, 
                    aceptar_condiciones : aceptar_condiciones, 
                    deudor_alimentos : deudor_alimentos,
                    rut_apoderado: null
                }
                // console.log('va como mayor')
                cargarDatos(obj);
            }else{
                // console.log('incorrecto');
                alerta.style.display = 'block';
            }
    
        } else {
            if (deudor == '' && (!aceptar_condiciones)){
                alertaTerminosCondiciones.style.display = 'block';
                alertaDeudor.style.display = 'block';
                // console.log('entro');
            }
            if(deudor === '') {
                alertaDeudor.style.display = 'block';
                // console.log('entro2');
                
            } 
            if(!aceptar_condiciones) {
                // console.log('entro3');
                alertaTerminosCondiciones.style.display = 'block';
            }
        }
        
    }

}

function cargarDatos(objeto) {
            document.getElementById('button').disabled=true;
            $('#btn-save').prop('disable',true);
            const token = $("input[name=_token]").val();
            
           
            const urlPost = APP_URL+'solicitud';
            const urlSuss = APP_URL+'formulario/exito/';
           
           console.log('add')
            
            $.ajax({
                url: urlPost,
                type: 'POST',
                data: {
                    _token:token,
                    nombre : objeto.nombre, 
                    apellido_materno : objeto.apellido_materno, 
                    apellido_paterno : objeto.apellido_paterno, 
                    email : objeto.email, 
                    fecha_nacimiento : objeto.fecha_nacimiento, 
                    celular : objeto.celular, 
                    region : objeto.region, 
                    direccion : objeto.direccion, 
                    comuna : objeto.comuna, 
                    aceptar_condiciones : objeto.aceptar_condiciones, 
                    deudor_alimentos : objeto.deudor_alimentos,
                    rut_apoderado: objeto.rut_apoderado
                },
                dataType: 'json',
                success: function (res) {
                    console.log(res)
                    if(res.response.code == '200' || res.response.code == 200){
                        
                        const respuesta = res.response.body;
                        const rutCompleto = respuesta.rut_pensionado+'-'+respuesta.dv_pensionado; 
                        // document.getElementById('button').disabled=false;
                        location.href = urlSuss+respuesta.folio+'/'+rutCompleto
                        
                    } else {
                        
                        location.href = APP_URL;
                    }
                    
                }
            });
}






