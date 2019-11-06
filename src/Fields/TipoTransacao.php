<?php

namespace DOIWeb\Fields;

/**
 * Class TipoTransacao
 * @author yourname
 */
class TipoTransacao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 66;
    protected $length = 2;
    protected $key = 'tipo_transacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
