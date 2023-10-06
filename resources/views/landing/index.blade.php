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
    <header class="landing">
        <img class="logotype" src="{{ URL::asset('images/logo-renta-sm.svg') }}" alt="logo renta nacional" height="70" width="150">
    </header>
    <main class="pb-5">
      <div class="bg-imgae" id="banner">
        <h1 class="main-title">Seleccione la opción que desee realizar</h1>
      </div>
      <section class="cta-container"> 
        <div class="container-sm">
          <div class="row">
            <div class="col-lg-4 offset-lg-2">
              <div class="card card-banner mb-5"><a href="{{ route('inicio.eleccion') }}"> <img class="card-img-top" src="{{ URL::asset('images/foto-retiro.jpg') }}" alt="imagen retiro"></a>
                <div class="card-body">
                  <h5 class="card-title">Retiro Anticipado de <br><span class="featured">Rentas Vitalicias</span></h5><a class="btn btn-primary" href="{{ route('inicio.eleccion') }}">Ir al retiro</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-banner mb-5"><a href="https://www.rentanacional.cl/home.php"><img class="card-img-top" src="{{ URL::asset('images/foto-sitio.jpg') }}" alt="imagen retiro"></a>
                <div class="card-body">
                  <h5 class="card-title">Ir al sitio de <br> <span class="featured">Rentanacional.cl</span></h5><a class="btn btn-outline-primary" href="https://www.rentanacional.cl/home.php">Ir al sitio web</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <p class="color-dark text-center footer-footnote mt-3">Sitio web optimizado para la última versión de Chrome, Firefox</p>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
  </body>
</html>

