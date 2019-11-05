<?php

namespace DOIWeb\Parser;

use DOIWeb\Compatibility\DOI6ParserInterface;
use DOIWeb\Package\Alienante;
use DOIWeb\Fields\FieldFactory;
use RuntimeException;

/**
 * Class AlienanteParser
 * @author yourname
 */
class AlienanteParser implements DOI6ParserInterface
{
    public function parseDOI6($line)
    {
        $backupLine = $line;

        $obj = new Alienante();

        $obj->setChecksum(md5($line));

        $obj->pushField(FieldFactory::create('id_registro', strcut($line, 1)));

        $obj->pushField(FieldFactory::create('filler', ' ', 2, 10));
        strcut($line, 10);

        $cpfCnpj = strcut($line, 14);
        $obj->pushField(FieldFactory::create('cpf_cnpj', $cpfCnpj));

        $tipoPessoa = strlen($cpfCnpj) == 11 ? 'PF' : 'PJ';
        $condicaoCpfCnpj = 'Ok';
        if ($cpfCnpj == '33333333333') {
            $condicaoCpfCnpj = 'Sem CPF – Operação anterior à IN 190';
        } else if ($cpfCnpj == '22222222222') {
            $condicaoCpfCnpj = 'Sem CNPJ – Operação anterior à IN 200';
            $tipoPessoa = 'PJ';
        } else if ($cpfCnpj == '11111111111') {
            $condicaoCpfCnpj = 'Sem CPF/CNPJ - Decisão Judicial';
            $tipoPessoa = '';
        }

        $obj->pushMisc(
            'cpf_cnpj',
            [
                'condicao_cpf_cnpj' => $condicaoCpfCnpj,
                'tipo_pessoa' => $tipoPessoa
            ]
        );

        $obj->pushField(FieldFactory::create('nome', strcut($line, 115)));

        $obj->pushField(FieldFactory::create('participacao', strcut($line, 6)));

        $obj->pushField(FieldFactory::create('cpf_procurador', strcut($line, 11)));

        $obj->pushField(FieldFactory::create('filler', ' ', 158, 208));
        strcut($line, 208); // filler

        $obj->pushField(FieldFactory::create('filler', ' ', 366, 2));

        $obj->pushField(FieldFactory::create('fim_registro', strcut($line, 2)));

        if (!$line) {
            return $obj;
        }

        throw new RuntimeException(
            "Failed to parse 'Alienante' with payload '{$backupLine}' ('{$line}')"
        );
    }

}
