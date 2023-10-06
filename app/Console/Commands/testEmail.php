<?php

namespace App\Console\Commands;

use App\Mail\SolicitudExitosa;
use App\Models\Solicitud;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class testEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solicitud:test-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para hacer pruebas de email de solicitud de retiro';

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
        $solicitud = Solicitud::find(1);

        sendEmail($solicitud);

    }
}