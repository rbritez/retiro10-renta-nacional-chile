<!DOCTYPE html>
<html lang="es">
  @include('head')
  <body>
    @include('header')
    <main>

      <section id="inicio-proceso">
        <div class="container">

              <h2 class="main-title text-white text-center">Socilitud de Retiro Anticipado de <br> Rentas Vitalicias</h2>

        </div>
      </section>

      @include('inicio.relevante')

      <section class="ingreso py-5">
        <div class="container">
          <div class="row">
            <div class="col align-self-center">
              <h4 class="text-center">Ingreso a formulario de solicitud de Retiro Anticipado de Rentas Vitalicias</h4>
               @include('inicio.box') 
            </div>
          </div>
        </div>
      </section>
      @include('inicio.info')

      @include('inicio.faq')
      <section class="my-5 mb-3">
        <div class="container">

          <div class="alert alert-warning">
              <p> Como Compañía pondremos a disposición de nuestros pensionados toda la información relevante del proceso a partir del <strong>lunes 3 de mayo.</strong>  </p>
              <p>Prefiera los canales remotos para su atención, para evitar aglomeraciones en las Sucursales y evitar posibles contagios.</p>
             <p> La solicitud la podrá realizar a través de nuestro sitio <a href="https://www.rentanacional.cl" class="link"> www.rentanacional.cl</a> y a través del <strong>Call Center al <a href="tel: 800 200 050"> 800 200 050 </a> o desde celulares al<a href="tel: 22670 02 02"> 22670 02 02</a> opción 1. </strong>   </p>
             <p><strong>Nunca lo llamaremos ni solicitaremos claves para solicitar el retiro, siempre prefiera los medios oficiales de contacto.</strong> </p>

          </div>


        </div>
      </section>



      @include('inicio.ayuda')

      


      <p class="color-dark text-center footer-footnote mt-3">Sitio web optimizado para la última versión de Chrome, Firefox</p>
    </main>
    @include('scripts')
  </body>
</html>