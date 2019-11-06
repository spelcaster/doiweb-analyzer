<?php

namespace DOIWeb\Fields;

/**
 * Class Complemento
 * @author yourname
 */
class Complemento extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 239;
    protected $length = 21;
    protected $key = 'complemento';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
