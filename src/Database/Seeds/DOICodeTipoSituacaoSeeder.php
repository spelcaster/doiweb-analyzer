<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeTipoSituacao;

class DOICodeTipoSituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DOICodeTipoSituacao::firstOrCreate(
            [
                "code" => "0",
                "value" => "DOI Normal"
            ]
        );
        DOICodeTipoSituacao::firstOrCreate(
            [
                "code" => "1",
                "value" => "DOI Retificadora"
            ]
        );
		DOICodeTipoSituacao::firstOrCreate(
            [
                "code" => "3",
                "value" => "DOI Canceladora"
            ]
        );
    }
}
