<?php

namespace DOIWeb\Fields;

/**
 * Class Localizacao
 * @author yourname
 */
class Localizacao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 174;
    protected $length = 1;
    protected $key = 'localizacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
