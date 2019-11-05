<?php

namespace DOIWeb\Fields;

/**
 * Class ConstaValor
 * @author yourname
 */
class ConstaValor extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 110;
    protected $length = 1;
    protected $key = 'consta_valor';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
