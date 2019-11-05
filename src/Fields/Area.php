<?php

namespace DOIWeb\Fields;

/**
 * Class Area
 * @author yourname
 */
class Area extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 176;
    protected $length = 17;
    protected $key = 'area';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
