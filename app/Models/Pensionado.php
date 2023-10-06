<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Pensionado
 *
 * @method static Builder|Pensionado generateSessionRut($value)
 */
class Pensionado extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pensionados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'rut',
        'dv',
        'tipo',
        'tope_retiro',
        'rut_titular',
        'dv_titular'
    ];

    /**
     * Generacion de rut para guardar en solicitud
     *
     * @param object $resultPensionado
     * @return void
     */
    public static function generateSessionRut($resultPensionado,$num_serie){
        switch ($resultPensionado->tipo) {
            case 'TITULAR':
                session()->put([
                    'rut' => $resultPensionado->rut,
                    'dv' => $resultPensionado->dv,
                    'tipo'=> 'TITULAR',
                    'num_serie' => $num_serie
                    ]);
                break;
            case 'BENEFICIARIO':
                session()->put([
                    'rut'=> $resultPensionado->rut_titular,
                    'dv' => $resultPensionado->dv_titular,
                    'tipo'=> 'BENEFICIARIO',
                    'rut_beneficiario' => $resultPensionado->rut,
                    'dv_beneficiario' => $resultPensionado->dv,
                    'num_serie'=> $num_serie
                ]);
            break;
        }
    }
}