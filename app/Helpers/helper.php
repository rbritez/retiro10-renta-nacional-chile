<?php

use App\Mail\EditableMail;
use App\Models\Solicitante;
use App\Models\Solicitud;
use Illuminate\Support\Collection;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;


//@temporal para no sobreescribir rutas y metodos por cada vista
if (!function_exists('theme')) {
    function theme($view)
    {
        $site_id = config('site.id');

        if (view()->exists( $site_id. "::$view")) {
            $view = $site_id . "::$view";
        }

        return $view;
    }

    function sendSMS($celular,$mensaje){
        $mensaje = str_replace(' ','+',$mensaje);
        $celular = str_replace('+','',$celular);
        $url = 'horus.isc.cl/horus/sendsms?usuario=renta&password=Renta2021&destinatario='.$celular.'&mensaje='.$mensaje;
        //genero la conexion
        $conexion = curl_init();
        curl_setopt($conexion,CURLOPT_URL,$url);
        curl_setopt($conexion,CURLOPT_RETURNTRANSFER,true);
        //recuperamos la respuesta
        $result = curl_exec($conexion);

        //cierro conexion
        curl_close($conexion);
        return $result;
    }

    function sendEmail($solicitud) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env('PHPMAILER_HOST');                          //  smtp host
            $mail->SMTPAuth = env('PHPMAILER_SMTPAUTH');
            if(env('PHPMAILER_SMTPAUTH')){
                $mail->Username = env('PHPMAILER_USERNAME');            //  sender username
                $mail->Password = env('PHPMAILER_PASSWORD');            // sender password
                $mail->SMTPSecure = env('PHPMAILER_SMTPSECURE');          // encryption - ssl/tls
            }

            $mail->Port = env('#MAIL_PORT');                          // port - 587/465
            $mail->CharSet = 'UTF-8';


            $mail->setFrom(env('PHPMAILER_SETFROM'), 'Renta Nacional Rentas Vitalicias');
            $mail->addAddress($solicitud->email,$solicitud->solicitante->nombre);
            // $mail->addAddress($solicitud->email,$solicitud->solicitante->nombre);
        /*  agregar a copia los correos de la tabla beneficiarios
        /*  si el email es distinto al cargado en solicitudes. MIENTRAS TENGA @

            $mail->addCC($solicitud->emailCc);
            $mail->addBCC($solicitud->emailBcc); */
            if(!env('PHPMAILER_TEST')){
                $mail->addReplyTo('retiroanticiporrvv@rentanacional.cl', 'Renta Nacional');
            }

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            //$mail->Subject = 'Aviso de Solicitud de Retiro'.$solicitud->folio;
            $mail->Subject = 'Hemos Recepcionado su Solicitud de Retiro Anticipado de Rentas Vitalicias';
            //HTML a insertar
            $rut = $solicitud->solicitante->rut.'-'.$solicitud->solicitante->dv; // se concatena el rut y dv

            $mail->Body  = EditableMail::bodyEmail(['nombre' => $solicitud->solicitante->nombre,'rut'=>$rut,'folio'=>$solicitud->folio]);

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }

            else {
                return back()->with("success", "Email has been sent.");
            }

        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }

    function consultaSoap($rutCompleto,$num_serie,$codEjecutivo){

        $url ='https://ws.transunionchile.cl/ws_frmdxt.asmx?WSDL';
        $user = 'RNS.TITANIUMWS';
        $pass='9T4zVHL8';
            $client = new \nusoap_client($url, true);
            $params = array(
                        'IdUser'  => $user,
                        'IdPassw'    => $pass,
                        'idRut' => $rutCompleto,
                        'idNserie' => $num_serie,
                        'IdMod' => 'R',
                        'IdMisc' => '1'
                    );
            $result = $client->call('DxttransaccionN', $params);

            if($client->fault){
                echo 'error en la conexion';
            }else{
               echo  $err = $client->getError();

                if($err){
                    Log::channel('SOAP_RUT')->info(json_encode($err, JSON_UNESCAPED_UNICODE));
                    return $err;    // controla error constructor
                }else{
                    $dct_respuesta = $result['Dct_respuesta']['dct_resumen'][0];
                    return verificationRut($rutCompleto,collect($dct_respuesta),$codEjecutivo);
                }
            }
    }

    function verificationRut($rut,$dct_respuesta,$codEjecutivo){
                    //bloqueo de cedula ,
                    //      **si es no vigente se rechaza la solicitud si el codigo_ejecutivo es null.
                    //      **si es vigente "no pasa nada".
                    //      **si dct_resumen_defuncion] es SI. se rechaza la solicitud.
                    //dct_resumen_defuncion
        $status = true;
        if($dct_respuesta['dct_resumen_defuncion'][0]['defuncion'] == "SI"){
            Log::channel('SOAP_RUT')->info(json_encode([
                        'rut_completo'=>$rut,
                        'defuncion' => $dct_respuesta['dct_resumen_defuncion'][0]['defuncion']
            ], JSON_UNESCAPED_UNICODE));
            $status= false;
        }
        if($dct_respuesta['dct_resumen_bloqueo_cedula'][0]['bloqueo_cedula'] != "Vigente" && $codEjecutivo == null){
            Log::channel('SOAP_RUT')->info(json_encode([
                        'rut_completo'=>$rut,
                        'bloqueo_cedula' => $dct_respuesta['dct_resumen_bloque_cedula'][0]['bloque_cedula']
                ], JSON_UNESCAPED_UNICODE));
            $status= false;
        }

        return $status;
    }
}