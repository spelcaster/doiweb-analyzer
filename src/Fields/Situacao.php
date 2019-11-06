<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeTipoSituacao;

/**
 * Class Situacao
 * @author yourname
 */
class Situacao
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 64;
    protected $length = 1;
    protected $key = 'situacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeTipoSituacao::where('code', $this->value)
            ->first();
    }
}
