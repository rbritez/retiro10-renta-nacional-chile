<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Solicitante;
use Illuminate\Support\Facades\Storage;

class Solicitud extends Model
{
    use HasFactory;

    const FOLIO_FORMAT = 'SR00';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solicitudes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'folio',
        'id_solicitante',
        'email',
        'celular',
        'region',
        'comuna',
        'direccion',
        'rut_pensionado',
        'dv_pensionado',
        'rut_apoderado',
        'porc_retiro',
        'monto_retiro',
        'deudor_alimentos',
        'aceptar_condiciones',
        'estado',
        'fecha_solicitud',
        'fecha_aceptado',
        'fecha_rechazado',
        'fecha_pagado',
        'codigo_ejecutivo'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array $dates
     */
    protected $dates = [
        'fecha_solicitud',
        'fecha_aceptado',
        'fecha_rechazado',
        'fecha_pagado',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class,'id_solicitante','id');
    }



    public static function generateNumberFolio(){
        $UlitmaSolicitud = Solicitud::orderBy('id','desc')->first();
        if(!$UlitmaSolicitud){
            return self::FOLIO_FORMAT. 1;
        }
        return self::FOLIO_FORMAT.($UlitmaSolicitud->id + 1);
    }

    public static function searchRegion($numero){

        $regiones = json_decode(Storage::get('json\regionesComunas.json'));

        foreach($regiones as $region) {
            if ($region->numero == $numero) {
                return $region->region;
            }
        }
    }

    public static function searchComuna(){

    }
}