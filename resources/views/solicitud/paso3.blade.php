
@extends('solicitud.app')

@section('forms')
<div id="paso-3">
    <div class="back-wrap"><a class="link-regresar" href="/paso2">
    <span class="material-icons">arrow_back</span> Regresar </a></div>
    <h3 class="mb-3 page-title">Condiciones</h3>
    <div class="form-group"> 
      <h4>Información de la vía de pago</h4>
      <div class="alert alert-warning">
        <p>
  El monto del anticipo se pagará en 1 cuota en un plazo máximo de 30 días hábiles a contar de la fecha de la solicitud.<br>
El pago se realizará por la misma vía en que se paga la pensión

        </p>
      </div>
    </div>
    <hr>
    <div class="form-group"> 
      <h5>Selección de porcentaje del Retiro Anticipado de Rentas Vitalicias</h5>
      <p>
       Puede retirar hasta el 10% del valor de su reserva técnica con un tope máximo de UF 150. 
      </p>
      <div class="form-check"> 
        <input class="form-check-input" type="radio" name="monto-retiro" id="monto-maximo" value="monto-maximo" checked>
        <label class="form-check-label" for="monto-maximo">Sí, quiero retirar el máximo permitido por ley.</label>
      </div>
      <div class="form-check" id="form-check-monto-variable">
        <input class="form-check-input" type="radio" name="monto-retiro" id="monto-variable" value="monto-variable">
        <label class="form-check-label" for="monto-variable">No, quiero anticipar menos</label>
        <div class="input-group d-none">
  <select class="form-control" id="anticipar-menos" name="monto">
      <option selected>Seleccion...</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
  <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
  <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
    </select>
          <div class="input-group-append"><span class="input-group-text">%</span></div>
        </div>
      </div>
      <table class="table my-3 table-bordered table-informacion-retiro">
        <thead class="thead-dark"> 
          <tr>
            <th>Saldo de reserva técnica</th>
            <th>Monto máximo de retiro</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Saldo menor a UF 35<span class="light">($1.032.295 aprox.)</span></td>
            <td>Hasta tu saldo total ahorrado</td>
          </tr>

          <!--
          <tr>
            <td>Saldo entre UF 35 y UF 1.500<span class="light">($1.032.295 y $44.241.195 aprox.)</span></td>
            <td>Hasta el 10% de su reserva técnica</td>
          </tr>
          <tr>
            <td>Saldo mayor a UF 1.500<span class="light">($44.241.195 aprox.)</span></td>
            <td>Hasta UF 150<span class="light">($4.424.120 aprox.)</span></td>
          </tr>-->
        </tbody>
      </table>
      <div class="footnote"><small class="info-tabla">(*)Montos en pesos son referenciales en base a la UF del día 30 de abril 2021</small><small class="info-tabla">Recuerde que su reserva técnica está contabilizada en cuotas del Fondo respectivo. Por lo tanto, para determinar el monto en pesos del Retiro Anticipado de Rentas Vitalicias, se considerará el valor cuota del día hábil anteprecedente al del pago. Es decir, el monto del Retiro Anticipado de Rentas Vitalicias puede variar de acuerdo a la fluctuación del valor cuota desde la fecha de la solicitud hasta la fecha del cargo en su cuenta personal.</small></div>
    </div>
    <hr>
    <div class="form-group"> 
      <h5>¿Tiene deuda por pensión alimenticia?</h5>
      <div class="form-check"> 
        <input class="form-check-input" type="radio" name="deuda" id="deuda-si" value="deuda-si">
        <label class="form-check-label" for="deuda-si">Si</label>
      </div>
      <div class="form-check"> 
        <input class="form-check-input" type="radio" name="deuda" id="deuda-no" value="deuda-no">
        <label class="form-check-label" for="deuda-no">No</label>
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
        <li>Declaro conocer que el monto de la pensión se recalculará considerando el menor saldo de la reserva técnica, en el mes en que corresponde su anualidad. En caso de retirar la totalidad del saldo en mi reserva técnica podría quedarme sin pensión, de no tener acceso a beneficios del pilar solidario.
        Declaro bajo juramento que NO soy autoridad pública de las señaladas en el artículo 38 bis, tales como Presidente de la República, Senadores, Diputados, Ministros de Estado, Gobernadores Regionales, funcionarios de exclusiva confianza del Jefe de Estado que señalan los números 7 y 10 del artículo 32 de la Constitución Política del Estado y los contratados sobre la base de honorarios que asesoren directamente a las autoridades gubernativas antes indicadas.</li>
        </ul>
    </div>
    <div class="form-group form-check"> 
      <input class="form-check-input" type="checkbox" name="acepto" id="acepto" value="acepto">
      <label class="form-check-label" for="acepto">Acepto los terminos y condiciones</label>
    </div>
    <hr>
    <div class="form-group botonera botonera-centrada my-4">
      <button class="btn btn-primary mb-2 btn-block" type="submit">Enviar solicitud</button><a class="btn btn-link mb-2 btn-regresar" href="/paso2"><span class="material-icons">arrow_back</span>Regresar </a>
    </div>
  </div>
  @stop