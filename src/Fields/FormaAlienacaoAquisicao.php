<?php

namespace DOIWeb\Fields;

/**
 * Class FormaAlienacaoAquisicao
 * @author yourname
 */
class FormaAlienacaoAquisicao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 109;
    protected $length = 1;
    protected $key = 'forma_alienacao_aquisicao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
