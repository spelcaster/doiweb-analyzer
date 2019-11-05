<?php

namespace DOIWeb\Fields;

/**
 * Class Numero
 * @author yourname
 */
class Numero extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 233;
    protected $length = 6;
    protected $key = 'numero';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
