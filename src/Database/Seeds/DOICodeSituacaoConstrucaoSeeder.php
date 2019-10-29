<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeValorItbiItcd;

class DOICodeSituacaoConstrucaoSeeder extends Seeder
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
                "value" => "Construção Averbada"
            ]
        );

        DOICodeValorItbiItcd::firstOrCreate(
            [
                "code" => "1",
                "value" => "Em Construção"
            ]
        );

        DOICodeValorItbiItcd::firstOrCreate(
            [
                "code" => "2",
                "value" => "Não se Aplica"
            ]
        );
    }
}
