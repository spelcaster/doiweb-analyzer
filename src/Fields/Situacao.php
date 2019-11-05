<?php

namespace DOIWeb\Fields;

/**
 * Class Situacao
 * @author yourname
 */
class Situacao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 64;
    protected $length = 1;
    protected $key = 'situacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
