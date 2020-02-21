<?php

namespace DOIWeb\Fields;

/**
 * class BaseCalculoItbiItcd
 * @author yourname
 */
class BaseCalculoItbiItcd extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 126;
    protected $length = 15;
    protected $key = 'base_calculo_itbi_itcd';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}

