<?php

namespace DOIWeb\Fields;

/**
 * Class SituacaoConstrucao
 * @author yourname
 */
class SituacaoConstrucao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 173;
    protected $length = 1;
    protected $key = 'situacao_construcao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
