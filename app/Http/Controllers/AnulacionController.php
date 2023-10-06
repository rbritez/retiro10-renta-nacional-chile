<?php

namespace App\Http\Controllers;

use App\Models\Solicitante;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class AnulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $status;

    public function index()
    {
        return view('anulacion.index');
    }

    public function exito()
    {
        return view('anulacion.exito');
    }

    public function error()
    {
        return view('anulacion.error');
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
        $rutCompleto = explode("-", $request->rut);
        $solicitante = Solicitante::where([['rut',$rutCompleto[0]],['dv',$rutCompleto[1]]])->first();
        if($solicitante){
            $solicitud = Solicitud::where('folio',$request->folio)->first();
            if($solicitud){
                if($solicitud->estado == 3){
                    $this->status = 3;
                }else{
                    $solicitud->update(['estado'=> 3]);
                    $this->status = 0;
                }
            }else{
                $this->status = 2;
            }
        }else{
            $this->status = 1;
        }

        return response()->json([ 'response' =>['code' => $this->status] ], 200);


        // respuesta
        // codigo 0 si la anulacion fue correcta
        // codigo 1 si la anulacion no se realizo debido a que el rut no es solicitante
        // codigo 2 si la anulacion no se realizo debido a que el folio no es correcto

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
