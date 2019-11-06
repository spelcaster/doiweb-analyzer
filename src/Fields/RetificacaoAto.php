<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeTipoRetificacao;

/**
 * Class RetificacaoAto
 * @author yourname
 */
class RetificacaoAto
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 98;
    protected $length = 1;
    protected $key = 'retificacao_ato';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeTipoRetificacao::where('code', $this->value)
            ->first();
    }
}
