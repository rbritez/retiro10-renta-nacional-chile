<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitudRequest;
use App\Mail\SolicitudExitosa;
use App\Models\Solicitante;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solicitud.index',[
            'rutValidation' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regiones = json_decode(Storage::get('json\regionesComunas.json'));
        return view('solicitud.paso2', ['regiones' => $regiones]);
    }

    public function getComunas($numero){
        $regiones = json_decode(Storage::get('json\regionesComunas.json'));
        foreach($regiones as $region) {
            if ($region->numero == $numero) {
                return $region->comunas;
            }
        }
        return [];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSolicitudRequest $request)
    {
        request()->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'fecha_nacimiento' => 'required|date',
        ]);

        $solicitante = Solicitante::where([
            ['rut', (session()->get('tipo')=='TITULAR')?session()->get('rut'):session()->get('rut_beneficiario')],
                                            ])->first();
        if(!$solicitante){
            $solicitante = Solicitante::create([
                'rut' => (session()->get('tipo')=='TITULAR')?session()->get('rut'):session()->get('rut_beneficiario'),
                'dv' => (session()->get('tipo')=='TITULAR')?session()->get('dv'):session()->get('dv_beneficiario'),
                'num_serie' => session()->get('num_serie'),
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'fecha_nacimiento' => $request->fecha_nacimiento,
            ]);

        }else{
            $solicitante->update([
                'rut' => (session()->get('tipo')=='TITULAR')?session()->get('rut'):session()->get('rut_beneficiario'),
                'dv' => (session()->get('tipo')=='TITULAR')?session()->get('dv'):session()->get('dv_beneficiario'),
                'num_serie' => session()->get('num_serie'),
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'fecha_nacimiento' => $request->fecha_nacimiento,
            ]);
        }






        $solicitud = Solicitud::create([
            'folio'=> Solicitud::generateNumberFolio(),
            'id_solicitante' => $solicitante->id,
            'email' => $request->email,
            'celular' => $request->celular,
            'region' => Solicitud::searchRegion($request->region),
            'comuna' => $request->comuna,
            'direccion' => $request->direccion,
            'rut_pensionado' => session()->get('rut'),
            'dv_pensionado' => session()->get('dv'),
            'rut_apoderado' => $request->rut_apoderado,
            'porc_retiro' => NULL, //campo en DB como obligatorio
            'monto_retiro' => NULL,
            'deudor_alimentos' => ($request->deudor_alimentos == 'on')? 1: 0,
            'aceptar_condiciones' => ($request->aceptar_condiciones == 'on')?1:0,
            'codigo_ejecutivo' => session()->get('ejecutivo'),
            'estado' => 0,
            'fecha_solicitud' => Carbon::now(),
        ]);

        sendEmail($solicitud);
        $mensaje = "Solicitud ".$solicitud->folio." de retiro de anticipo ingresada en Renta Nacional.";
        sendSMS($solicitud->celular,$mensaje);

        if ($solicitud->rut_pensionado != $solicitud->solicitante->rut){
            $solicitud['rut_pensionado'] = $solicitud->solicitante->rut;
            $solicitud['dv_pensionado'] = $solicitud->solicitante->dv;
        }
        session()->forget(['rut','dv','tipo','num_serie']);
        if(session()->has('ejecutivo')){
            session()->forget('ejecutivo');
        }

        if(session()->has('rut_beneficiario')){
            session()->forget(['rut_beneficiario','dv_beneficiario']);
        }
        return response()->json(['response' =>
            ['code' => 200,'mensage' => 'Solicitud Creada con Exito1','body' => $solicitud]], 200);

    }


    public function exito($folio,$rut){
        return view('solicitud.exito',[
            'nrotramite' => $folio,
            'rut' => $rut
        ]);
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
}