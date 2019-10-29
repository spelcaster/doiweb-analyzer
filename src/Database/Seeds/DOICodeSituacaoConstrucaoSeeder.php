<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeSituacaoConstrucao;

class DOICodeSituacaoConstrucaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DOICodeSituacaoConstrucao::firstOrCreate(
            [
                "code" => "0",
                "value" => "Construção Averbada"
            ]
        );

        DOICodeSituacaoConstrucao::firstOrCreate(
            [
                "code" => "1",
                "value" => "Em Construção"
            ]
        );

        DOICodeSituacaoConstrucao::firstOrCreate(
            [
                "code" => "2",
                "value" => "Não se Aplica"
            ]
        );
    }
}
