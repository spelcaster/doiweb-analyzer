<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeTipoRetificacao;

class DOICodeTipoRetificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DOICodeTipoRetificacao::firstOrCreate(
            [
                "code" => "0",
                "value" => "A operação não é uma retificação de ato anterior"
            ]
        );

        DOICodeTipoRetificacao::firstOrCreate(
            [
                "code" => "1",
                "value" => "A operação é uma retificação de um ato anterior"
            ]
        );
    }
}
