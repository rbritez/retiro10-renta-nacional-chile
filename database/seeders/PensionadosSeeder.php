<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pensionado;
use League\Csv\Reader;
use League\Csv\Statement;

class PensionadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
         }


        $csv = Reader::createFromPath('database/seeders/BaseDatosPensionados.csv', 'r');
        // indicamos que el delimitador es el punto y coma
        $csv->setDelimiter(';');
        // Indicamos el índice de la fila de nombres de columnas
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        echo '############ CARGANDO PENSIONADOS ############ ';
        echo "\n";

        // $bar = $this->output->createProgressBar(count($records));

        foreach ($records as $r) {
            $registro = new Pensionado();
            $registro->rut = utf8_encode($r['RUT']);
            $registro->dv = $r['DV'];
            $registro->tipo = utf8_encode($r['TIPO PENSIONADO']);
            $registro->tope_retiro = (float) $r['TOPE RETIRO'];

            if ($r['RUT TITULAR'] !== ''){
                $registro->rut_titular = utf8_encode($r['RUT TITULAR']);
            } else {
                $registro->rut_titular = NULL;
            }
            if ($r['DV TITULAR'] !== ''){
                $registro->dv_titular = utf8_encode($r['DV TITULAR']);
            } else {
                $registro->dv_titular = NULL;
            }
            $registro->save();
            // $bar->advance();
        }
        // $bar->finish();
        echo '############ FIN CARGA PENSIONADOS ############';
        echo "\n";
    }
}