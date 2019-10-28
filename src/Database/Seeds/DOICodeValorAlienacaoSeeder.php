<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeValorAlienacao;

class DOICodeValorAlienacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DOICodeValorAlienacao::firstOrCreate(
            [
                "code" => "0",
                "value" => "Valor está sendo informado"
            ]
        );

        DOICodeValorAlienacao::firstOrCreate(
            [
                "code" => "1",
                "value" => "Valor não consta nos documentos"
            ]
        );
    }
}
