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
        <div class="container"><a class="navbar-brand" href="/inicio"><img class="logotype" src="{{ URL::asset('images/logo-renta-sm.svg') }}" alt="logo renta nacional" height="70" width="150"></a></div>      </nav>
    </header>
    <main id="pantallas-formulario"> 
      <div class="container d-flex">
        <div class="card card-mensaje" id="solicitud-success">
          <div class="card-body">
            <div class="icon-wrap success">
              <span class="material-icons">check_circle</span>

            </div>
            <p><strong>Su solicitud para el anticipo ha sido ingresada.</strong></p>
            <p>Le informamos que se ha ingresado de forma exitosa su solicitud para el anticipo de su renta vitalicia, realizada el día {{ date('d/m/Y') }}.</p>
            <hr>
            <div class="alert">
              <p>N° solicitud:<strong> {{$nrotramite}} </strong> </p>
              <p>Rut: <strong> {{$rut}} </strong></p>
              <p></p>
            </div>
            <p>En un plazo de 4 días hábiles le enviaremos un correo informando el estado de su solicitud, detallando si ésta fue aceptada o rechazada:</p>
            <ul> 
              <li>En caso de ser aceptada, le indicaremos las fechas de pago.</li>
              <li>Si su solicitud fue rechazada, le informaremos sobre el motivo para que pueda corregirlo e ingresar su solicitud nuevamente, si es que corresponde.</li>
            </ul>
            <hr>
            <p class="text-center my-3"><strong>Recibirás una copia de esta información a tu correo </strong></p>
            <hr>
            <div class="botonera botonera-centrada">
              <button class="btn btn-primary" onclick="print()">Imprimir</button>

              <small class="text-center my-3">Si quieres <strong>descargar el comprobante</strong>, puedes clickaer en imprimir y en la pantalla emergente seleccionar guardar como PDF o seleccionar Microsoft print to PDF</small>
              
              
              <a class="btn btn-link" href="https://www.rentanacional.cl/home.php">Ir a Renta Nacional </a></div>
          </div>
            <div class="logo-print"></div>
        </div>
      </div>

    </main>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
  </body>
</html>

