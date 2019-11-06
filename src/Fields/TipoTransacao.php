<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeTipoTransacao;

/**
 * Class TipoTransacao
 * @author yourname
 */
class TipoTransacao
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 66;
    protected $length = 2;
    protected $key = 'tipo_transacao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeTipoTransacao::where('code', $this->value)
            ->first();
    }
}
