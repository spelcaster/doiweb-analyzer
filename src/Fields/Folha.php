<?php

namespace DOIWeb\Fields;

/**
 * Class Folha
 * @author yourname
 */
class Folha extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 29;
    protected $length = 5;
    protected $key = 'folha';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
