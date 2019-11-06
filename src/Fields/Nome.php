<?php

namespace DOIWeb\Fields;

/**
 * Class Nome
 * @author yourname
 */
class Nome extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 26;
    protected $length = 115;
    protected $key = 'nome';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
