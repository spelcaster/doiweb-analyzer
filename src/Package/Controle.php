<?php

namespace DOIWeb\Package;

/**
 * Class Controle
 * @author yourname
 */
class Controle extends TipoRegistroAbstract
{
    static protected $requiredFields = [
        'campo_controle'
    ];

    public function getRequiredFields()
    {
        return self::$requiredFields;
    }
}
