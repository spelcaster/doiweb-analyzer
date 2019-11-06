<?php

namespace DOIWeb\Fields;

/**
 * Class CpfCnpj
 * @author yourname
 */
class CpfCnpj extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 12;
    protected $length = 14;
    protected $key = 'cpf_cnpj';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
