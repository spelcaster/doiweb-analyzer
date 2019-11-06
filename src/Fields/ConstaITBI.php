<?php

namespace DOIWeb\Fields;

/**
 * Class ConstaITBI
 * @author yourname
 */
class ConstaITBI extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 335;
    protected $length = 1;
    protected $key = 'consta_itbi';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
