<?php

namespace DOIWeb\Parser;

use DOIWeb\Compatibility\DOI6ParserInterface;
use DOIWeb\Package\Controle;
use DOIWeb\Fields\FieldFactory;
use RuntimeException;

/**
 * Class ControleParser
 * @author yourname
 */
class ControleParser implements DOI6ParserInterface
{
    public function parseDOI6($line)
    {
        $backupLine = $line;

        $obj = new Controle();

        $obj->setChecksum(md5($line));

        $obj->pushField(FieldFactory::create('id_registro', strcut($line, 1)));

        $obj->pushField(FieldFactory::create('filler', ' ', 2, 16)); // filler
        strcut($line, 16);

        $obj->pushField(FieldFactory::create('campo_controle', strcut($line, 6)));

        $obj->pushField(FieldFactory::create('filler', ' ', 24, 342)); // filler
        strcut($line, 342); // filler

        $obj->pushField(FieldFactory::create('fim_registro', strcut($line, 2)));

        if (!$line) {
            return $obj;
        }

        throw new RuntimeException(
            "Failed to parse 'Controle' with payload '{$backupLine}' ('{$line}')"
        );
    }
}
