<?php

namespace DOIWeb\Fields;

/**
 * Class CEP
 * @author yourname
 */
class CEP extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 280;
    protected $length = 8;
    protected $key = 'cep';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
