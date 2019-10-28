<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeValorItbiItcd;

class DOICodeValorItbiItcdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DOICodeValorItbiItcd::firstOrCreate(
            [
                "code" => "0",
                "value" => "Valor está sendo informada"
            ]
        );

        DOICodeValorItbiItcd::firstOrCreate(
            [
                "code" => "1",
                "value" => "Valor não consta nos documentos"
            ]
        );
    }
}
