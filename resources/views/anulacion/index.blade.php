<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!--fuentes-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,700;1,400&amp;family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300&amp;display=swap" rel="stylesheet">
    <!-- Estilos-->
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
    <!-- Estilos desarrollo -->
    <link href="{{ URL::asset('css/developers.css') }}" rel="stylesheet">

    <script type="text/javascript">
      function callbackThen(response){
          // read HTTP status
          console.log(response.status);
          
          // read Promise object
          response.json().then(function(data){
              console.log(data);
          });
      }
      function callbackCatch(error){
          console.error('Error:', error)
      }   
  </script>

    {!! htmlScriptTagJsApi([
      'action' => 'anulacion',
      'callback_then' => 'callbackThen',
      'callback_catch' => 'callbackCatch'
  ]) !!}
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container"><a class="navbar-brand" href="/inicio"><img class="logotype" src="{{ URL::asset('images/logo-renta-sm.svg') }}" alt="logo renta nacional" height="70" width="150"></a></div>
      </nav>
    </header>
    <main id="pantallas-formulario"> 
      <div class="container">
        <div class="card card-formulario">
          <div class="card-body">
            <div class="back-wrap mt-3">
              <a class="link-regresar" href="/inicio">
              <span class="material-icons">arrow_back</span> Regresar </a>
            </div>
            <div class="anulacion-info">
              <h4 class="card-title-anulacion card-title mb-3">A continuación podrá realizar la anulación de la solicitud del retiro anticipado de rentas vitalicias, ingresando con su RUT y número de solicitud. </h4>
              <ul class="anulacion-condiciones-list">
                <!--
                <li> <span class="material-icons">check_circle_outline</span>
                  <p><strong>Si han pasado menos de 24 horas de realizada tu solicitud,</strong> podrás anularla de forma automática con este formulario. Luego de 30 minutos de confirmada la anulación, podrás realizar una nueva solicitud de retiro del 10% de tus fondos previsionales.</p>
                </li>
                <li> <span class="material-icons">check_circle_outline </span>
                  <p><strong>Si han pasado más de 24 horas de que realizaste tu solicitud, </strong> una vez ingresada tu solicitud de anulación recibirás una notificación por correo electrónico con la respuesta. Posterior a este aviso, podrás ingresar una nueva solicitud de retiro.</p>
                </li>
              -->
              </ul>
            </div>
            <form action="" name="anulacion">
              @csrf
            <div class="row mt-4">
              <div class="col-lg-5">
                <div class="form-group">
                  <label for="rut-1">Ingrese su RUT</label>
                  <input class="form-control" type="text" name="rut-1" id="rut-1" placeholder="11.111.111-1" oninput="validarRut()" required="" >
                  <div class="invalid-feedback" name="errorRut" id="errorRut" style="display:none;">
                    El RUT ingresado es inválido!.
                  </div>

                </div>
                <div class="form-group"> 
                  <label> <span>Ingresa el número de su solicitud de retiro </span><a class="tooltip-btn" href="#" data-toggle="tooltip" data-placement="right" title="El número de su solicitud de retiro lo encuentras en el mail de aceptación de la solicitud de Retiro de Anticipo de Rentas Vitalicias.">
                       <span class="material-icons" >info</span></a></label>
                  <input class="form-control" type="text" id="numero-solicitud" name="numero-solicitu" placeholder="SR003453" required oninput="validarFolio()">
                  <div class="invalid-feedback" name="errorFolio" id="errorFolio" style="display:none;">
                    Debe ingresar un número de solicitud.
                  </div>
                </div>
                {{-- alertas --}}
            <div class="alert alert-warning" role="alertInvalido" id="alertInvalido" style="display:none;">
              <strong>Atención!</strong> Ingrese todos los campos antes de avanzar.

            </div>
            <div class="alert alert-warning" role="alertRut" id="alertRut" style="display:none;">
              <strong>Atención!</strong>  El rut ingresado no tiene solicitudes registradas.
            </div>
            <div class="alert alert-warning" role="alertFolio" id="alertFolio" style="display:none;">
              <strong>Atención!</strong> El número de solicitud es incorrecto.
            </div>
                <div class="botonera"><a class="btn btn-primary" href="" id="submit" onClick="post()">Enviar solicitud de anulación</a></div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
      <p class="color-white text-center footer-footnote mt-3">Sitio web optimizado para la última versión de Chrome, Firefox</p>
    </main>
<!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script>
      // definimos la url desde env
      const APP_URL = '{{ env('APP_URL') }}';
      // fin de definicion 
    </script>
    <script src="{{ asset('js/validatorsAnulacion.js') }}" type="text/Javascript"></script>
  </body>
</html>

