<?php

namespace DOIWeb\Fields;

/**
 * Class NumeroMatricula
 * @author yourname
 */
class NumeroMatricula extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 34;
    protected $length = 15;
    protected $key = 'numero_matricula';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
