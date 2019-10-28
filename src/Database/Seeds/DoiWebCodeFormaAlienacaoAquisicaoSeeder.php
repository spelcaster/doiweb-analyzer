<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeFormaAlienacaoAquisicao;

class DoiWebCodeFormaAlienacaoAquisicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DOICodeFormaAlienacaoAquisicao::firstOrCreate(
            [
                "code" => "5",
                "value" => "À vista"
            ]
        );

        DOICodeFormaAlienacaoAquisicao::firstOrCreate(
            [
                "code" => "7",
                "value" => "À prazo"
            ]
        );

        DOICodeFormaAlienacaoAquisicao::firstOrCreate(
            [
                "code" => "9",
                "value" => "Não se Aplica"
            ]
        );
    }
}
