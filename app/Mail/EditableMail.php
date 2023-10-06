<?php
namespace App\Mail;

class EditableMail{

    /**
     * Undocumented function
     *
     * @param object $solicitud
     * @return string $html
     */
    public static function bodyEmail($solicitud){
        return $html = '<!DOCTYPE html
                            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            <meta name="color-scheme" content="light">
                            <meta name="supported-color-schemes" content="light">
                            <style>
                            @media only screen and (max-width: 600px) {
                                .inner-body {
                                    width: 100% !important;
                                }

                                .footer {
                                    width: 100% !important;
                                }
                            }

                            @media only screen and (max-width: 500px) {
                                .button {
                                    width: 100% !important;
                                }
                            }
                            </style>
                        </head>

                        <body>

                            <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td align="center">

                                        <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                            <table role="presentation" align="center" width="600" cellpadding="0" cellspacing="0" height="64">
                                                <tr style="height: 4px; background-color: gray;">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0; text-align: center;">
                                                        <a href="" target="_blank">
                                                        <img src="https://seguros.rentanacional.cl/wp-content/uploads/2021/02/logo-sm-email.png" alt="logo-renta-nacional" >
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                            <tr>
                                                <td class="body" width="100%" cellpadding="0" cellspacing="0">
                                                    <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                                                        role="presentation">
                                                        <!-- Body content -->
                                                        <tr>
                                                            <td class="content-cell">
                                                                <h3 class="welcome-greeting">Estimado/a '.$solicitud['nombre'].'</h3>
                                                                
                                                                Hemos recibido su solicitud Nro '.$solicitud['folio'].',
                                                                <b>realizada el día '.date('d/m/Y').'.</b>
                                                                <hr class="hr-format">

                                                                <ul>
                                                                    <li><b class="list-color">Nro solicitud:</b>'.$solicitud['folio'].'</li>
                                                                    <li><b class="list-color">Rut:</b>'.$solicitud['rut'].'</li>
                                                                    <li>
                                                                </ul>

                                                                <hr class="hr-format">
                                                                En un plazo de 4 días hábiles le enviaremos un correo informando
                                                                el estado de su solicitud detallando si ésta fue aceptada o rechazada. <br><br>

                                                                Si usted no realizó esta solicitud, favor comunicarse en forma urgente al 800 200 050 o enviar un correo a retiroanticiporrvv@rentanacional.cl.<br><br>
<b>Usted puede realizar el retracto de su solicitud hasta el día anterior a la fecha de pago del monto solicitado, comunicándolo a la Compañía al correo retiroanticiporrvv@rentanacional.cl. Si es así se realizará la verificación y se procederá a anular la solicitud.</b>
Usted más adelante puede ingresar una nueva solicitud en el plazo de 365 días desde publicada la ley.


                

                                                                <br><br>Saludos.<br>Renta Nacional
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table class="footer" align="center" width="600" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td align="center"
                                                                style="font-family: sans-serif; font-size: 12px; text-align: right; color: #ffffff;">
            
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                        <style>
                        .list-color {
                            color: red;
                            font-weight: bold;
                        }

                        .hr-format {
                            width: 300;
                            color: red;
                        }
                        </style>

                        </html>';

    }
}