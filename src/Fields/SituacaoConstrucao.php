<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeSituacaoConstrucao;

/**
 * Class SituacaoConstrucao
 * @author yourname
 */
class SituacaoConstrucao
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 173;
    protected $length = 1;
    protected $key = 'situacao_construcao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeSituacaoConstrucao::where('code', $this->value)
            ->first();
    }
}
