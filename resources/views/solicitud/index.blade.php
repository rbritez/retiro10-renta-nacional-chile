<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--fuentes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,700;1,400&amp;family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300&amp;display=swap" rel="stylesheet">
    <!-- Estilos-->
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
    <!-- Estilos desarrollo -->
    <link href="{{ URL::asset('css/developers.css') }}" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container"><a class="navbar-brand" href="/inicio"><img class="logotype" src="{{ URL::asset('images/logo-renta-sm.svg') }}" alt="logo renta nacional" height="70" width="150"></a></div>
      </nav>
    </header>
    <main id="pantallas-formulario"> 
      <div class="container">
        <div class="card mb-3 mensaje-paso">              
          <div class="card-body">
            <h4 class="card-title-informativo card-title mb-3">Formulario de Solicitud<br><span>Retiro Anticipo de Rentas Vitalicias</span></h4>
            <p>
              A continuación podrá realizar su solicitud del Retiro Anticipado de Rentas Vitalicias, ingresando con su RUT y número de documento/serie de su cédula de identidad.<br>
              Recuerde que se extendió la vigencia de la cédula de identidad de chilenos y extranjeros con vencimiento en 2020 hasta 1 año desde la expiración de ésta. <br>
              En caso de que su cédula de identidad no esté vigente o esté bloqueada, llame al call center 800 200 050
              
            </p>
          </div>
        </div>
        <div class="card card-formulario" id="paso-1">
          <div class="card-body">
            <div class="step-wrap">
              <ul class="steps">
                <li class="step-item active"><span class="step-number">1</span><span class="step-text">Paso 1</span></li>
                <li class="step-item"> <span class="step-number">2</span><span class="step-text">Paso 2</span></li>
               <!-- <li class="step-item"> <span class="step-number">3</span><span class="step-text">Paso 3</span></li> -->
              </ul>
            </div>
            <p class="mb-2">Para comenzar, seleccione si es pensionado o beneficiario de pensión de sobrevivencia, luego ingrese los datos solicitados. </p>
            <h4 class="paso-1-form-title mb-3">Ingrese sus datos </h4>

            <!-- INICIO FORMULARIO -->
            <form action="" name="inicioSolicitudForm">

              @CSRF
                @isset($ejecutivo)
                  <input type="hidden" id="ejecutivo" name="ejecutivo" value="{{$ejecutivo}}">
                @endisset
                  
                <input type="hidden">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="afiliado" id="afiliado-si" value="opcion-1" checked onClick="validarRadio()">
                  <label class="form-check-label" for="afiliado-si">Soy pensionado en Renta Nacional</label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="afiliado" id="afiliado-no" value="opcion-2" onclick="validarRadio()">
                  <label class="form-check-label" for="afiliado-no">Soy beneficiario de pensión de sobrevivencia en Renta Nacional</label>
                </div>


                <div class="alert alert-info mt-4 d-none" id="aviso-beneficiario">
                  <h6 class="bold">Recuerde:</h6>
                  <p class="mb-0">- Si es pensionado y recibe una pensión de sobrevivencia, puede solicitar el retiro de ambas pólizas por separado.</p>
                  <p class="mb-0">- Si es beneficiario de pensión de sobrevivencia de más de un causante, deberá realizar la solicitud por cada uno de ellos.</p>
                  <p class="mb-0">- Cada solicitud tendrá las mismas restricciones de topes máximos establecidos.</p>
                </div>

                <div class="row mt-4">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label for="rut-1">Ingrese su RUT</label>
                      <input class="form-control" type="text" name="rut-1" placeholder="11111111-1" id="rut-1" oninput="validarRut()">
                        <div class="invalid-feedback" id="errorRut" style="display:none;">
                          El RUT ingresado es inválido.
                        </div>
                    </div>

                    <div class="form-group"> 
                    <label class="tooltip-label"> <span>Ingrese su número de documento/serie, de su cédula de identidad  </span>
                    <a id="tootltipCarnet"class="tooltip-btn" href="#" >
                       <span class="material-icons" >info</span></a></label>
                      <input class="form-control" type="text" id="numero-serie" name="numero-serie" oninput="validateCedula(),validarCedula1()">
                      <div class="invalid-feedback" id="errorCedula1" style="display:none;">
                        El número de documento ingresado es inválido!.
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Reingrese su número de documento/serie, de su cédula de identidad</label>
                      <input class="form-control" type="text" id="numero-serie-confirm" name="numero-serie-confirm" oninput="validateCedula(),validarCedula2()">
                      <div class="invalid-feedback" id="errorCedulaRepetida" style="display:none;">
                          El número de documento ingresado no coincide con el anterior.
                        </div>
                        <div class="invalid-feedback" id="errorCedula2" style="display:none;">
                          El número de documento ingresado es inválido!.
                        </div>
                    </div>
                    <div class="form-group d-none" id="box-beneficiario">
                      <hr>
                      <label for="rut-3"> <span>Ingresa RUT del causante</span><a class="tooltip-btn" href="#" data-toggle="tooltip" data-placement="right" title="Causante es el pensionado fallecido del cual se recibe una pensión de sobrevivencia.">
                          <span class="material-icons">info</span></a></label>
                      <input class="form-control" type="text" name="rut-3" id="rut-3" placeholder="11.111.111-1" oninput="validateRutTitular()">
                      <div class="invalid-feedback" id="errorRutTitular" style="display:none;" >
                              El RUT ingresado es inválido.
                        </div>
                    </div>
                    <!-- alerta -->
                    <div class="alert alert-warning" role="alert" id="alert" style="display:none;">
                      <strong>Por favor</strong> Ingrese todos los campos antes de avanzar.
                      
                    </div>

                    <div class="alert alert-warning" role="alertPensionado" id="alertPensionado" style="display:none;">
                      <strong>Atención!</strong> Es posible que no sea pensionado en Renta Nacional Compañía de Seguros de Vida o no cumpla con las condiciones para solicitar el retiro. Comuníquese al 800 200 050.
                    </div>

                    <div class="alert alert-warning" role="alertBeneficiario" id="alertBeneficiario" style="display:none;">
                      <strong>Atención!</strong> Es posible que no sea beneficiario en Renta Nacional Compañía de Seguros de Vida o no cumpla con las condiciones para solicitar el retiro. Comuníquese al 800 200 050.
                    </div>

                    <!-- fin alerta -->
                    <div class="botonera"><a class="btn btn-primary" href="" id="submit" onClick="post()" >Siguiente</a></div>
                  </div>
                </div>
            </form>  
            <!-- FIN FORMULARIO -->
            
          </div>
        </div>
      </div>
      <p class="color-dark text-center footer-footnote mt-3">Sitio web optimizado para la última versión de Chrome, Firefox</p>
    </main>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script>
         const APP_URL = '{{ env('APP_URL') }}';
         
    </script>
    <script src="{{ asset('js/solicitud.js') }}" type="text/Javascript"></script>
    
  </body>
</html>



