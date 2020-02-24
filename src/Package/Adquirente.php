<?php

namespace DOIWeb\Package;

/**
 * Class Adquirente
 * @author yourname
 */
class Adquirente extends TipoRegistroAbstract
{
    static protected $requiredFields = [
        'participacao'
    ];

    public function getRequiredFields()
    {
        return self::$requiredFields;
    }
}
