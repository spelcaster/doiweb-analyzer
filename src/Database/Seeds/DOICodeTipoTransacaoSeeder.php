<?php

namespace DOIWeb\Database\Seeds;

use Illuminate\Database\Seeder;
use DOIWeb\Models\DOICodeTipoTransacao;

class DOICodeTipoTransacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "15",
                "value" => "Adjudicação"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "41",
                "value" => "Arrematação em Hasta Pública"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "37",
                "value" => "Cessão de Direitos"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "11",
                "value" => "Compra e Venda"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "19",
                "value" => "Dação em Pagamento"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "25",
                "value" => "Desapropriação"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "21",
                "value" => "Distrato de Negócio"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "43",
                "value" => "Dissolução de Sociedade"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "53",
                "value" => "Doação"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "55",
                "value" => "Doação em adiantamento da legítima"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "27",
                "value" => "Herança"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "45",
                "value" => "Incorporação e loteamento"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "47",
                "value" => "Integralização/Subscrição de capital"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "49",
                "value" => "Partilha amigável ou litigiosa"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "13",
                "value" => "Permuta"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "31",
                "value" => "Procuração em Causa Própria"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "35",
                "value" => "Promessa de Cessão de Direitos"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "33",
                "value" => "Promessa de Compra e Venda"
            ]
        );

        DOICodeTipoTransacao::firstOrCreate(
            [
                "code" => "51",
                "value" => "Retorno de Capital próprio"
            ]
        );
    }
}
