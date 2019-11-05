<?php

namespace DOIWeb\Fields;

/**
 * Class Bairro
 * @author yourname
 */
class Bairro extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 260;
    protected $length = 20;
    protected $key = 'bairro';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
