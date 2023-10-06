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

        <div class="card card-formulario" >
          <div class="card-body">

            <div class="step-wrap">
              <ul class="steps">
                <li class="step-item"><span class="step-number">1</span><span class="step-text">Paso 1</span></li>
                <li class="step-item active"> <span class="step-number">2</span><span class="step-text">Paso 2</span></li>
                <!--<li class="step-item"> <span class="step-number">3</span><span class="step-text">Paso 3</span></li> -->
              </ul>
            </div>
            <div class="content-form">
                  @yield('forms')
            </div>
        </div>

        </div>
      </div>
      <p class="color-dark text-center footer-footnote mt-3">Sitio web optimizado para la última versión de Chrome, Firefox</p>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/moment.js') }}"></script>
    
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    @stack('jsformulario')
  </body>
</html>

