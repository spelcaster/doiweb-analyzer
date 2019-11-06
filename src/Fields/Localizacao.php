<?php

namespace DOIWeb\Fields;


use DOIWeb\Models\DOICodeLocalizacaoImovel;

/**
 * Class Localizacao
 * @author yourname
 */
class Localizacao
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 174;
    protected $length = 1;
    protected $key = 'localizacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeLocalizacaoImovel::where('code', $this->value)
            ->first();
    }
}
