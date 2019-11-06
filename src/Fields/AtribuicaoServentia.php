<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeAtribuicaoServentia;

/**
 * Class AtribuicaoServentia
 * @author yourname
 */
class AtribuicaoServentia
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 65;
    protected $length = 1;
    protected $key = 'atribuicao_serventia';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeAtribuicaoServentia::where('code', $this->value)
            ->first();
    }
}
