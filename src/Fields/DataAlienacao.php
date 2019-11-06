<?php

namespace DOIWeb\Fields;

/**
 * Class DataAlienacao
 * @author yourname
 */
class DataAlienacao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 99;
    protected $length = 10;
    protected $key = 'data_alienacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
