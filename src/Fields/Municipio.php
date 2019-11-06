<?php

namespace DOIWeb\Fields;

/**
 * Class Municipio
 * @author yourname
 */
class Municipio extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 288;
    protected $length = 30;
    protected $key = 'municipio';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
