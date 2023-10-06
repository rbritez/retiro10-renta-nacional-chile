<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pensionado;
use App\Models\Solicitud;

class SolicitanteController extends Controller
{
    public function __constructor(){
        // $array = [
        //     'rut' => request()->rut,
        //     'afiliado' => request()->afiliado,
        // ];
        // if (request()->rut){
        //     $this->validateRut($array);
        // }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solicitud.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEjecutivo(Request $request,$id)
    {
        session()->put('ejecutivo',$id);
        return view('solicitud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Compare Rut whit DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateRut(Request $request)
    {
        $rutCompleto = explode("-", $request->rut);
        //$resultPensionado;
    //    dd($request->beneficiario);
        if ($request->beneficiario == 'true'){
            // dd('si');
            $rutTitularCompleto = explode("-", $request->rut_titular);
            $resultPensionado = Pensionado::where(
                [
                    'rut'=> $rutCompleto[0],
                    'dv' => $rutCompleto[1],
                    'tipo' => 'BENEFICIARIO',
                    'rut_titular'=> $rutTitularCompleto[0],
                    'dv_titular' => $rutTitularCompleto[1],
                ]
                )->first();
                $resultSolicitud = Solicitud::where(['rut_pensionado'=> $rutTitularCompleto[0], 'dv_pensionado' => $rutTitularCompleto[1] ])->whereIn('estado',['0','1','5','6'])->get();
        } else {
            // dd('no');
            $resultPensionado = Pensionado::where(
                [
                    'rut'=> $rutCompleto[0],
                    'dv' => $rutCompleto[1],
                    'tipo' => 'TITULAR'
                ]
            )->first();
            $resultSolicitud = Solicitud::where(['rut_pensionado'=> $rutCompleto[0], 'dv_pensionado' => $rutCompleto[1]])->whereIn('estado',['0','1','5','6'])->get();
        }


        // 0 = ingresada --
        // 1 = aceptado --
        // 2 = rechazada
        // 3 = anulada
        // 4 = expirada
        // 5 = confirmada --
        // 6 = pagada --



        if (!$resultPensionado) {
            return response()->json(['response' => ['code' => '1','mensage' => 'No es pensionado o beneficiario.']], 200);
        } else{
            if (count($resultSolicitud) == 0){
                Pensionado::generateSessionRut($resultPensionado,$request->num_serie);
                if($request->ejecutivo!=0){
                    //escribir log para asociar el ejecutivo a la solicitud
                    //datos: fechahora;codigo_ejecutivo;rut_solicitante;rut_titular
                    //date_default_timezone_set("America/Santiago");
                    $archivo = "/var/www/html/logs/".date("Ymd")."-ejecutivos.log";
                    $fp = fopen($archivo,"a");
                    if ($request->beneficiario == 'true'){
                        fwrite($fp,date("YmdHis").";".$request->ejecutivo.";".$request->rut.";".$request->rut_titular."\n");
                    }else{
                        fwrite($fp,date("YmdHis").";".$request->ejecutivo.";".$request->rut."; \n");
                    }
                    fclose($fp);
                }
                return response()->json(['response' => ['code' => '0','mensage' => 'No tiene solicitud. Puede avanzar','body' => $resultPensionado]], 200);
            } else {
                return response()->json(['response' => ['code' => '2','mensage' => 'Tiene solicitud. No puede avanzar']], 200);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function errorSolicitante($code){
        // return "esto muestra $code";

        $codigo = $code;
        return view('solicitud.error',compact('codigo'));
    }
}