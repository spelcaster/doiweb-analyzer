<?php

namespace DOIWeb\Fields;

/**
 * Class Registro
 * @author yourname
 */
class Registro extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 49;
    protected $length = 15;
    protected $key = 'registro';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
