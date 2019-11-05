<?php

namespace DOIWeb\Fields;

/**
 * Class RetificacaoAto
 * @author yourname
 */
class RetificacaoAto extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 98;
    protected $length = 1;
    protected $key = 'retificacao_ato';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
