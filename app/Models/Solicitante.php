<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Solicitud;

class Solicitante extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solicitantes';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'rut',
        'dv',
        'num_serie',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento'
    ];
    protected $dates =[
        'fecha_nacimiento'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class,'id_solicitante','id');
    }

}