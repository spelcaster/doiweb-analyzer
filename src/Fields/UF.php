<?php

namespace DOIWeb\Fields;

/**
 * Class UF
 * @author yourname
 */
class UF extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 318;
    protected $length = 2;
    protected $key = 'uf';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
