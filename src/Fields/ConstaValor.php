<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeValorAlienacao;

/**
 * Class ConstaValor
 * @author yourname
 */
class ConstaValor
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 110;
    protected $length = 1;
    protected $key = 'consta_valor';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeValorAlienacao::where('code', $this->value)
            ->first();
    }
}
