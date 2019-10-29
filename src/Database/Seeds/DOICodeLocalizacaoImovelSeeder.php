<?php

namespace DOIWeb\Database\Seeds;

use DOIWeb\Models\DOICodeLocalizacaoImovel;
use Illuminate\Database\Seeder;

class DOICodeLocalizacaoImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DOICodeLocalizacaoImovel::firstOrCreate(
            [
                "code" => "1",
                "value" => "Urbano"
            ]
        );

        DOICodeLocalizacaoImovel::firstOrCreate(
            [
                "code" => "3",
                "value" => "Rural"
            ]
        );
    }
}
