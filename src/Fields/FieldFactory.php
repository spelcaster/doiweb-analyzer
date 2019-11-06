<?php

namespace DOIWeb\Fields;

use RuntimeException;

/**
 * Class FieldFactory
 * @author yourname
 */
final class FieldFactory
{
    private static $fieldMap = [
        'filler' => Filler::class,
        'tipo_registro_operacao' => TipoRegistroOperacao::class,
        'tipo_registro_alienante' => TipoRegistroAlienante::class,
        'tipo_registro_adquirente' => TipoRegistroAdquirente::class,
        'tipo_registro_controle' => TipoRegistroControle::class,
        'numero_controle' => NumeroControle::class,
        'situacao' => Situacao::class,
        'endereco_imovel' => EnderecoImovel::class,
        'bairro' => Bairro::class,
        'cep' => CEP::class,
        'campo_controle' => CampoControle::class,
        'base_calculo_itbi_itcd' => BaseCalculoItbiItcd::class,
        'consta_itbi' => ConstaITBI::class,
        'livro' => Livro::class,
        'folha' => Folha::class,
        'uf' => UF::class,
        'localizacao' => Localizacao::class,
        'forma_alienacao_aquisicao' => FormaAlienacaoAquisicao::class,
        'municipio' => Municipio::class,
        'consta_area' => ConstaArea::class,
        'atribuicao_serventia' => AtribuicaoServentia::class,
        'complemento' => Complemento::class,
        'tipo_transacao' => TipoTransacao::class,
        'descricao_tipo_imovel' => DescricaoTipoImovel::class,
        'area' => Area::class,
        'descricao_tipo_transacao' => DescricaoTipoTransacao::class,
        'numero_matricula' => NumeroMatricula::class,
        'situacao_construcao' => SituacaoConstrucao::class,
        'valor_alienacao_aquisicao' => ValorAlienacaoAquisicao::class,
        'cpf_cnpj' => CpfCnpj::class,
        'nome' => Nome::class,
        'data_lavratura' => DataLavratura::class,
        'participacao' => Participacao::class,
        'cpf_procurador' => CpfProcurador::class,
        'consta_valor' => ConstaValor::class,
        'numero' => Numero::class,
        'data_alienacao' => DataAlienacao::class,
        'tipo_imovel' => TipoImovel::class,
        'inscricao_nirf' => InscricaoNIRF::class,
        'registro' => Registro::class,
        'retificacao_ato' => RetificacaoAto::class,
        'fim_registro' => FimRegistro::class,
    ];

    public static function create(
        $key, $value = null, $startPosition = null, $length = null
    ) {
        if ($key == 'filler') {
            if ($startPosition && $length) {
                $fieldClass = self::$fieldMap['filler'];
                return new $fieldClass($startPosition, $length);
            }

            throw new RuntimeException("Can't create a 'filler' field without start position and length");
        } else if ($key == 'id_registro') {
            switch ($value) {
            case '1':
                $fieldClass = self::$fieldMap['tipo_registro_operacao'];
                return new $fieldClass;

            case '2':
                $fieldClass = self::$fieldMap['tipo_registro_alienante'];
                return new $fieldClass;

            case '3':
                $fieldClass = self::$fieldMap['tipo_registro_adquirente'];
                return new $fieldClass;

            case '9':
                $fieldClass = self::$fieldMap['tipo_registro_controle'];
                return new $fieldClass;

            default:
                throw new RuntimeException("Invalid field 'id_registro' with value '{$value}'");
            }
        }

        if (!isset(self::$fieldMap[$key])) {
            throw new RuntimeException(
                "Invalid field '{$key}'"
            );
        }

        $fieldClass = self::$fieldMap[$key];
        $obj = new $fieldClass();

        if ($obj instanceof \DOIWeb\Fields\SettableValueInterface) {
            $obj->setValue($value);
        }

        return $obj;
    }
}
