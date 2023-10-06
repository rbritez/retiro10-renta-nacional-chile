// rut seccion
const inputRut = document.getElementById("rut-1");
const labelRutError = document.getElementById("errorRut");
let rutValidate = false;
//const resultado =  /^([0-9]{7,8})+[-|‐]{1}[0-9kK]{1}$/.test( rut ); 

//folio seccion
const inputFolio = document.getElementById("numero-solicitud");
const labelFolioError = document.getElementById("errorFolio");

const classValida = 'form-control is-valid'
const classInvalida = 'form-control is-invalid'
const classForm = 'form-control';

// alertas
const alertaFormInvalido = document.getElementById("alertInvalido");
const alertRut = document.getElementById("alertRut");
const alertFolio = document.getElementById("alertFolio");


function validarRut(){
  alertRut.style.display="none";
  alertFolio.style.display="none";
  alertaFormInvalido.style.display = 'none';
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

function validarFolio(){
  alertRut.style.display="none";
  alertFolio.style.display="none";
  const folio = document.getElementById('numero-solicitud').value;
  const test = /^(SR)[0-9]{5,6}$/.test(folio);
  if (test){
    labelFolioError.style.display = "none";
    inputFolio.className  = classValida;
  } else{
    labelFolioError.style.display = "block";
    inputFolio.className  = classInvalida;
  }
  // console.log(test);
}

function post(){
  // prevencion para submit
  event.preventDefault();
  const folio = document.getElementById('numero-solicitud').value;
  const rut = document.getElementById('rut-1').value;
  let valitForm = false;
  if(!rutValidate){
    inputRut.className  = classInvalida
    labelRutError.style.display = "block";
    valitForm = false;
    // return false;
  }else{
    valitForm = true;
  }

  if(folio == ""){
    folioValidate = false;
    inputFolio.className  = classInvalida
    labelFolioError.style.display = "block";
    valitForm = false;
    // return false;
  }else{
    folioValidate = false;
    inputFolio.className  = classForm
    labelFolioError.style.display = "none";
    valitForm = true;
  }

  if(valitForm){
    cargarDatos({rut:rut,folio:folio});
  } else {
    alertaFormInvalido.style.display = 'block';
  }

//229575573

}

function cargarDatos(objeto) {
  const token = $("input[name=_token]").val();
  // console.log(objeto);

  // return;
  const urlPost = APP_URL+'anulacion/solicitud';
  const urlError = APP_URL+'anulacion/error';
  const urlSuss = APP_URL+'anulacion/exito/';
 
  $.ajax({
      url: urlPost,
      type: 'POST',
      data: {
          _token:token,
          rut : objeto.rut, 
          folio : objeto.folio, 
        },
      dataType: 'json',
      success: function (res) {
          
        console.log(res)

        switch (res.response.code) {
          case 0:
            location.href = urlSuss;
            break;
          case 1:
            alertRut.style.display = "block";
            break;
          case 2:
            alertFolio.style.display = "block";
            break;
          case 3:
            location.href = urlError;
            break;
        
          default:
            break;
        }
        // if(res.response.code == '0' || res.response.code == 0){
        //     console.log('entro');
        //   location.href = urlSuss;
            
        // } else  if(res.response.code == '1' || res.response.code == 2) {
        //   alertRut.style.display = "block";
        // } else if(res.response.code == '1' || res.response.code == 2){
        //   // conde 2
        //   alertFolio.style.display = "block";
        // } else if(res.response.code == '3' || res.response.code == 3){
        //   //codigo 3 y 4 | 3 solicitud ya anulada | 4 rechazada 
        //   location.href = urlError;
        // }
      
    }
  })
}

