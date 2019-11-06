<?php

namespace DOIWeb\Fields;

/**
 * Class Participacao
 * @author yourname
 */
class Participacao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 141;
    protected $length = 6;
    protected $key = 'participacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
