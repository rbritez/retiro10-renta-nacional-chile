@component('mail::message')

<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; width: 100%;">
   <tbody>
      <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
         <td height="15" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; hyphens: none; line-height: 15px; margin: 0; mso-line-height-rule: exactly; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">&nbsp;</td>
      </tr>
   </tbody>
</table>
<div class="cabecera">
    <h5 class="text-center" style="Margin: 0; Margin-bottom: 10px; color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; line-height: 1.3; margin: 0; margin-bottom: 10px; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: center !important; word-wrap: normal;"><strong>Su solicitud para el anticipo ha sido ingresada.</strong></h5>
    <p class="text-center" style="Margin: 0; Margin-bottom: 10px; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; margin-bottom: 10px; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: center !important;">Le informamos que se ha ingresado de forma exitosa su solicitud para el anticipo de su renta vitalicia, realizada el día {{$solicitud->fecha_solicitud->format('d-m-Y')}}</p>
</div>
<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; width: 100%;">
    <tbody>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td height="15" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; hyphens: none; line-height: 15px; margin: 0; mso-line-height-rule: exactly; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">&nbsp;</td>
        </tr>
    </tbody>
</table>
    <hr>
<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; width: 100%;">
    <tbody>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td height="15" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; hyphens: none; line-height: 15px; margin: 0; mso-line-height-rule: exactly; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">&nbsp;</td>
        </tr>
    </tbody>
</table>
<table class="table table-striped" style="border-collapse: collapse; border-spacing: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; width: 100%;">
    <tbody>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background-color: #f3f3f3; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: bold; hyphens: none; line-height: 1.3; margin: 0; padding-bottom: 5px; padding-left: 0; padding-right: 0; padding-top: 5px; text-align: left; vertical-align: top; width: 300px !important; word-break: none; word-wrap: break-word;">Nombre del solicitante</td>
            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background-color: #f3f3f3; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: normal; hyphens: none; line-height: 1.3; margin: 0; padding-bottom: 5px; padding-left: 0; padding-right: 0; padding-top: 5px; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">{{$solicitud->solicitante->nombre}}</td>
        </tr>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: bold; hyphens: none; line-height: 1.3; margin: 0; padding-bottom: 5px; padding-left: 0; padding-right: 0; padding-top: 5px; text-align: left; vertical-align: top; width: 300px !important; word-break: none; word-wrap: break-word;">Número de Solicitud</td>
            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: normal; hyphens: none; line-height: 1.3; margin: 0; padding-bottom: 5px; padding-left: 0; padding-right: 0; padding-top: 5px; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">{{$solicitud->id}}</td>
        </tr>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background-color: #f3f3f3; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: bold; hyphens: none; line-height: 1.3; margin: 0; padding-bottom: 5px; padding-left: 0; padding-right: 0; padding-top: 5px; text-align: left; vertical-align: top; width: 300px !important; word-break: none; word-wrap: break-word;">RUT del solicitante</td>
            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background-color: #f3f3f3; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: normal; hyphens: none; line-height: 1.3; margin: 0; padding-bottom: 5px; padding-left: 0; padding-right: 0; padding-top: 5px; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">{{$solicitud->rut_pensionado}}-{{$solicitud->dv_pensionado}}</td>
        </tr>
    </tbody>
</table>
<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; width: 100%;">
    <tbody>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td height="15" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; hyphens: none; line-height: 15px; margin: 0; mso-line-height-rule: exactly; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">&nbsp;</td>
        </tr>
    </tbody>
</table>
    <hr>
<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; width: 100%;">
    <tbody>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td height="15" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; hyphens: none; line-height: 15px; margin: 0; mso-line-height-rule: exactly; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">&nbsp;</td>
        </tr>
    </tbody>
</table>

<p style="Margin: 0; Margin-bottom: 10px; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; margin-bottom: 10px; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left;">En un plazo de 4 días hábiles le enviaremos un correo informando el estado de su solicitud, detallando si ésta fue aceptada o rechazada:</p>
<ul>
    <li>En caso de ser aceptada, le indicaremos las fechas de pago.</li>
    <br>
    <li>Si su solicitud fue rechazada, le informaremos sobre el motivo para que pueda corregirlo e ingresar su solicitud nuevamente, si es que corresponde.</li>
</ul>
<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; width: 100%;">
    <tbody>
        <tr style="padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top;">
            <td height="30" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: none; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding-bottom: 0; padding-left: 0; padding-right: 0; padding-top: 0; text-align: left; vertical-align: top; word-break: none; word-wrap: break-word;">&nbsp;</td>
        </tr>
    </tbody>
</table>

@endcomponent
