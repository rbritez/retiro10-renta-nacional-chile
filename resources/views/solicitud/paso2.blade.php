
@extends('solicitud.app')

@section('forms')
  <div id="paso-2">
      <div class="back-wrap">
        <a class="link-regresar" href="{{route('home.landing')}}">
        <span class="material-icons">arrow_back</span> Regresar </a>
      </div>
      <h3 class="mb-3 page-title">Información del solicitante</h3>
      @if($errors->any())
            @foreach ($errors->all() as $error )
                   <div class="alert alert-danger" >{{$error}}</div>
            @endforeach
      @endif
    {{-- <form action="{{ route('solicitud.store')}}" method="post"> --}}
    <form action="" method="post" autocomplete="OFF">
      @csrf
      <div class="form-row my-4">
        <div class="form-group col-lg-6">
          <label for="nombres">Nombres </label>
          <input class="form-control" type="text" name="nombres" id="nombres" autocomplete="off">
        </div>
        <div class="form-group col-lg-6">
          <label for="apellido-paterno">Apellido Paterno</label>
          <input class="form-control" type="text" name="apellido-paterno" id="apellido-paterno">
        </div>
        <div class="form-group col-lg-6">
          <label for="apellido-materno">Apellido Materno</label>
          <input class="form-control" type="text" name="apellido-materno" id="apellido-materno">
        </div>
      </div>
      <div class="form-row">     
        <div class="form-group col-lg-6"> 
          <label for="nacimiento">Fecha de nacimiento</label>
          <input class="form-control" type="date" name="nacimiento"  id="nacimiento" placeholder="20-12-1950">
        </div>

        <div id="apoderado-group" class="form-group col-lg-6 d-none"> 
          <label for="apoderado">Por Favor ingresa el RUT de tu apoderado</label>
          <input class="form-control" type="text" name="apoderado" id="apoderado" placeholder="11111111-1" oninput="validateRutApoderado()">
          <small class="form-info mt-2"><span class="material-icons">info</span> Al ser menor de edad debemos solicitar el rut de tu apoderado</small>
          <div class="invalid-feedback" id="errorApoderado" style="display:none;">
            El Rut ingresado no es válido!.
        </div>
        </div>
      </div> 
      <hr>
      <h5 class="form-title">Información de contacto</h5>
      <div class="form-row my-4">
        <div class="form-group col-lg-6">
          <label for="correo">Correo Eléctronico</label>
          <input class="form-control" type="email" id="correo" name="correo" placeholder="ejemplo@ejemplo.cl" oninput="valitEmail()">
          <div class="invalid-feedback" id="errorCorreo" style="display:none;">
              El Correo ingresado no tiene un formato valido!.
          </div>
        </div>
        <div class="form-group col-lg-6">
          <label for="correo-confirm">Confirmar correo eléctronico</label>
          <input class="form-control" type="email" name="correo-confirm" id="correo-confirm" oninput="validatorEmailConfirm()">
          <div class="invalid-feedback" id="errorCorreoConfirm" style="display:none;">
              El Correo ingresado no tiene un formato valido!.
          </div>
          <div class="invalid-feedback" id="errorCorreoDuplicado" style="display:none;">
              El Correo ingresado no coincide con el primero!.
          </div>
        </div>
      </div>
      <div class="form-row my-4">
        <div class="form-group col-lg-6">
          <label for="movil">Teléfono celular o fijo</label>
          <input class="form-control" type="text" id="movil" name="movil" placeholder="+56995939384" oninput="valitTelefono()">
          <div class="invalid-feedback" id="errorTelefono" style="display:none;">
              El teléfono ingresado no tiene un formato válido del tipo +56995939384 !.
          </div>
        </div>
        <div class="form-group col-lg-6">
          <label for="movil-confirm">Confirmar teléfono</label>
          <input class="form-control" type="text" id="movil-confirm" name="movil-confirm" placeholder="+56995939384" oninput="validatorTelefonoConfirm()">
          <div class="invalid-feedback" id="errorTelefonoConfirm" style="display:none;">
              El teléfono ingresado no tiene un formato válido del tipo +56995939384 !.
          </div>
          <div class="invalid-feedback" id="errorTelefonoDuplicado" style="display:none;">
              Los teléfonos ingresados no coinciden!.
          </div>
        </div>
      </div>
      <hr>
      <h5 class="form-title">Dirección</h5>
      <div class="form-row my-2">
        <div class="form-group col-lg-6">
          <label for="regiones">Región</label>
          <select class="form-control" id="regiones" type="text" name="regiones" oninput="cargarComuna($(this).val())">
            <option value="0" >-- Selecciona tu región -- </option>
            @foreach ( $regiones as $region)
            <option value="{{$region->numero}}" > {{$region->region}} </option>
              
            @endforeach
          </select>
        </div>
        <div class="form-group col-lg-6">
          <label for="comunas">Comuna</label>
          <select class="form-control" id="comunas" type="text" name="comunas">
            <option value="0">-- Selecciona tu comuna -- </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="direccion">Calle, número y departamento</label>
        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Amunátegui 178, depto 123"><small>Incluir departamento solo si corresponde.</small>
      </div>
      <hr>
      <div class="form-group"> 
        <h4>Información de la vía de pago</h4>
        <div class="alert alert-warning">
          <p>
            El monto del anticipo se pagará en 1 cuota en un plazo máximo de 30 días corridos a contar de la fecha de la solicitud.<br>
              El pago se realizará por la misma vía en que se paga la pensión

          </p>
        </div>
      </div>
      <hr>
      <div class="form-group"> 
        <h5>¿Tiene deuda por pensión alimenticia?</h5>
        <div class="form-check"> 
          <input class="form-check-input" type="radio" name="deuda" id="deuda-si" value="deuda-si" onclick="selection()">
          <label class="form-check-label" for="deuda-si" >Si</label>
        </div>
        <div class="form-check"> 
          <input class="form-check-input" type="radio" name="deuda" id="deuda-no" value="deuda-no" onclick="selectionNo()">
          <label class="form-check-label" for="deuda-no"  >No</label>
        </div>
      </div>
      <hr>
      <div class="form-group condiciones">
          <h5 class="mb-3">Para continuar con su solicitud, debe aceptar que está en conocimiento de las siguientes condiciones:</h5>
          <ul>

          
          <li>
            Conozco y acepto que el monto del Retiro Anticipado de Rentas Vitalicias tendrá un impacto negativo en el monto de mi pensión.
          </li>
          <li>Autorizo a Renta Nacional Rentas Vitalicias a utilizar los datos de esta solicitud en el envío de todo tipo de comunicaciones relacionadas con la renta vitalicia.
          </li>
          <li>Acepto que se descuente la compensación por divorcio ordenada por fallo judicial, pagándome la diferencia resultante si correspondiera.
          </li>
          <li>Declaro conocer que el monto de la pensión se recalculará considerando el menor saldo de la reserva técnica, en el mes en que corresponde su anualidad. En caso de retirar la totalidad del saldo en mi reserva técnica podría quedarme sin pensión, de no tener acceso a beneficios del pilar solidario.</li>
          <li>Declaro bajo juramento que NO soy autoridad pública de las señaladas en el artículo 38 bis, tales como Presidente de la República, Senadores, Diputados, Ministros de Estado, Gobernadores Regionales, funcionarios de exclusiva confianza del Jefe de Estado que señalan los números 7 y 10 del artículo 32 de la Constitución Política del Estado y los contratados sobre la base de honorarios que asesoren directamente a las autoridades gubernativas antes indicadas.</li>
          </ul>
      </div>
    </form>
      <div class="form-group form-check"> 
        <input class="form-check-input" type="checkbox" name="acepto" id="acepto" value="acepto" onclick="checkAcepto()">
        <label class="form-check-label" for="acepto" id="acepto" >Acepto los términos y condiciones</label>
      </div>
      <hr>
      <div class="alert alert-warning" role="alert" id="alert" style="display:none;">
        <strong>Atención!</strong> Ingrese todos los campos antes de avanzar.
        
      </div>
      <div class="alert alert-warning" role="alertDeudor" id="alertDeudor" style="display:none;">
        <strong>Atención!</strong> debe indicar si tiene <strong>deuda por pensión de alimentos.</strong>
        
      </div>
      <div class="alert alert-warning" role="alertTerminos" id="alertTerminos" style="display:none;">
        <strong>Atención!</strong> debe aceptar los  <strong>términos y condiciones</strong> para ingresar una solicitud.
        
      </div>
      <div class="alert alert-warning" role="alertApoderado" id="alertApoderado" style="display:none;">
        <strong>Atención!</strong> Por ser menor de edad debe ingresar el rut del <strong>apoderado</strong>.
        
      </div>
      <div class="form-group botonera botonera-centrada my-4">
        <button class="btn btn-primary mb-2 btn-block" type="button" id="button" onClick="post()" id="btn-save">Enviar solicitud</button>
        <a class="btn btn-link mb-2 btn-regresar" href="" ><span class="material-icons">arrow_back</span>Regresar </a>
      </div>
    </div>

      <!--
      <div class="form-group botonera"><a class="btn btn-primary mb-2" href="/paso3">Siguiente </a><a class="btn btn-link btn-regresar mb-2 mr-2" href="/inicio"><span class="material-icons">arrow_back</span> Regresar  </a></div> -->
    </div>
  </div>


@stop

@push('jsformulario')

  <script>
      // definimos la url desde env
      const APP_URL = '{{ env('APP_URL') }}';
      // const sessionRut = {{session()->get('rut')}}
      // const sessionDv = {{session()->get('dv')}}
      // const sessionTipo = {{session()->get('tipo')}}
      // const sessionNumSerie = {{session()->get('num_serie')}}
      // if (!{ {session()->has('rut') }}) {
      //   location.href = APP_URL;
      // }
      // fin de definicion 
      function cargarComuna(numero){

        const urlComunas = 'https://retiro10rentasvitalicias.rentanacional.cl/comunas/'+numero;
            
        $.ajax({
            url: urlComunas,
            type: 'GET',
            dataType: 'json',
            success: function (res) {
              if (res.length > 0) {
                    $('#comunas').empty();
                    // // $('#comunas').append(' <option> -- Selecciona tu comuna -- </option>')
                    res.forEach(comuna => {
                      $('#comunas').append(' <option> '+comuna+' </option>')
                    })
                  }            
              }
          });

     } 
 
  </script>
   <script src="{{ asset('js/validatorsFormulario.js') }}" type="text/Javascript"></script>
@endpush  
