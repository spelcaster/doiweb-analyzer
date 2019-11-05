<?php

namespace DOIWeb\Fields;

/**
 * Class CpfProcurador
 * @author yourname
 */
class CpfProcurador extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 147;
    protected $length = 11;
    protected $key = 'cpf_procurador';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
