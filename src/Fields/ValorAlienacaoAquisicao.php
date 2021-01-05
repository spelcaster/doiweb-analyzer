<?php

namespace DOIWeb\Fields;

/**
 * Class ValorAlienacaoAquisicao
 * @author yourname
 */
class ValorAlienacaoAquisicao extends FieldAbstract implements SettableValueInterface
{
    protected $startPosition = 111;
    protected $length = 15;
    protected $key = 'valor_alienacao_aquisicao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
