<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Solicitante;

class pruebaDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base:prueba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $result = Solicitante::where('id',154)->first();
        dd($result);
    }
}
