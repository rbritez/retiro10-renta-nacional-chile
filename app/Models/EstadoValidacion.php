<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoValidacion extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_estados';

    protected $fillable = [
        'id',
        'id_solicitud',
        'id_estado',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function solicitud(){
        return $this->hasMany(Solicitud::class,'id','id_solicitud');
    }

    public function estado(){
        return $this->hasMany(EstadoValidacion::class,'id','id_solicitud');
    }

}