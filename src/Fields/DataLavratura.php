<?php

namespace DOIWeb\Fields;

/**
 * Class DataLavratura
 * @author yourname
 */
class DataLavratura extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 12;
    protected $length = 10;
    protected $key = 'data_lavratura';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
