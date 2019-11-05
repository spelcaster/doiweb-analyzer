<?php

namespace DOIWeb\Fields;

/**
 * Class DescricaoTipoTransacao
 * @author yourname
 */
class DescricaoTipoTransacao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 68;
    protected $length = 30;
    protected $key = 'descricao_tipo_transacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
