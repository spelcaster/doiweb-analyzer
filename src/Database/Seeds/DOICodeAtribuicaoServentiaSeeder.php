<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeAtribuicaoServentia;

class DOICodeAtribuicaoServentiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DOICodeAtribuicaoServentia::firstOrCreate(
            [
                "code" => "1",
                "value" => "Ofício de Notas"
            ]
        );

        DOICodeAtribuicaoServentia::firstOrCreate(
            [
                "code" => "2",
                "value" => "Registro de Imóveis"
            ]
        );

        DOICodeAtribuicaoServentia::firstOrCreate(
            [
                "code" => "3",
                "value" => "Registro de Título e Documentos"
            ]
        );
    }
}
