<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeAreaImovel;

class DOICodeAreaImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DOICodeAreaImovel::firstOrCreate(
            [
                "code" => "0",
                "value" => "Área está sendo informada"
            ]
        );
        DOICodeAreaImovel::firstOrCreate(
            [
                "code" => "1",
                "value" => "Área não consta nos documentos"
            ]
        );
    }
}
