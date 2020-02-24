<?php

namespace DOIWeb\Package;

/**
 * Class Alienante
 * @author yourname
 */
class Alienante extends TipoRegistroAbstract
{
    static protected $requiredFields = [
        'participacao'
    ];

    public function getRequiredFields()
    {
        return self::$requiredFields;
    }
}
