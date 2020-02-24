<?php

namespace DOIWeb\Package;

/**
 * Class Operacao
 * @author yourname
 */
class Operacao extends TipoRegistroAbstract
{
    static protected $requiredFields = [
        "situacao",
        "atribuicao_serventia",
        "tipo_transacao",
        "retificacao_ato",
        "forma_alienacao_aquisicao",
        "consta_valor",
        "consta_area",
        "tipo_imovel",
        "situacao_construcao",
        "localizacao",
        "consta_itbi",
        "valor_alienacao_aquisicao",
        "base_calculo_itbi_itcd",
        "area",
    ];

    public function getRequiredFields()
    {
        return self::$requiredFields;
    }
}
