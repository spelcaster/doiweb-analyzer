<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeTipoImovel;

class DOICodeTipoImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "67",
                "value" => "Casa"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "65",
                "value" => "Apto"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "15",
                "value" => "Loja"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "17",
                "value" => "Sala/Conjunto"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "71",
                "value" => "Terreno/Fração"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "31",
                "value" => "Galpão"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "33",
                "value" => "Prédio Comercial"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "35",
                "value" => "Prédio Residencial"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "69",
                "value" => "Fazenda/Sítio/Chácara"
            ]
        );

        DOICodeTipoImovel::firstOrCreate(
            [
                "code" => "89",
                "value" => "Outros"
            ]
        );
    }
}
