<?php

namespace App\Console\Commands;

use App\Models\Solicitante;
use App\Models\Solicitud;
use Illuminate\Console\Command;

class verifiedRequestRut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solicitante:verificarRut {--solicitante_id= : Filtrar Solicitante por ID}
                                                     {--fecha_desde= : Filtrar Solicitantes por Fecha desde}
                                                     {--fecha_hasta= : Filtrar Solicitantes por Fecha hasta}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para validar el rut y numero de serie ingresado del solicitante';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //si el rut del solicitante es false, entonces se da de baja la solicitud //pasa a estado rechazado
        $querySolicitudes = Solicitud::where('estado',0);

        if($id = $this->option('solicitante_id')){
            $querySolicitudes->where('id_solicitante',$id);
        }
        if($fecha_desde = $this->option('fecha_desde') ){
            $querySolicitudes->where('created_at',$fecha_desde);
        }
        if($fecha_hasta = $this->option('fecha_hasta') ){
            $querySolicitudes->where('created_at',$fecha_hasta);
        }

        $solicitudes = $querySolicitudes->get();

        foreach ($solicitudes as $key => $value) {
            $rutCompleto = $value->solicitante->rut.$value->solicitante->dv;
            $num_serie= $value->solicitante->num_serie;
            $codEjecutivo = $value->codigo_ejecutivo;
            $resultRut = \consultaSoap($rutCompleto,$num_serie,$codEjecutivo);
            if(!$resultRut){
                //cambiamos el estado y enviamos mail

                dd('no es valido');
            }else{
                dd('es valido');
            }
            //se guarad en solicitud_validados
        }

        return 0;
    }
}