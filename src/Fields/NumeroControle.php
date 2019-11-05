<?php

namespace DOIWeb\Fields;

/**
 * Class NumeroControle
 * @author yourname
 */
class NumeroControle extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 2;
    protected $length = 10;
    protected $key = 'numero_controle';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
