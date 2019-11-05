<?php

namespace DOIWeb\Fields;

/**
 * Class ConstaArea
 * @author yourname
 */
class ConstaArea extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 175;
    protected $length = 1;
    protected $key = 'consta_area';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
