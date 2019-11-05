<?php

namespace DOIWeb\Fields;

/**
 * Class AtribuicaoServentia
 * @author yourname
 */
class AtribuicaoServentia extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 65;
    protected $length = 1;
    protected $key = 'atribuicao_serventia';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
