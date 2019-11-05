<?php

namespace DOIWeb\Parser;

use DOIWeb\Compatibility\DOI6ParserInterface;
use DOIWeb\Package\Operacao;
use DOIWeb\Fields\FieldFactory;
use RuntimeException;

/**
 * Class OperacaoParser
 * @author yourname
 */
class OperacaoParser implements DOI6ParserInterface
{
    public function parseDOI6($line)
    {
        $obj = new Operacao();

        $backupLine = $line;
        $obj->setChecksum(md5($line));

        $obj->pushField(
            FieldFactory::create('id_registro', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('numero_controle', strcut($line, 10))
        );

        $obj->pushField(
            FieldFactory::create('data_lavratura', strcut($line, 10))
        );

        $obj->pushField(
            FieldFactory::create('livro', strcut($line, 7))
        );

        $obj->pushField(
            FieldFactory::create('folha', strcut($line, 5))
        );

        $obj->pushField(
            FieldFactory::create('numero_matricula', strcut($line, 15))
        );

        $obj->pushField(
            FieldFactory::create('registro', strcut($line, 15))
        );

        $obj->pushField(
            FieldFactory::create('situacao', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('atribuicao_serventia', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('tipo_transacao', strcut($line, 2))
        );

        $obj->pushField(
            FieldFactory::create('descricao_tipo_transacao', strcut($line, 30))
        );

        $obj->pushField(
            FieldFactory::create('retificacao_ato', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('data_alienacao', strcut($line, 10))
        );

        $obj->pushField(
            FieldFactory::create('forma_alienacao_aquisicao', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('consta_valor', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('valor_alienacao_aquisicao', strcut($line, 15))
        );

        $obj->pushField(
            FieldFactory::create('base_calculo_itbi_itcd', strcut($line, 15))
        );

        $obj->pushField(
            FieldFactory::create('tipo_imovel', strcut($line, 2))
        );

        $obj->pushField(
            FieldFactory::create('descricao_tipo_imovel', strcut($line, 30))
        );

        $obj->pushField(
            FieldFactory::create('situacao_construcao', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('localizacao', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('consta_area', strcut($line, 1))
        );

        $obj->pushField(
            FieldFactory::create('area', strcut($line, 17))
        );

        $obj->pushField(
            FieldFactory::create('endereco_imovel', strcut($line, 40))
        );

        $obj->pushField(
            FieldFactory::create('numero', strcut($line, 6))
        );

        $obj->pushField(
            FieldFactory::create('complemento', strcut($line, 21))
        );

        $obj->pushField(
            FieldFactory::create('bairro', strcut($line, 20))
        );

        $obj->pushField(
            FieldFactory::create('cep', strcut($line, 8))
        );

        $obj->pushField(
            FieldFactory::create('municipio', strcut($line, 30))
        );

        $obj->pushField(
            FieldFactory::create('uf', strcut($line, 2))
        );

        $obj->pushField(
            FieldFactory::create('inscricao_nirf', strcut($line, 15))
        );

        $obj->pushField(
            FieldFactory::create('consta_itbi', strcut($line, 1))
        );

        $obj->pushField(FieldFactory::create('filler', ' ', 336, 30));
        strcut($line, 30);

        $obj->pushField(FieldFactory::create('fim_registro', strcut($line, 2)));

        if (!$line) {
            return $obj;
        }

        throw new RuntimeException(
            "Failed to parse 'Operacao' with payload '{$backupLine}' ('{$line}')"
        );
    }
}
