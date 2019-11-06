<?php

namespace DOIWeb\Fields;

use DOIWeb\Models\DOICodeFormaAlienacaoAquisicao;

/**
 * Class FormaAlienacaoAquisicao
 * @author yourname
 */
class FormaAlienacaoAquisicao
    extends FieldAbstract
    implements SettableValueInterface, HasCodeInterface
{
    protected $startPosition = 109;
    protected $length = 1;
    protected $key = 'forma_alienacao_aquisicao';

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getCode()
    {
        return DOICodeFormaAlienacaoAquisicao::where('code', $this->value)
            ->first();
    }
}
